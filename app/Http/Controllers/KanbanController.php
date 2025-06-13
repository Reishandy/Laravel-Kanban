<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKanbanRequest;
use App\Http\Requests\UpdateKanbanRequest;
use App\Models\Kanban;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class KanbanController extends Controller
{
    /**
     * Join a user to kanban.
     */
    public function join(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'join-code' => ['string', 'regex:/^[A-Z0-9]{4}-[A-Z0-9]{4}$/i'],
        ]);

        $kanban = Kanban::where('code', $validated['join-code'])->first();

        // Verify exist
        if (!$kanban) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['join-code' => 'Kanban with this code does not exist.']);
        }

        // Check if already joined
        if ($kanban->members->contains(Auth::user())) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['join-code' => 'You are already a member of this kanban.']);
        };

        // Add to kanban
        $kanban->members()->attach(Auth::id());

        return redirect()->route('dashboard')->with('status', 'new-' . $kanban->code);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();

        return view('kanban.index', [
            'kanbans' => Kanban::with('user')
                ->where(function ($query) use ($user) {
                    $query->where('kanbans.user_id', $user->id)
                        ->orWhereHas('members', function ($subQuery) use ($user) {
                            $subQuery->where('users.id', $user->id);
                        });
                })
                ->leftJoin('kanban_user', function ($join) use ($user) {
                    $join->on('kanbans.id', '=', 'kanban_user.kanban_id')
                        ->where('kanban_user.user_id', '=', $user->id);
                })
                ->orderByRaw('CASE WHEN kanban_user.created_at IS NULL OR kanbans.created_at > kanban_user.created_at THEN kanbans.created_at ELSE kanban_user.created_at END DESC')
                ->select('kanbans.*')
                ->distinct()
                ->paginate(10),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKanbanRequest $request)
    {
        $kanban = Auth::user()->kanban()->create([
            'title' => $request['create-title'],
            'description' => $request['create-description'],
        ]);

        return redirect()->route('dashboard')->with('status', 'new-' . $kanban->code);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kanban $kanban)
    {
        dd($kanban);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKanbanRequest $request, Kanban $kanban)
    {
        dump($kanban);
        dd($request->all());
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kanban $kanban)
    {
        dd($kanban);
        //
    }
}

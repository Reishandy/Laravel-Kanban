<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKanbanRequest;
use App\Http\Requests\UpdateKanbanRequest;
use App\Models\Kanban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class KanbanController extends Controller
{
    /**
     * Join a user to kanban.
     */
    public function join(Request $request)
    {
        dd($request->all());
        // Validate code exist
        // Check if already joined
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();

        return view('kanban.index', [
            'kanbans' => Kanban::with('user')
                ->where('user_id', $user->id)
                ->orWhereHas('members', function ($query) use ($user) {
                    $query->where('users.id', $user->id);
                })
                ->latest()
                ->paginate(10),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKanbanRequest $request)
    {
        dd($request->all());
        //
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

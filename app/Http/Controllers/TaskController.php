<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Kanban;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     *  Move task to a stage.
     */
    public function move(Request $request, Kanban $kanban, Task $task)
    {
        $validated = $request->validate([
            'stage' => ['required', 'string', 'in:planned,ongoing,completed'],
        ], [
            'stage.in' => 'The stage must be planned, ongoing, or completed.',
        ]);

        $task->stage = $validated['stage'];
        $task->save();

        return redirect()->back()
            ->with('status', 'updated-' . $task->id)
            ->with('stage', $validated['stage']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $kanban = Kanban::where('code', $request->kanban_code)->firstOrFail();

        $task = $kanban->tasks()->create([
            'title' => $request->input('create-title'),
            'description' => $request->input('create-description'),
            'stage' => $request->input('create-stage'),
            'priority' => $request->input('create-priority'),
            'deadline' => $request->input('create-deadline'),
        ]);

        // Handle assigned to
        $task->users()->sync($request->input('create-assigned', []));

        return redirect()->route('kanban.show', $kanban->code)
            ->with('status', 'new-' . $task->id)
            ->with('stage', $task->stage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Kanban $kanban, Task $task)
    {
        $task->update([
            'title' => $request->input('edit-title'),
            'description' => $request->input('edit-description'),
            'stage' => $request->input('edit-stage'),
            'priority' => $request->input('edit-priority'),
            'deadline' => $request->input('edit-deadline'),
        ]);

        // Handle assigned to
        $task->users()->sync($request->input('edit-assigned', []));

        return redirect()->route('kanban.show', $kanban->code)
            ->with('status', 'updated-' . $task->id)
            ->with('stage', $task->stage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kanban $kanban, Task $task)
    {
        $task->delete();

        return redirect()->route('kanban.show', $kanban->code)
            ->with('status', 'deleted')
            ->with('stage', $task->stage);
    }
}

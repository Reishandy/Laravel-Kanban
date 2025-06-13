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
        dd($request->all());
        // TODO: redirect to stage tab
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        dd($request->all());
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Kanban $kanban, Task $task)
    {
        dd($request->all());
        // Handle assigned to
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kanban $kanban, Task $task)
    {
        dd($task->id);
        //
    }
}

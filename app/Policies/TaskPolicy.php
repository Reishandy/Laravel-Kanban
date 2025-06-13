<?php

namespace App\Policies;

use App\Models\Kanban;
use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    /**
     * Determine whether the user can create a task.
     */
    public function create(User $user): bool
    {
        $kanbanCode = request()->route('kanban');
        $kanban = Kanban::where('code', $kanbanCode)->first();

        if (!$kanban) {
            return false;
        }

        return ($kanban->user->id === $user->id) || ($kanban->members->contains($user));
    }

    /**
     * Determine whether the user can update the task.
     */
    public function update(User $user, Task $task): bool
    {
        $kanban = $task->kanban;
        return ($kanban->user->id === $user->id) || ($kanban->members->contains($user));
    }

    /**
     * Determine whether the user can delete the task.
     */
    public function delete(User $user, Task $task): bool
    {
        $kanban = $task->kanban;
        return ($kanban->user->id === $user->id) || ($kanban->members->contains($user));
    }
}

<?php

namespace App\Policies;

use App\Models\Kanban;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KanbanPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Kanban $kanban): bool
    {
        return $kanban->user->id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Kanban $kanban): bool
    {
        return $kanban->user->id === $user->id;
    }
}

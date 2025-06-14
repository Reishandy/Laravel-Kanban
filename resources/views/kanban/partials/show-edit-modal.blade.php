<x-modal modal_id="edit_modal"
         title="Edit task"
         description="Update the details of this task.">
    <form method="POST" action="{{-- Set via JS --}}" id="edit-task-form">
        @csrf
        @method('PATCH')

        <div class="my-4 space-y-4">
            <x-input
                type="text"
                name="edit-title"
                label="Title"
                placeholder="My Awesome Task"
                required
                helper="Enter a descriptive title for your task"
            />

            <x-textarea
                name="edit-description"
                label="Description (Optional)"
                placeholder="This task is about..."
            />

            {{-- Stage --}}
            <x-select name="edit-stage" label="Stage" required>
                <option value="planned">Planned</option>
                <option value="ongoing">Ongoing</option>
                <option value="completed">Completed</option>
            </x-select>

            {{-- Priority --}}
            <x-select name="edit-priority" label="Priority" required>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </x-select>

            {{-- Assigned to --}}
            <x-assigned mode="edit" :users="$kanban->members->merge(collect([$kanban->user]))->sortBy('name')"/>

            {{-- Deadline --}}
            <x-input
                type="date"
                name="edit-deadline"
                label="Deadline"
                placeholder="Deadline of the task"
                helper="Enter a deadline for your task"
            />

            <input type="hidden" name="task_id" id="edit-task-id">
            <input type="hidden" name="kanban_code" id="edit-kanban-code" value="{{ $kanban->code }}"/>
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="btn btn-soft btn-primary">Update</button>
            <button type="button" class="btn btn-error" onclick="openDeleteConfirmationModal()">Delete</button>

            <button class="btn btn-ghost" form="edit_modal_dialog">Cancel</button>
        </div>
    </form>
</x-modal>

<x-modal modal_id="create_modal"
         title="Create a new task"
         description="Fill in the details to create a new task.">
    <form method="POST" action="/kanban/{{ $kanban->code }}/task">
        @csrf

        <div class="my-4 space-y-4">
            <x-input
                type="text"
                name="create-title"
                label="Title"
                placeholder="My Awesome Task"
                required
                helper="Enter a descriptive title for your task"
            />

            <x-textarea
                name="create-description"
                label="Description (Optional)"
                placeholder="This task is about..."
            />

            {{-- Stage --}}
            <x-select name="create-stage" label="Stage" required>
                <option value="planned" selected>Planned</option>
                <option value="ongoing">Ongoing</option>
                <option value="completed">Completed</option>
            </x-select>

            {{-- Priority --}}
            <x-select name="create-priority" label="Priority" required>
                <option value="low">Low</option>
                <option value="medium" selected>Medium</option>
                <option value="high">High</option>
            </x-select>

            {{-- Assigned to --}}
            <x-assigned mode="create" :users="$kanban->members->merge(collect([$kanban->user]))"/>

            {{-- Deadline --}}
            <x-input
                type="date"
                name="create-deadline"
                label="Deadline"
                placeholder="Deadline of the task"
                required
                helper="Enter a deadline for your task"
            />
        </div>

        <div class="flex items-center gap-2">
            <button class="btn btn-soft">Create</button>
            <button class="btn btn-ghost" form="create_modal_dialog">Cancel</button>
        </div>
    </form>
</x-modal>

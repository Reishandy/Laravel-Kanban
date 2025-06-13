<x-modal modal_id="create_modal"
         title="Create a new project"
         description="Fill in the details to create a new kanban project.">
    <form method="POST" action="{{-- TODO: Store --}}">
        @csrf

        <div class="my-4 space-y-4">
            <x-input
                type="text"
                name="create-title"
                label="Title"
                placeholder="My Awesome Project"
                required
                helper="Enter a descriptive title for your project"
            />

            <x-textarea
                name="create-description"
                label="Description (Optional)"
                placeholder="This project is about..."
            />
        </div>

        <div class="flex items-center gap-2">
            <button class="btn btn-soft">Create</button>
            <button class="btn btn-ghost" form="create_modal_dialog">Cancel</button>
        </div>
    </form>
</x-modal>

<x-modal modal_id="edit_modal" title="Edit project" description="Update your kanban project details.">
    <form method="POST" action="{{-- check JS --}}" id="edit-form">
        @csrf
        @method('PATCH')

        <div class="my-4 space-y-4">
            <input type="hidden" id="edit-kanban-code"/>

            <x-input
                type="text"
                name="edit-title"
                label="Title"
                placeholder="My Awesome Project"
                value=""
                required
                helper="Enter a descriptive title for your project"
            />

            <x-textarea
                name="edit-description"
                label="Description"
                value=""
                placeholder="This project is about..."
            />

            <input type="hidden" name="kanban_id" id="edit-kanban-id">
        </input>

        <div class="flex items-center gap-2">
            <button class="btn btn-soft">Update</button>
            <button type="button" class="btn btn-error" onclick="openDeleteConfirmationModal()">Delete</button>
            <button class="btn btn-ghost" form="edit_modal_dialog">Cancel</button>
        </div>
    </form>
</x-modal>

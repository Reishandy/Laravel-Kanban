<x-modal modal_id="edit_modal" title="Edit Kanban" description="Update your kanban project details.">
    <form method="POST" action="{{-- check JS --}}" id="edit-form">
        @csrf
        @method('PATCH')

        <div class="my-4 space-y-4">
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

            <input type="hidden" name="kanban_code" id="edit-kanban-code">

            <div class="flex items-center gap-2">
                <button class="btn btn-soft btn-primary">Update</button>
                <button type="button" class="btn btn-error" onclick="openDeleteConfirmationModal()">Delete</button>
                <button class="btn btn-ghost" form="edit_modal_dialog">Cancel</button>
            </div>
        </div>
    </form>
</x-modal>

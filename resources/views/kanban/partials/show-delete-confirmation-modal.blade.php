<x-modal
    modal_id="delete_confirmation_modal"
    title="Confirm Deletion"
    description="Are you sure you want to delete this task? This action cannot be undone.">
    <div class="my-4">
        <p class="font-medium">Task: <span id="delete-task-title" class="text-error"></span></p>
        <p class="text-sm text-base-content/70 mt-2">This task will be permanently removed.</p>
    </div>

    <div class="flex items-center gap-2">
        <form id="confirm-delete-form" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-ghost" form="delete_confirmation_modal_dialog">Cancel</button>
            <button type="submit" class="btn btn-error">Delete</button>
        </form>
    </div>
</x-modal>

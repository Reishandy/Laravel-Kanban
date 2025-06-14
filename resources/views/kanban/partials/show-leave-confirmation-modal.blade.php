<x-modal
    modal_id="leave_confirmation_modal"
    title="Confirm Leave Kanban"
    description="Are you sure you want to leave this Kanban? You will no longer have access to it.">
    <div class="my-4">
        <p class="font-medium">Kanban: <span id="leave-kanban-title" class="text-error"></span></p>
        <p class="text-sm text-base-content/70 mt-2">
            You can join this Kanban again later if you have the code.
        </p>
    </div>

    <div class="flex items-center gap-2">
        <form id="confirm-leave-form" method="POST">
            @csrf

            <button class="btn btn-ghost" form="leave_confirmation_modal_dialog">Cancel</button>
            <button type="submit" class="btn btn-error">Leave</button>
        </form>
    </div>
</x-modal>

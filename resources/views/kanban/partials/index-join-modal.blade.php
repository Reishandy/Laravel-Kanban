<x-modal
    modal_id="join_modal"
    title="Join a project"
    description="Input the project kanban code below.">
    <form method="POST" action="{{ route('kanban.join') }}">
        @csrf

        <div class="my-4">
            <x-input
                type="text"
                name="join-code"
                label="Code"
                placeholder="XXXX-XXXX"
                required
                helper="Input the project kanban code"
            />
        </div>

        <div class="flex items-center gap-2">
            <button class="btn btn-soft btn-primary">Join</button>
            <button class="btn btn-ghost" form="join_modal_dialog">Cancel</button>
        </div>
    </form>
</x-modal>

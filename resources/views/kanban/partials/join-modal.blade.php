<dialog id="join_modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <header>
            <h2 class="font-bold text-base-content text-2xl">
                Join a project
            </h2>

            <p class="mt-1 text-sm text-base-content/50">
                Input the project kanban code below.
            </p>
        </header>

        <form method="POST" action="{{-- TODO --}}" class="w-fit">
            @csrf

            <div class="my-4">
                <x-input
                    type="text"
                    name="code"
                    label="Code"
                    placeholder="XXXX-XXXX"
                    required
                    helper="Input the project kanban code"
                />
            </div>
            <div class="flex items-center gap-2">
                <button class="btn btn-soft btn-primary">Join</button>
                <button class="btn btn-ghost" form="dialog">Cancel</button>
            </div>
        </form>

        <div class="modal-action hidden">
            <form id="dialog" method="dialog"></form>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop hidden">
        <button class="hover:cursor-default">close</button>
    </form>
</dialog>

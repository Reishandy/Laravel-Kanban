<x-layout.app>
    <x-navbar/>

    <x-header
        title="Dashboard"
        description="Your kanbans.">
        <div class="flex flex-row gap-4">
            <button class="btn btn-primary w-30" onClick="join_modal.showModal()">Join</button>
            <button class="btn btn-soft w-30" onClick="create_modal.showModal()">Create</button>
        </div>
    </x-header>

    <div class="sm:rounded-xl bg-base-200 sm:my-10 w-full sm:w-xl md:w-3xl lg:w-5xl xl:w-7xl">
        @if(session('status') === 'deleted')
            <div class="flex items-center justify-center">
                <div class="rounded-lg badge badge-error mt-6 mx-6 w-full">Kanban Deleted</div>
            </div>
        @endif

        @if(session('status') === 'left')
            <div class="flex items-center justify-center">
                <div class="rounded-lg badge badge-error mt-6 mx-6 w-full">Kanban Left</div>
            </div>
        @endif

        <div class="m-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @if($kanbans->isEmpty())
                <div class="col-span-full text-center text-lg text-base-content/50">
                    No Kanbans found, create one or join to get started!
                </div>
            @endif

            @foreach($kanbans as $kanban)
                <x-kanban-card
                    :is_new="session('status') === 'new-' . $kanban->code "
                    :is_updated="session('status') === 'updated-' . $kanban->code "
                    :kanban="$kanban"/>
            @endforeach
        </div>

        <div class="m-6">
            {{ $kanbans->links() }}
        </div>
    </div>

    @include('kanban.partials.index-join-modal')
    @include('kanban.partials.index-create-modal')
    @include('kanban.partials.index-edit-modal')
    @include('kanban.partials.index-delete-confirmation-modal')

    {{-- Using modal is not a good idea --}}

    {{-- Check for join form validation errors --}}
    @if($errors->has('join-code'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                join_modal.showModal();
            });
        </script>
    @endif

    {{-- Check for create form validation errors --}}
    @if($errors->hasAny(['create-title', 'create-description']))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                create_modal.showModal();
            });
        </script>
    @endif

    {{-- Check for edit form validation errors --}}
    @if($errors->hasAny(['edit-title', 'edit-description']))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                edit_modal.showModal();
            });
        </script>
    @endif

    <script>
        function openEditModal(code, title, description) {
            // Set form values
            document.getElementById('edit-kanban-code').value = code;
            document.getElementById('edit-title').value = title;
            document.getElementById('edit-description').value = description;

            // Update action URL
            document.getElementById('edit-form').action = `/kanban/${code}`;

            // Show modal
            edit_modal.showModal();
        }

        function openDeleteConfirmationModal() {
            // Get data from edit form
            const code = document.getElementById('edit-kanban-code').value;
            document.getElementById('delete-kanban-title').textContent = document.getElementById('edit-title').value;

            // Set the form action
            document.getElementById('confirm-delete-form').action = `/kanban/${code}`;

            // Close edit modal and open confirmation modal
            edit_modal.close();
            delete_confirmation_modal.showModal();
        }
    </script>
</x-layout.app>

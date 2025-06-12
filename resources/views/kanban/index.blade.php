<x-layout.app>
    <x-navbar/>

    <x-header
        title="Dashboard"
        description="Your projects.">
        <div class="flex flex-row gap-4">
            <button class="btn btn-soft btn-primary w-30" onClick="join_modal.showModal()">Join</button>
            <button class="btn btn-soft w-30" onClick="create_modal.showModal()">Create</button>
        </div>
    </x-header>

    <div class="sm:rounded-xl bg-base-200 sm:my-10 w-full sm:w-xl md:w-3xl lg:w-5xl xl:w-7xl">
        <div class="m-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">

            <x-kanban-card
                :new="true"
                code="1234-ABCD"
                title="Some kanban title"
                description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sit amet pellentesque tortor."
                link="#"
            />

            @for($i = 1; $i <= 10; $i++)
                <x-kanban-card
                    :new="false"
                    code="3234-ABCD{{ $i }}"
                    title="Some kanban title"
                    description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sit amet pellentesque tortor"
                    link="#"
                />
            @endfor
        </div>
    </div>

    <x-modal
        modal_id="join_modal"
        title="Join a project"
        description="Input the project kanban code below.">
        <form method="POST" action="{{-- TODO --}}">
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

    <x-modal modal_id="create_modal"
             title="Create a new project"
             description="Fill in the details to create a new kanban project.">
        <form method="POST" action="{{-- TODO --}}">
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

                <x-input
                    type="text"
                    name="create-description"
                    label="Description (Optional)"
                    placeholder="This project is about..."
                    helper="Provide details about what this project is for"
                />
            </div>

            <div class="flex items-center gap-2">
                <button class="btn btn-soft">Create</button>
                <button class="btn btn-ghost" form="create_modal_dialog">Cancel</button>
            </div>
        </form>
    </x-modal>

    <x-modal modal_id="edit_modal" title="Edit project" description="Update your kanban project details.">
        <form method="POST" action="{{-- check JS --}}" id="edit-form">
            @csrf
            @method('PATCH')

            <div class="my-4 space-y-4">
                <x-input
                    type="text"
                    name="edit-code"
                    label="Code"
                    value=""
                    disabled
                />

                <x-input
                    type="text"
                    name="edit-title"
                    label="Title"
                    placeholder="My Awesome Project"
                    value=""
                    required
                    helper="Enter a descriptive title for your project"
                />

                <x-input
                    type="text"
                    name="edit-description"
                    label="Description"
                    value=""
                    placeholder="This project is about..."
                    helper="Provide details about what this project is for"
                />

                <input type="hidden" name="kanban_id" id="edit-kanban-id">
            </div>

            <div class="flex items-center gap-2">
                <button class="btn btn-soft">Update</button>
                <button class="btn btn-soft btn-error" form="delete-form">Delete</button>
                <button class="btn btn-ghost" form="edit_modal_dialog">Cancel</button>
            </div>
        </form>

        <form method="POST" action="{{-- check JS --}}" id="delete-form">
            @csrf
            @method('DELETE')

        </form>
    </x-modal>

    {{-- TODO: pagination --}}

    <script>
        function copyToClipboard(elementId, tooltipId) {
            const text = document.getElementById(elementId).textContent.trim();
            const tooltipElement = document.getElementById(tooltipId);

            navigator.clipboard.writeText(text).then(() => {
                // Show the tooltip
                tooltipElement.classList.add('tooltip-open');
                tooltipElement.classList.add('tooltip');

                // Hide the tooltip after 1 second
                setTimeout(() => {
                    tooltipElement.classList.remove('tooltip-open');
                    tooltipElement.classList.remove('tooltip');
                }, 1000);

                console.log('Copied to clipboard!');
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        }

        function openEditModal(code, title, description) {
            // Set form values
            document.getElementById('edit-code').value = code;
            document.getElementById('edit-title').value = title;
            document.getElementById('edit-description').value = description;

            // Update action URL
            document.getElementById('edit-form').action = `/project/${code}`;
            document.getElementById('delete-form').action = `/project/${code}`;

            // Show modal
            edit_modal.showModal();
        }
    </script>
</x-layout.app>

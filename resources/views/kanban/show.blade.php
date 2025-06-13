<x-layout.app>
    <x-navbar/>

    <x-kanban-header/>

    <div class="sm:rounded-xl bg-base-200 sm:my-10 w-full sm:w-xl md:w-3xl lg:w-5xl xl:w-7xl">
        <div class="tabs tabs-border">
            <x-stage name="Planned"/>
            <x-stage name="Ongoing" :is_checked="true"/>
            <x-stage name="Completed"/>
        </div>
    </div>

    @include('kanban.partials.show-create-modal')
    @include('kanban.partials.show-edit-modal')
    @include('kanban.partials.show-delete-confirmation-modal')

    {{-- Check for create form validation errors TODO--}}
    @if($errors->hasAny(['create-title', 'create-description']))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                create_modal.showModal();
            });
        </script>
    @endif

    {{-- Check for edit form validation errors --}}
    @if($errors->hasAny(['edit-title', 'edit-description']))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                edit_modal.showModal();
            });
        </script>
    @endif

    <script>
        function editTask(taskId, title, description, stage, priority, assignedTo, deadline) {
            // Set form values
            document.getElementById('edit-title').value = title;
            document.getElementById('edit-description').value = description;

            // Set select values
            document.querySelector('[name="edit-stage"]').value = stage;
            document.querySelector('[name="edit-priority"]').value = priority;

            // Set deadline
            document.querySelector('[name="edit-deadline"]').value = deadline;

            // Handle assigned users
            try {
                // Parse assignedTo if it's a string
                let assignedUsers = assignedTo;
                if (typeof assignedTo === 'string' &&
                    (assignedTo.startsWith('[') || assignedTo.startsWith('{'))) {
                    assignedUsers = JSON.parse(assignedTo);
                }

                // Ensure assignedUsers is an array
                if (!Array.isArray(assignedUsers)) {
                    assignedUsers = assignedUsers ? [assignedUsers] : [];
                }

                // You might need to update your x-assigned component to use edit-assigned[] for the edit form
                const checkboxes = document.querySelectorAll('input[name="edit-assigned[]"]');
                checkboxes.forEach(checkbox => {
                    // Check the box if the email is in assignedUsers
                    checkbox.checked = assignedUsers.includes(checkbox.value);
                });

            } catch (e) {
                console.error("Error setting assigned users:", e);
            }

            // Set hidden task ID
            document.getElementById('edit-task-id').value = taskId;

            // Update action URLs
            document.getElementById('edit-task-form').action = `/task/${taskId}`;

            // Show modal
            edit_modal.showModal();
        }

        function openDeleteConfirmationModal() {
            // Get data from edit form
            const id = document.getElementById('edit-task-id').value;
            document.getElementById('delete-task-title').textContent = document.getElementById('edit-title').value;

            // Set the form action
            document.getElementById('confirm-delete-form').action = `/task/${id}`;

            // Close edit modal and open confirmation modal
            edit_modal.close();
            delete_confirmation_modal.showModal();
        }
    </script>
</x-layout.app>

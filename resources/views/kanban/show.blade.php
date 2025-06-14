<x-layout.app>
    <x-navbar/>

    <x-kanban-header :kanban="$kanban"/>

    <div class="sm:rounded-xl bg-base-200 sm:my-10 w-full sm:w-xl md:w-3xl lg:w-5xl xl:w-7xl">
        <div class="tabs tabs-border">
            <x-stage name="Planned" :is_checked="session('stage') === 'planned'?: true" :kanban="$kanban" :tasks="$kanban->tasks->where('stage', 'planned')"></x-stage>
            <x-stage name="Ongoing" :is_checked="session('stage') === 'ongoing'" :kanban="$kanban" :tasks="$kanban->tasks->where('stage', 'ongoing')" />
            <x-stage name="Completed" :is_checked="session('stage') === 'completed'" :kanban="$kanban" :tasks="$kanban->tasks->where('stage', 'completed')" />
        </div>
    </div>

    @include('kanban.partials.show-create-modal')
    @include('kanban.partials.show-edit-modal')
    @include('kanban.partials.show-delete-confirmation-modal')

    {{-- Check for create form validation errors--}}
    @if($errors->hasAny(['create-title', 'create-description', 'create-stage', 'create-priority', 'create-assigned', 'create-deadline']))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                create_modal.showModal();
            });
        </script>
    @endif

    {{-- Check for edit form validation errors --}}
    @if($errors->hasAny(['edit-title', 'edit-description', 'edit-stage', 'edit-priority', 'edit-assigned', 'edit-deadline']))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                edit_modal.showModal();
            });
        </script>
    @endif

    <script>
        function editTask(taskId, title, description, stage, priority, assignedTo, deadline) {
            const kanbanCode = document.getElementById('edit-kanban-code').value;

            // Set form values
            document.getElementById('edit-title').value = title;
            document.getElementById('edit-description').value = description;

            // Set select values
            document.querySelector('[name="edit-stage"]').value = stage;
            document.querySelector('[name="edit-priority"]').value = priority;

            // Set deadline
            // Format deadline for form input (YYYY-MM-DD)
            document.querySelector('[name="edit-deadline"]').value = deadline ? new Date(deadline).toISOString().split('T')[0] : '';

            // Handle assigned users
            try {
                // Ensure assignedTo is properly handled as an array of IDs
                let assignedUserIds = assignedTo;

                // Parse assignedTo if it's a JSON string
                if (typeof assignedTo === 'string' &&
                    (assignedTo.startsWith('[') || assignedTo.startsWith('{'))) {
                    assignedUserIds = JSON.parse(assignedTo);
                }

                // Ensure it's an array
                if (!Array.isArray(assignedUserIds)) {
                    assignedUserIds = assignedUserIds ? [assignedUserIds] : [];
                }

                // Check/uncheck user checkboxes based on their ID
                const checkboxes = document.querySelectorAll('input[name="edit-assigned[]"]');
                checkboxes.forEach(checkbox => {
                    // Convert checkbox value to number for proper comparison
                    const userId = parseInt(checkbox.value, 10);
                    checkbox.checked = assignedUserIds.includes(userId);
                });
            } catch (e) {
                console.error("Error setting assigned users:", e);
            }

            // Set hidden fields
            document.getElementById('edit-task-id').value = taskId;

            // Update action URLs
            document.getElementById('edit-task-form').action = `/kanban/${kanbanCode}/task/${taskId}`;

            // Show modal
            edit_modal.showModal();
        }

        function openDeleteConfirmationModal() {
            // Get data from edit form
            const code = document.getElementById('edit-kanban-code').value;
            const id = document.getElementById('edit-task-id').value;
            document.getElementById('delete-task-title').textContent = document.getElementById('edit-title').value;

            // Set the form action
            document.getElementById('confirm-delete-form').action = `/kanban/${code}/task/${id}`;

            // Close edit modal and open confirmation modal
            edit_modal.close();
            delete_confirmation_modal.showModal();
        }
    </script>
</x-layout.app>

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

            // Handle assigned users (parse if it's a string representation of an array)
            let assignedUsers;
            try {
                // Try to parse if it's a JSON string array
                if (typeof assignedTo === 'string' &&
                    (assignedTo.startsWith('[') || assignedTo.startsWith('{'))) {
                    assignedUsers = JSON.parse(assignedTo);
                } else {
                    assignedUsers = assignedTo;
                }

                // Find assigned select/input element(s)
                const assignedElement = document.querySelector('[name="edit-assigned"]');
                if (assignedElement) {
                    if (assignedElement.tagName === 'SELECT' && assignedElement.multiple) {
                        // For multi-select dropdowns
                        Array.from(assignedElement.options).forEach(option => {
                            option.selected = Array.isArray(assignedUsers)
                                ? assignedUsers.includes(option.value)
                                : option.value === assignedUsers;
                        });
                    } else {
                        // For single input
                        assignedElement.value = Array.isArray(assignedUsers)
                            ? assignedUsers.join(',')
                            : assignedUsers;
                    }
                }

                // If there's a custom component with a setup function
                if (window.setupAssignedUsers && typeof window.setupAssignedUsers === 'function') {
                    window.setupAssignedUsers(assignedUsers);
                }
            } catch (e) {
                console.error("Error setting assigned users:", e);
            }

            // Set hidden task ID
            document.getElementById('edit-task-id').value = taskId;

            // Update action URLs
            document.getElementById('edit-task-form').action = `/tasks/${taskId}`;
            document.getElementById('delete-task-form').action = `/tasks/${taskId}`;

            // Show modal
            edit_modal.showModal();
        }

        // Handle delete button click
        document.getElementById('delete-task-btn').addEventListener('click', function() {
            if (confirm('Are you sure you want to delete this task?')) {
                document.getElementById('delete-task-form').submit();
            }
        });
    </script>
</x-layout.app>

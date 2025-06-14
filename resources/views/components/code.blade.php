@props([
    'is_joined' => false,
    'code' => '',
])

<div class="rounded-lg {{ $is_joined? 'bg-primary' : 'bg-base-200' }} px-3 py-1 flex gap-2 items-center">
    <div id="copy-{{ $code }}" class="tooltip-left md:tooltip-right"
         data-tip="Copied to clipboard!">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="{{ $is_joined? 'color-primary-content' : 'currentColor' }}" class="w-4 cursor-pointer hover:text-base-content" onclick="copyToClipboard('kanban-{{ $code }}', 'copy-{{ $code }}'); event.stopPropagation(); return false;">
            <path d="M360-240q-33 0-56.5-23.5T280-320v-480q0-33 23.5-56.5T360-880h360q33 0 56.5 23.5T800-800v480q0 33-23.5 56.5T720-240H360Zm0-80h360v-480H360v480ZM200-80q-33 0-56.5-23.5T120-160v-560h80v560h440v80H200Zm160-240v-480 480Z"/>
        </svg>
    </div>
    <span id="kanban-{{ $code }}" class="{{ $is_joined? 'text-primary-content' : 'text-base-content' }}">{{ $code }}</span>
</div>

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
</script>

@props([
        'name',
        'label' => null,
        'placeholder' => '',
        'value' => null,
])

<fieldset class="mb-4 w-full">
    @if($label)
        <label for="{{ $name }}" class="block mb-2 text-sm font-medium">{{ $label }}</label>
    @endif

    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes(['class' => 'textarea w-full']) }}>{{ old($name, $value) }}</textarea>

    @error($name)
        <p class="text-error text-sm mt-1">{{ $message }}</p>
    @enderror

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const textarea = document.getElementById('{{ $name }}');
            const lineHeight = parseInt(window.getComputedStyle(textarea).lineHeight);
            const maxHeight = lineHeight * 10; // Limit to approximately 10 lines

            // Function to resize with max height limit
            const resizeTextarea = () => {
                textarea.style.height = 'auto';
                textarea.style.height = Math.min(textarea.scrollHeight, maxHeight) + 'px';
                textarea.style.overflowY = textarea.scrollHeight > maxHeight ? 'auto' : 'hidden';
            };

            // Initial resize
            resizeTextarea();

            // Add input event listener
            textarea.addEventListener('input', resizeTextarea);
        });
    </script>
</fieldset>

@props([
        'name',
        'label' => null,
])

<fieldset class="mb-4 w-full">
    @if($label)
        <label for="{{ $name }}" class="block mb-2 text-sm font-medium">{{ $label }}</label>
    @endif

    <label class="input validator w-full p-0">
        <select id="{{ $name }}" name="{{ $name }}"{{ $attributes(['class'=>'select w-full']) }}>
            {{ $slot }}
        </select>
    </label>

    @error($name)
        <p class="text-error text-sm mt-1">{{ $message }}</p>
    @enderror
</fieldset>

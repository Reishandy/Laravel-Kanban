@props([
        'name',
        'label' => null,
        'type' => 'text',
        'placeholder' => '',
        'value' => null,
        'helper' => null,
    ])

<div class="mb-4">
    @if($label)
        <label for="{{ $name }}" class="block mb-2 text-sm font-medium">{{ $label }}</label>
    @endif

    <label class="input validator">
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            value="{{ old($name, $value) }}"
            {{ $attributes }}
        />
    </label>

    @if($helper)
        <p class="validator-hint hidden">{{ $helper }}</p>
    @endif

    @error($name)
        <p class="text-error text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

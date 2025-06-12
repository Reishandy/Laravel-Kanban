@props([
    'label' => 'Default',
    'value' => 'dark'
])

<input
    type="radio"
    name="theme-dropdown"
    class="theme-controller btn btn-sm btn-block btn-ghost justify-start [&:checked]:bg-primary [&:checked]:text-primary-content"
    aria-label="{{ $label }}"
    value="{{ $value }}" />

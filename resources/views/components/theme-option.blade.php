@props([
    'label' => 'Default',
    'value' => 'dark'
])

<input
    type="radio"
    name="theme-dropdown"
    class="theme-controller btn btn-sm btn-block btn-ghost justify-start"
    aria-label="{{ $label }}"
    value="{{ $value }}" />

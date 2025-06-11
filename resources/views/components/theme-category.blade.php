@props([
    'title' => 'Dark',
    'themes'
])

<div class="divider px-2 my-1">{{ $title }}</div>
@foreach ($themes as $theme)
<li>
    <x-theme-option :label="$theme['label']" :value="$theme['value']" />
</li>
@endforeach

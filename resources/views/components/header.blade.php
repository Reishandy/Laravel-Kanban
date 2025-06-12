@props([
    'title' => '',
    'description' => '',
])

<header class="bg-base-200 p-6">
    <h1 class="text-2xl font-medium text-base-content">
        {{ $title ?: 'Title' }}
    </h1>

    <p class="mt-1 text-sm text-base-content/50">
        {{ $description ?: 'Description' }}
    </p>
</header>

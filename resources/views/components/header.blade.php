@props([
    'title' => '',
    'description' => '',
])

<header class="flex flex-col gap-4 sm:gap-0 sm:flex-row sm:justify-between sm:items-center sm:rounded-xl bg-base-200 p-6 w-full sm:mt-10 sm:w-xl md:w-3xl lg:w-5xl xl:w-7xl">
    <div>
        <h1 class="text-2xl font-medium text-base-content">
            {{ $title ?: 'Title' }}
        </h1>

        <p class="mt-1 text-sm text-base-content/50">
            {{ $description ?: 'Description' }}
        </p>
    </div>

    {{ $slot }}

</header>

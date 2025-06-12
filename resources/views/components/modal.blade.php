@props([
    'modal_id',
    'title',
    'description',
])

<dialog id="{{ $modal_id }}" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <header>
            <h2 class="font-bold text-base-content text-2xl">{{ $title }}</h2>
            <p class="mt-1 text-sm text-base-content/50">{{ $description }}</p>
        </header>

        {{ $slot }}

        <div class="modal-action hidden">
            <form id="{{ $modal_id }}_dialog" method="dialog"></form>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button class="hover:cursor-default">close</button>
    </form>
</dialog>

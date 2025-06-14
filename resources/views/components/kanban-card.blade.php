@props([
    'is_new' => false,
    'is_updated' => false,
    'kanban',
])

<div class="card bg-base-100 shadow-xl rounded-xl hover:bg-neutral/40 transition-colors duration-300">
    <a href="/kanban/{{ $kanban->code }}" class="hover:cursor-default h-full">
        <div class="card-body flex flex-col justify-between h-full">
            <div class="flex justify-between flex-col items-start gap-2">

                <div class="flex items-center gap-2 justify-between w-full">
                    <x-code :is_joined="$kanban->members->contains(auth()->user())" :code="$kanban->code" />

                @can('update', $kanban)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="w-5 mb-1 cursor-pointer" onclick="openEditModal({{ Js::from($kanban->code) }}, {{ Js::from($kanban->title) }}, {{ Js::from($kanban->description) }}); event.stopPropagation(); return false;">
                            <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/>
                        </svg>
                    @endcan
                </div>

                @if($is_new)
                    <div class="rounded-lg badge badge-accent w-full">New</div>
                @endif
                @if($is_updated)
                    <div class="rounded-lg badge badge-info w-full">Updated</div>
                @endif
            </div>

            <div class="pt-24">
                <h2 class="font-bold text-3xl mb-2">{{ $kanban->title }}</h2>
                <p class="text-base-content/50 text-sm text-justify line-clamp-3 overflow-hidden mb-2">{{ $kanban->description }}</p>
            </div>
        </div>
    </a>
</div>

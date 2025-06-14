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
                    <div class="rounded-lg {{ $kanban->user->id === auth()->user()->id? 'bg-base-200' : 'bg-primary' }} px-3 py-1 flex gap-2 items-center">
                        <div id="copy-{{ $kanban->code }}" class="tooltip-left md:tooltip-right"
                             data-tip="Copied to clipboard!">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="w-4 cursor-pointer hover:text-base-content" onclick="copyToClipboard('kanban-{{ $kanban->code }}', 'copy-{{ $kanban->code }}'); event.stopPropagation(); return false;">
                                <path d="M360-240q-33 0-56.5-23.5T280-320v-480q0-33 23.5-56.5T360-880h360q33 0 56.5 23.5T800-800v480q0 33-23.5 56.5T720-240H360Zm0-80h360v-480H360v480ZM200-80q-33 0-56.5-23.5T120-160v-560h80v560h440v80H200Zm160-240v-480 480Z"/>
                            </svg>
                        </div>
                        <span id="kanban-{{ $kanban->code }}">{{ $kanban->code }}</span>
                    </div>
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

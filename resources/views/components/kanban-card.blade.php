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
                    <div class="rounded-lg {{ $kanban->user->id === auth()->user()->id? 'bg-base-200' : 'bg-accent' }} px-3 py-1 flex gap-2 items-center">
                        <div id="copy-{{ $kanban->code }}" class="tooltip-left md:tooltip-right"
                             data-tip="Copied to clipboard!">
                            <x-gmdi-content-copy class="w-4 cursor-pointer hover:text-base-content"
                                                 onclick="copyToClipboard('kanban-{{ $kanban->code }}', 'copy-{{ $kanban->code }}'); event.stopPropagation(); return false;"/>
                        </div>
                        <span id="kanban-{{ $kanban->code }}">{{ $kanban->code }}</span>
                    </div>
                    @can('update', $kanban)
                        <x-gmdi-edit class="w-5 mb-1 cursor-pointer"
                                     onClick="openEditModal({{ Js::from($kanban->code) }}, {{ Js::from($kanban->title) }}, {{ Js::from($kanban->description) }}); event.stopPropagation(); return false;"/>
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

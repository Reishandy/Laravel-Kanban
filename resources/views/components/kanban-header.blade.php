@props(['kanban'])

<header class="sm:rounded-xl bg-base-200 p-6 w-full sm:mt-10 sm:w-xl md:w-3xl lg:w-5xl xl:w-7xl">
    <div class="flex flex-col justify-between items-start">
        <div class="flex flex-row items-center justify-between w-full">
            <div class="text-base-content/50">
                {{ $kanban->created_at->format('d M Y') }}
            </div>

            <x-code :is_joined="$kanban->members->contains(auth()->user())" :code="$kanban->code" />
        </div>

        <h1 class="text-2xl font-medium text-base-content" id="kanban-title">
            {{ $kanban->title }}
        </h1>

        <p class="mt-1 text-sm text-base-content/50">
            {{ $kanban->description }}
        </p>

        <div class="mt-4 sm:flex sm:gap-4">
            <div>
                Planned: {{ $kanban->tasks->where('stage', 'planned')->count() }}
            </div>
            <div>
                Ongoing: {{ $kanban->tasks->where('stage', 'ongoing')->count() }}
            </div>
            <div>
                Completed: {{ $kanban->tasks->where('stage', 'completed')->count() }}
            </div>
        </div>

        <div class="flex flex-wrap mt-4 gap-2 ">
            @foreach($kanban->members->merge(collect([$kanban->user])) as $user)
                <x-user-badge name="{{ $user->name }}" email="{{ $user->email }}"
                              :is_creator="$user === $kanban->user"/>
            @endforeach
        </div>

        <div class="flex flex-row gap-4">
            <button class="btn btn-soft w-30 mt-4" onClick="create_modal.showModal()">Add</button>

            @if(!(auth()->user()->id === $kanban->user->id))
                <button class="btn btn-error w-30 mt-4" onClick="openLeaveConfirmationModal()">Leave</button>
            @endif
        </div>
    </div>
</header>

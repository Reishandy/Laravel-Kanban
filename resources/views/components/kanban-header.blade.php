@props([])

{{-- TODO: add --}}

<header class="sm:rounded-xl bg-base-200 p-6 w-full sm:mt-10 sm:w-xl md:w-3xl lg:w-5xl xl:w-7xl">
    <div class="flex flex-col justify-between items-start">
        <div class="text-base-content/50 text-sm">
            01/01/1970
        </div>

        <h1 class="text-2xl font-medium text-base-content">
            Kanban Title
        </h1>

        <p class="mt-1 text-sm text-base-content/50">
            Description
        </p>

        <div class="mt-4 sm:flex sm:gap-4">
            <div>
                Planned: 0
            </div>
            <div>
                Ongoing: 0
            </div>
            <div>
                Completed: 0
            </div>
        </div>

        <div class="flex flex-wrap mt-4 gap-2 ">
            <x-user-badge name="Reishandy" email="akbar@reishandy.my.id" :is_creator="true"/>
            @for($i = 1; $i <= 10; $i++)
                <x-user-badge name="Member {{ $i }}" email="email@example.com" :is_creator="false"/>
            @endfor
        </div>
    </div>
</header>

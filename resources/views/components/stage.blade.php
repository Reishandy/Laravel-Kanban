<div class="flex flex-col gap-4">
    @for($i = 1; $i <= 10; $i++)
        <div class="card bg-base-100 border-1 border-base-content/50 shadow-xl rounded-xl p-6 hover:bg-neutral/40 hover:border-base-content transition-colors duration-300">
            {{-- Priority --}}
            {{-- Edit --}}
            <div class="rounded-lg badge badge-accent w-full">New</div>

            {{-- Title --}}
            {{-- Description --}}

            {{-- Assigned to --}}
            {{-- Deadlline --}}
        </div>
    @endfor
</div>

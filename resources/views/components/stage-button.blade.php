@props([
    'kanban_code',
    'task_id',
    'direction' => 'left',
    'stage',
])

<form method="POST" action="/kanban/{{ $kanban_code }}/task/{{ $task_id }}/move">
    @csrf
    @method('PATCH')

    <input type="hidden" name="stage" value="{{ $stage }}"/>

    @if($stage)
        <button class="flex items-center cursor-pointer hover:text-base-content/50 transition-colors duration-300"
                type="submit">
            @if($direction === 'left')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="w-10 mb-0.5 mr-1">
                    <path d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z"/>
                </svg>
                {{ ucfirst($stage) }}
            @else
                {{ ucfirst($stage) }}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="w-10 mb-0.5 mr-1">
                    <path d="M383-480 200-664l56-56 240 240-240 240-56-56 183-184Zm264 0L464-664l56-56 240 240-240 240-56-56 183-184Z"/>
                </svg>
            @endif
        </button>
    @endif
</form>

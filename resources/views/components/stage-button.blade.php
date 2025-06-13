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
                <x-gmdi-keyboard-double-arrow-left class="w-10 mb-0.5 mr-1"/>
                {{ ucfirst($stage) }}
            @else
                {{ ucfirst($stage) }}
                <x-gmdi-keyboard-double-arrow-right class="w-10 mb-0.5 mr-1"/>
            @endif
        </button>
    @endif
</form>

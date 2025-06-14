@php use Carbon\Carbon; @endphp
@props([
    'kanban',
    'task',
])

@php
    $borderColor = match($task->stage) {
        'planned' => 'border-info/50',
        'ongoing' => 'border-secondary/50',
        'completed' => 'border-success/50',
        default => 'border-base-content',
    };

    $priorityColor = match($task->priority) {
        'low' => 'badge-info',
        'medium' => 'badge-secondary',
        'high' => 'badge-error',
        default => 'badge-normal',
    };

    [$stagePrev, $stageNext] = match($task->stage) {
    'planned' => [null, 'ongoing'],
    'ongoing' => ['planned', 'completed'],
    'completed' => ['ongoing', null],
    default => [null, null],
};
@endphp

<div
    class="card bg-base-100 border-1 {{ $borderColor }} shadow-xl rounded-xl p-6 hover:bg-neutral/40 hover:border-base-content transition-colors duration-300">
    <div class="flex items-center justify-between mb-2">
        <div class="badge {{ $priorityColor }}">{{ $task->priority }}</div>

        @if($task->deadline)
            <div class="badge badge-outline {{ $task->deadline < now() ? 'badge-error' : 'badge-info' }}">
                {{ $task->deadline ? Carbon::parse($task->deadline)->format('d M, Y') : '' }}
            </div>
        @endif

        <x-gmdi-edit class="w-5 mb-1 cursor-pointer hover:text-base-content/50 transition-colors duration-300"
                     onclick="editTask({{ Js::from($task->id) }}, {{ Js::from($task->title) }}, {{ Js::from($task->description) }}, {{ Js::from($task->stage) }}, {{ Js::from($task->priority) }}, {{ Js::from($task->users->pluck('id')->toArray()) }}, {{ Js::from($task->deadline) }})"/>
    </div>

    @if(session('status') === 'new-' . $task->id )
        <div class="rounded-lg badge badge-accent w-full">New</div>
    @endif

    @if(session('status') === 'updated-' . $task->id )
        <div class="rounded-lg badge badge-info w-full">Updated</div>
    @endif

    <div class="flex flex-row items-center justify-between mt-2">

        <x-stage-button
            :kanban_code="$kanban->code"
            :task_id="$task->id"
            direction="left"
            :stage="$stagePrev"
        />

        <x-stage-button
            :kanban_code="$kanban->code"
            :task_id="$task->id"
            direction="right"
            :stage="$stageNext"
        />
    </div>

    <div class="pt-24">
        <h2 class="font-bold text-3xl mb-2">{{ $task->title }}</h2>
        <p class="text-base-content/50 text-sm text-justify mb-2">
            {{ $task->description ?: '' }}
        </p>
    </div>

    <div class="flex flex-wrap justify-between gap-2 mt-4">
        @foreach($task->users->sortBy('name') as $user)
            <x-user-badge name="{{ $user->name }}" email="{{ $user->email }}"
                          :is_assigned="$user->id === auth()->user()->id"/>
        @endforeach
    </div>
</div>

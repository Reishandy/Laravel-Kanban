@props([
    'kanban',
    'task',
])

{{-- TODO: Border is based on stage --}}
{{-- Planned: Info, Ongoing: Secondary, Completed: Success --}}
@php
    $borderColor = match($task->stage) {
        'planned' => 'border-info',
        'ongoing' => 'border-secondary',
        'completed' => 'border-success',
        default => 'border-base-content',
    };

    $priorityColor = match($task->priority) {
        'low' => 'badge-info',
        'medium' => 'badge-secondary',
        'high' => 'badge-error',
        default => 'badge-normal',
    };
@endphp
<div class="card bg-base-100 border-1 {{ $borderColor }}/50 shadow-xl rounded-xl p-6 hover:bg-neutral/40 hover:border-base-content transition-colors duration-300">
    <div class="flex items-center justify-between mb-2">
        {{-- Low: Info, Medium: Secondary, High: Error --}}
        <div class="badge {{ $priorityColor }}">{{ $task->priority }}</div>
        <div class="badge badge-outline">{{ $task->deadline }}</div>
        <x-gmdi-edit class="w-5 mb-1 cursor-pointer hover:text-base-content/50 transition-colors duration-300"
                     onclick="editTask({{ Js::from($kanban->code) }}, {{ Js::from($task->id) }}, {{ Js::from($task->title) }}, {{ Js::from($task->description) }}, {{ Js::from($task->stage) }}, {{ Js::from($task->priority) }}, {{ Js::from($task->assigned_to) }}, {{ Js::from($task->deadline) }})"/>
    </div>

    <div class="rounded-lg badge badge-accent w-full">New</div>

    <div class="flex flex-row items-center justify-between mt-2">
        <div class="flex items-center cursor-pointer hover:text-base-content/50 transition-colors duration-300"
             onClick="alert('TODO')"> {{-- TODO: Task movement --}}
            <x-gmdi-keyboard-double-arrow-left class="w-10 mb-0.5 mr-1"/>
            Planned
        </div>
        <div class="flex items-center cursor-pointer hover:text-base-content/50 transition-colors duration-300"
             onClick="alert('TODO')">
            Completed
            <x-gmdi-keyboard-double-arrow-right class="w-10 mb-0.5 ml-1"/>
        </div>
    </div>

    <div class="pt-24">
        <h2 class="font-bold text-3xl mb-2">{{ $task->title }}</h2>
        <p class="text-base-content/50 text-sm text-justify mb-2">
            {{ $task->description ?: '' }}
        </p>
    </div>

    <div class="flex flex-wrap justify-between gap-2 mt-4">
        @foreach($task->users as $user)
            <x-user-badge name="{{ $user->name }}" email="{{ $user->email }}" :is_assigned="$user === auth()->user()"/>
        @endforeach
    </div>
</div>

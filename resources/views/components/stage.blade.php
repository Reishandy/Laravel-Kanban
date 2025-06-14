@props([
    'name',
    'kanban',
    'tasks',
    'is_checked' => false,
])

@php
    // Sort tasks by priority (high -> medium -> low)
    $sortedTasks = $tasks->sortBy(function ($task) {
        return match($task->priority) {
            'high' => 1,
            'medium' => 2,
            'low' => 3,
            default => 4,
        };
    });
@endphp

<input type="radio" name="stages" class="tab sm:text-lg m-2" aria-label="{{ $name }}" {{ $is_checked? 'checked="checked"': ''}}/>
<div class="tab-content sm:border-base-300 sm:bg-base-100 p-6">
    @if(session('status') === 'deleted')
        <div class="flex items-center justify-center">
            <div class="rounded-lg badge badge-error my-6 w-full">Task Deleted</div>
        </div>
    @endif

    <div class="gap-4 grid grid-cols-1 lg:grid-cols-2">
        @foreach($sortedTasks as $task)
            <x-task-card :kanban="$kanban" :task="$task"/>
        @endforeach
    </div>

    <button class="btn btn-soft w-full mt-4" onClick="create_modal.showModal()">Add</button>
</div>

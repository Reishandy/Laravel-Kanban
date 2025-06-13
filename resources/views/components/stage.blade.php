@props([
    'name',
    'is_checked' => false,
])

<input type="radio" name="stages" class="tab sm:text-lg m-2" aria-label="{{ $name }}" {{ $is_checked? 'checked="checked"': ''}}/>
<div class="tab-content sm:border-base-300 sm:bg-base-100 p-6">
    <div class="gap-4 grid grid-cols-1 lg:grid-cols-2">
        @for($i = 1; $i <= 10; $i++)
            <x-task-card/>
        @endfor
    </div>

    <button class="btn btn-soft w-full mt-4" onClick="create_modal.showModal()">Add</button>
</div>

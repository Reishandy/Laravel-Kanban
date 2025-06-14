@props([
    'mode' => 'create',
    'users' => [],
])

<fieldset class="mb-4 w-full">
    <label class="block mb-2 text-sm font-medium">Assigned to</label>

    <div class="border rounded-lg p-3 space-y-2 bg-base-100">
        @foreach($users as $user)
            <div class="flex items-center">
                <input type="checkbox"
                       id="{{ $mode }}-assigned-{{ $loop->index }}"
                       name="{{ $mode }}-assigned[]"
                       value="{{ $user->id }}"
                       class="checkbox checkbox-sm mr-3">
                <label for="{{ $mode }}-assigned-{{ $loop->index }}" class="text-sm cursor-pointer">
                    {{ $user->name }} - {{ $user->email }}
                </label>
            </div>
        @endforeach
    </div>

    @error("$mode-assigned")
    <p class="text-error text-sm mt-1">{{ $message }}</p>
    @enderror
</fieldset>

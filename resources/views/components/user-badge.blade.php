@props([
    'name' => 'User',
    'email' => 'example@example.com',
    'is_creator' => false
])

<div class="badge badge-soft {{ !$is_creator ?: 'badge-accent' }} flex items-center gap-1 max-w-full">
    <span class="truncate">{{ $name }}</span>
    <span class="hidden sm:inline">-</span>
    <span class="hidden sm:inline truncate">{{ $email }}</span>
</div>

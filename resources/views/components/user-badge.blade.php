@props([
    'name' => 'User',
    'email' => 'example@example.com',
    'is_creator' => false
])

<div class="badge badge-soft {{ !$is_creator?: 'badge-accent' }}">{{ $name }} - {{ $email }}</div>

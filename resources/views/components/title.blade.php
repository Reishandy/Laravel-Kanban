@props(['type' => 'login'])

<div class="card-title flex flex-col p-2">
    <h2 class="font-bold text-5xl">{{ $type === 'login' ? 'Log In' : 'Register' }}</h2>
    <p class="mt-2 text-base-content/50">{{ $type === 'login' ? 'Welcome back' : 'Join us' }}</p>
</div>

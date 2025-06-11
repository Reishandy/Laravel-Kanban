@props(['type' => 'login'])

<div class="card w-96 bg-base-100 shadow-xl rounded-b-xl rounded-t-none">
    <div class="card-body flex justify-center items-center p-6">
        <p class="text-base-content">{{  $type === 'login' ? "Don't have an account yet?" : 'Already have an account?' }}</p>
        <a href="{{ route($type === 'login' ? 'register' : 'login') }}" class="link link-primary">{{ $type === 'login' ? 'Register' : 'Login' }}</a>
    </div>
</div>

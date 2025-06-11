@props(['type' => 'login'])

<div class="flex flex-row justify-between items-center mt-8">
    <a href="{{ route('password.request') }}" class="link">{{ $type === 'login' ? 'Forget Password?' : '' }}</a> {{--Empty for register--}}

    <button class="btn btn-soft btn-primary">{{ $type === 'login' ? 'Log In' : 'Register' }}</button>
</div>

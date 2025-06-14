<x-layout.app>
    <div class="flex min-h-screen items-center">
        <div class="card w-96 bg-base-200 shadow-xl rounded-t-xl rounded-b-none">
            <div class="card-body flex justify-center">
                <p class="text-justify">Enter your email to receive a password reset link.</p>

                <!-- Session Status -->
                <x-auth-session-status class="mt-4" :status="session('status')" />

                <form id="password-reset-form" class="py-4" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-4">
                        <x-input
                            type="email"
                            name="email"
                            label="Email"
                            placeholder="Valid email address"
                            required
                            helper="Enter valid email address"
                        />
                    </div>

                    <div class="mt-4 flex items-center justify-between">
                        <button id="password-reset-button" type="submit" class="btn btn-primary">Email Password Reset Link</button>
                        <a href="{{ route('home') }}" class="link">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('password-reset-form');
        const resetButton = document.getElementById('password-reset-button');

        form.addEventListener('submit', function() {
            // This runs before form submission completes
            resetButton.disabled = true;
            resetButton.innerHTML = '<span class="loading loading-dots loading-md"></span>';
        });
    });
</script>

<x-layout.app>
    <div class="flex min-h-screen items-center">
        <div class="card w-96 bg-base-200 shadow-xl rounded-t-xl rounded-b-none">
            <div class="card-body flex justify-center">
                <x-title type="login"/>

                <!-- Session Status -->
                <div class="flex justify-center">
                    <x-auth-session-status class="mt-4" :status="session('status')"/>
                </div>

                <div class="divider"></div>

                <div class="p-2">
                    <form id="login-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-4">
                            <x-input
                                type="email"
                                name="email"
                                label="Email"
                                placeholder="Valid email address"
                                :value="old('email')"
                                required
                                helper="Enter valid email address"
                            />
                        </div>

                        {{-- Password --}}
                        <div class="mb-4">
                            <x-input
                                type="password"
                                name="password"
                                label="Password"
                                placeholder="Password"
                                required
                            />
                        </div>

                        {{-- Remember Me --}}
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="checkbox" name="remember">
                            <span class="ms-2 text-sm text-base-content">Remember me</span>
                        </label>

                        {{-- Forgot and Button --}}
                        <x-forgetnbutton type="login"/>
                    </form>
                </div>
            </div>

            {{-- Login instead --}}
            <x-instead type="login"/>
        </div>
    </div>
</x-layout.app>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('login-form');
        const resetButton = document.getElementById('auth-button');

        form.addEventListener('submit', function() {
            // This runs before form submission completes
            resetButton.disabled = true;
            resetButton.innerHTML = '<span class="loading loading-dots loading-md"></span>';
        });
    });
</script>

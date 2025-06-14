<x-layout.app>
    <div class="flex min-h-screen items-center">
        <div class="card w-96 bg-base-200 shadow-xl rounded-t-xl rounded-b-none">
            <div class="card-body flex justify-center">
                <x-title type="register"/>

                <div class="divider"></div>

                <div class="p-2">
                    <form id="register-form" method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Username --}}
                        <div class="mb-4">
                            <x-input
                                type="text"
                                name="name"
                                label="Username"
                                placeholder="Username"
                                :value="old('name')"
                                required
                                minlength="3"
                                maxlength="30"
                                pattern="[A-Za-z][A-Za-z0-9\-]*"
                                helper="Must be 3 to 30 characters containing only letters, numbers or dash"
                            />
                        </div>

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
                                minlength="8"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                helper="Must be more than 8 characters, including at least one number, one lowercase letter, and one uppercase letter"
                            />
                        </div>

                        {{-- Password Confirm --}}
                        <div class="mb-4">
                            <x-input
                                type="password"
                                name="password_confirmation"
                                label="Confirm Password"
                                placeholder="Confirm Password"
                                required
                                helper="Enter password again"
                            />
                        </div>


                        {{-- Forgot and Button --}}
                        <x-forgetnbutton type="register"/>
                    </form>
                </div>
            </div>

            {{-- Login instead --}}
            <x-instead type="register"/>
        </div>
    </div>
</x-layout.app>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('register-form');
        const resetButton = document.getElementById('auth-button');

        form.addEventListener('submit', function() {
            // This runs before form submission completes
            resetButton.disabled = true;
            resetButton.innerHTML = '<span class="loading loading-dots loading-md"></span>';
        });
    });
</script>


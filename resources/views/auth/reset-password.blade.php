<x-layout.app>
    <div class="flex min-h-screen items-center">
        <div class="card w-96 bg-base-200 shadow-xl rounded-t-xl rounded-b-none">
            <div class="card-body flex justify-center">
                <p class="text-justify">Enter your email to receive a password reset link.</p>

                <form class="py-4" method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

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

                    <button class="btn btn-primary">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>

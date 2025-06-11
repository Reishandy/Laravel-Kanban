<x-layout.guest>
    <div class="card w-96 bg-base-200 shadow-xl rounded-t-xl rounded-b-none">
        <div class="card-body flex justify-center">
            <p class="text-justify">Enter your email to receive a password reset link.</p>

            <!-- Session Status -->
            <x-auth-session-status class="mt-4" :status="session('status')" />

            <form class="py-4" method="POST" action="{{ route('password.email') }}">
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

                <button class="btn btn-primary">Email Password Reset Link</button>
            </form>
        </div>
    </div>
</x-layout.guest>

<section>
    <header>
        <h2 class="text-lg font-medium text-base-content">
            Profile Information
        </h2>

        <p class="mt-1 text-sm text-base-content/50">
            Update your account's profile information and email address.
        </p>
    </header>

    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('PATCH')

        {{-- Username --}}
        <div class="mb-4">
            <x-input
                type="text"
                name="name"
                label="Username"
                placeholder="Username"
                :value="old('name', $user->name)"
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
                :value="old('email', $user->email)"
                required
                helper="Enter valid email address"
            />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-base-content">
                        Your email address is unverified

                        <button form="send-verification"
                                class="underline text-sm text-base-content/50 hover:text-base-content/20 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Click here to re-send the verification email.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-success">
                            A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary">Save</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-base-content/50"
                >Saved.</p>
            @endif
        </div>
    </form>
</section>

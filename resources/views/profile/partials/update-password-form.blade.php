<section>
    <header>
        <h2 class="text-lg font-medium text-base-content">
            Update Password
        </h2>

        <p class="mt-1 text-sm text-base-content/50">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('PUT')

        {{-- Current Password --}}
        <div class="mb-4">
            <x-input
                type="password"
                name="update_password_current_password"
                label="Current Password"
                placeholder="Current Password"
                autocomplete="current-password"
                required
                helper="Enter current password"
            />
        </div>

        {{-- New Password --}}
        <div class="mb-4">
            <x-input
                type="password"
                name="update_password_password"
                label="New Password"
                placeholder="New Password"
                autocomplete="new-password"
                required
                minlength="8"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                helper="Must be more than 8 characters, including at least one number, one lowercase letter, and one uppercase letter"
            />
        </div>

        {{-- New Password Confirm --}}
        <div class="mb-4">
            <x-input
                type="password"
                name="update_password_password_confirmation"
                label="Confirm New Password"
                placeholder="Confirm New Password"
                autocomplete="new-password"
                required
                helper="Enter new password again"
            />
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary">Update Password</button>

            @if (session('status') === 'password-updated')
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

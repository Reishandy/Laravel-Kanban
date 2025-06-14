<x-layout.app>
    <div class="flex min-h-screen items-center">
        <div class="card w-96 bg-base-200 shadow-xl rounded-t-xl rounded-b-none">
            <div class="card-body flex justify-center">
                <p class="text-justify">Please verify your email address. No email? Please check spam or click below to
                    resend.</p>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-success">
                        A new verification link has been sent to the email address you provided during registration.
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form id="resend-verification-email-form" method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <button id="resend-verification-email-button" type="submit" class="btn btn-primary">Resend Verification Email</button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button class="link">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('resend-verification-email-form');
        const resetButton = document.getElementById('resend-verification-email-button');

        form.addEventListener('submit', function() {
            // This runs before form submission completes
            resetButton.disabled = true;
            resetButton.innerHTML = '<span class="loading loading-dots loading-md"></span>';
        });
    });
</script>

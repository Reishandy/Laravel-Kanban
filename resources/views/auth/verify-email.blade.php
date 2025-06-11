<x-layout.app>
    <div class="card w-96 bg-base-200 shadow-xl rounded-t-xl rounded-b-none">
        <div class="card-body flex justify-center">
            <p class="text-justify">Thanks for registering! Before getting started, could you verify your email address
                by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you
                another.</p>

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button class="btn btn-soft btn-primary">Resend Verification Email</button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="link">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>

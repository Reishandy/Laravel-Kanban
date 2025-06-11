<section>
    <header>
        <h2 class="text-lg font-medium text-base-content">
            Delete Account
        </h2>

        <p class="mt-1 text-sm text-base-content/50">
            Once your account is deleted, all of its resources and data will be permanently deleted.
        </p>
    </header>

    @error('password')
        <p class="text-error text-sm mt-4">{{ $message }}</p>
    @enderror

    <button class="btn btn-error mt-4" onclick="delete_modal.showModal()">Delete Account</button>

    <dialog id="delete_modal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h2 class="font-bokd text-base-content">
                Are you sure you want to delete your account?
            </h2>

            <p class="mt-1 text-sm text-base-content/50">
                Once your account is deleted, all of its resources and data will be permanently deleted.
            </p>

            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')

                <div class="my-4">
                    <x-input
                        type="password"
                        name="password"
                        label="Password"
                        placeholder="Password"
                        required
                        helper="Input your password"
                    />
                </div>
                <div class="">
                    <button class="btn" form="dialog">Cancel</button>

                    <button class="btn btn-error">Delete Account</button>
                </div>
            </form>

            <div class="modal-action">
                <form id="dialog" method="dialog"></form>
            </div>
        </div>
    </dialog>
</section>

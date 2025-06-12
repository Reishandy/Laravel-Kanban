<x-layout.app>
    <x-navbar/>

    <x-header title="Profile" description="Update your account's profile information, password, and delete."/>

    <div class="sm:rounded-xl bg-base-200 sm:my-10 sm:w-xl md:w-3xl lg:w-5xl xl:w-7xl">
        <div class="max-w-7xl mx-auto py-6 sm:p-6 lg:p-8 space-y-6">
            <div class="p-4 sm:p-8 bg-base-100 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-base-100 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-base-100 shadow sm:rounded-lg">
                <div class="w-full">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-layout.app>

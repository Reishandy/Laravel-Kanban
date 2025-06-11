<div class="navbar bg-base-100 shadow-sm flex-col sm:flex-row gap-2 sm:gap-0">
    <div class="flex-1 w-full sm:w-auto text-left py-2 sm:py-auto">
        <a href="{{ route('dashboard') }}" class="btn btn-ghost text-xl">{{ config('app.name', 'Laravel') }}</a>
    </div>
    <div class="flex-none flex justify-between items-center w-full sm:justify-end sm:w-auto">
        {{-- theme selector --}}
        <div class="dropdown dropdown-start sm:dropdown-end dropdown-hover">
            <div id="theme" tabindex="0" role="button" class="btn btn-ghost m-1">Theme</div>
            <ul tabindex="0" class="dropdown-content menu bg-base-200 rounded-box z-1 w-52 p-2 shadow-sm">
                <x-theme-category title="Dark" :themes="[
                                ['label' => 'Dark', 'value' => 'dark'],
                                ['label' => 'Synthwave', 'value' => 'synthwave'],
                                ['label' => 'Coffee', 'value' => 'coffee'],
                                ['label' => 'Dracula', 'value' => 'dracula'],
                                ['label' => 'Abyss', 'value' => 'abyss'],
                                ['label' => 'Aqua', 'value' => 'aqua'],
                            ]"/>

                <x-theme-category title="Light" :themes="[
                                ['label' => 'Light', 'value' => 'light'],
                                ['label' => 'Retro', 'value' => 'retro'],
                                ['label' => 'Cyberpunk', 'value' => 'cyberpunk'],
                                ['label' => 'Pastel', 'value' => 'pastel'],
                                ['label' => 'Cupcake', 'value' => 'cupcake'],
                                ['label' => 'Lofi', 'value' => 'lofi'],
                                ['label' => 'Wireframe', 'value' => 'wireframe'],
                                ['label' => 'Lemonade', 'value' => 'lemonade'],
                                ['label' => 'Caramellatte', 'value' => 'caramellatte'],
                            ]"/>
            </ul>
        </div>

        <div class="dropdown dropdown-end dropdown-hover">
            <div tabindex="0" role="button" class="btn btn-ghost m-1">{{ Auth::user()->name }}</div>
            <ul tabindex="0" class="dropdown-content menu bg-base-200 rounded-box z-1 w-52 p-2 shadow-sm">
                <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button class="text-error hover:cursor-pointer">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the summary element
        const themeSummary = document.getElementById('theme');

        // Function to update summary text based on selected theme
        function updateThemeSummary() {
            const currentTheme = getTheme();
            const selectedRadio = document.querySelector(`input[name="theme-dropdown"][value="${currentTheme}"]`);

            if (selectedRadio) {
                // Use the aria-label attribute to get the theme name
                themeSummary.textContent = 'Theme: ' + selectedRadio.getAttribute('aria-label');
            }
        }

        // Update on page load
        updateThemeSummary();

        // Add event listeners to all theme options to update the summary when changed
        const themeRadios = document.querySelectorAll('input[name="theme-dropdown"]');
        themeRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.checked) {
                    // Update summary text
                    themeSummary.textContent = 'Theme: ' + this.getAttribute('aria-label');
                }
            });
        });
    });
</script>

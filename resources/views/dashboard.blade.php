<x-layout.app>
    <div class="navbar bg-base-100 shadow-sm flex-col sm:flex-row gap-2 sm:gap-0">
        <div class="flex-1 w-full sm:w-auto text-center sm:text-left py-2 sm:py-auto">
            <a href="{{ route('home') }}" class="btn btn-ghost text-xl">{{ config('app.name', 'Laravel') }}</a>
        </div>
        <div class="flex-none flex justify-between items-center w-full sm:justify-end sm:w-auto">
            {{-- theme selector --}}
            <ul class="menu menu-horizontal px-2">
                <li>
                    <details>
                        <summary>Theme</summary>
                        <ul class="bg-base-100 rounded-t-none p-2 max-h-64 overflow-y-auto">

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
                    </details>
                </li>
            </ul>

            <ul class="menu menu-horizontal px-2">
                <li>
                    <details>
                        <summary>{{ Auth::user()->name }}</summary>
                        <ul class="bg-base-100 rounded-t-none p-2">
                            <li><a href="TODO">Profile</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button class="text-error">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the summary element
            const themeSummary = document.querySelector('li details summary');

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
                radio.addEventListener('change', function() {
                    if (this.checked) {
                        // Update summary text
                        themeSummary.textContent = 'Theme: ' + this.getAttribute('aria-label');
                    }
                });
            });
        });
    </script>
</x-layout.app>

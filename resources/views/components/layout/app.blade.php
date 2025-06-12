<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <script>
        // Get saved theme or use system preference
        function getTheme() {
            return localStorage.getItem('theme') ||
                (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'default' : 'light');
        }

        // Apply theme immediately to prevent flashing
        document.documentElement.setAttribute('data-theme', getTheme());
    </script>

    <link rel="icon" href="https://raw.githubusercontent.com/Reishandy/Reishandy/refs/heads/main/repo/logo_ori.webp" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap"
          rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentTheme = getTheme();

        // Set the correct radio button in theme selector
        const themeRadios = document.querySelectorAll('input[name="theme-dropdown"]');
        themeRadios.forEach(radio => {
            // Set checked state based on current theme
            radio.checked = (radio.value === currentTheme);

            // Add change event listeners to all theme options
            radio.addEventListener('change', function() {
                if (this.checked) {
                    const newTheme = this.value;
                    localStorage.setItem('theme', newTheme);
                }
            });
        });
    });

    function copyToClipboard(elementId, tooltipId) {
        const text = document.getElementById(elementId).textContent.trim();
        const tooltipElement = document.getElementById(tooltipId);

        navigator.clipboard.writeText(text).then(() => {
            // Show the tooltip
            tooltipElement.classList.add('tooltip-open');
            tooltipElement.classList.add('tooltip');

            // Hide the tooltip after 1 second
            setTimeout(() => {
                tooltipElement.classList.remove('tooltip-open');
                tooltipElement.classList.remove('tooltip');
            }, 1000);

            console.log('Copied to clipboard!');
        }).catch(err => {
            console.error('Failed to copy: ', err);
        });
    }

    function openEditModal(code, title, description) {
        // Set form values
        document.getElementById('edit-code').value = code;
        document.getElementById('edit-title').value = title;
        document.getElementById('edit-description').value = description;

        // Update action URL if needed
        document.getElementById('edit-form').action = `/project/${code}`;

        // Show modal
        edit_modal.showModal();
    }
</script>

<body class="flex flex-col items-center min-h-screen bg-base-300">

{{ $slot }}

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('code') - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap"
          rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex items-center justify-center min-h-screen bg-base-300">
<div class="card w-96 bg-base-200 shadow-xl">
    <div class="card-body flex justify-center">
        <h1 class="text-center text-9xl font-extrabold">
            @yield('code')
        </h1>

        <p class="text-center text-base-content/50 text-3xl">
            @yield('message')
        </p>

        <a href="{{ route('home') }}" class="btn btn-ghost">Back</a>
    </div>
</div>
</body>
</html>

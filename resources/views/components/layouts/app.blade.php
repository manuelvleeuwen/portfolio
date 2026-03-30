<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title . ' - Manuel van Leeuwen' }}</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <script>
        (function () {
            const theme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (theme === 'dark' || (!theme && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100 min-h-dvh flex flex-col font-sans antialiased">
<x-navbar />
<main class="flex-1">
    {{ $slot }}
</main>
<x-footer />
</body>
</html>

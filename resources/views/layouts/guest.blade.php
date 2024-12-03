<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <script>
        // document.addEventListener('contextmenu', function(event) {
        //     event.preventDefault();
        // });

        // document.addEventListener('keydown', function(event) {
        //     // Disable F12, Ctrl+Shift+I, Ctrl+U, Ctrl+Shift+J
        //     if (event.key === 'F12' || 
        //         (event.ctrlKey && event.shiftKey && event.key === 'I') || 
        //         (event.ctrlKey && event.key === 'U') || 
        //         (event.ctrlKey && event.shiftKey && event.key === 'J')) {
        //         event.preventDefault();
        //     }
        // });
    </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>RMS IT</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <!-- Menempatkan logo di tengah dan di atas box -->
            <div class="flex flex-col items-center mb-6">
                <a href="/">
                    <img src="{{ asset('img/logo-white.png') }}" alt="Logo" class="w-auto h-20 mb-10" />
                </a>
            </div>

            <div class="w-full sm:max-w-md px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

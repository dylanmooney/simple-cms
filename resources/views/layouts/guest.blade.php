<!DOCTYPE html data-theme="emerald">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="emerald">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="bg-base-200 flex flex-col min-h-screen">
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>

    <div class="w-full bg-neutral mt-auto">
        <footer class="items-center p-4 footer bg-neutral text-neutral-content max-w-7xl m-auto">
            <div class="items-center grid-flow-col">
                <p>Copyright © 2021 - All right reserved</p>
            </div>
        </footer>
    </div>
</body>

</html>

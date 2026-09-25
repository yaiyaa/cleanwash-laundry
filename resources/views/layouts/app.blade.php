<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Sistem Informasi Manajemen Laundry
    </title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap"
        rel="stylesheet"
    />

    <!-- Scripts -->
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body class="font-sans antialiased">

    <div class="min-h-screen bg-[#f3faff]">

        {{-- NAVIGATION --}}
        @include('layouts.navigation')


        {{-- MAIN CONTENT --}}
        <main>

            {{ $slot }}

        </main>

        @if (session('success') || session('warning') || session('error') || $errors->any())
            <div
                data-cleanwash-flash
                data-type="{{ $errors->any() || session('error') ? 'error' : (session('warning') ? 'warning' : 'success') }}"
                data-message="{{ $errors->any() ? $errors->first() : (session('success') ?? session('warning') ?? session('error')) }}"
                hidden
            ></div>
        @endif

    </div>

</body>

</html>

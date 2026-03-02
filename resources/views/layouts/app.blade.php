<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'SI Aset | UNMARIS' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full font-sans antialiased text-gray-900 flex overflow-hidden">

    <aside class="w-64 bg-unmaris-900 text-white flex-shrink-0 hidden md:flex flex-col">
        <div class="h-16 flex items-center justify-center border-b border-unmaris-700">
            <h1 class="text-xl font-bold tracking-wider">ASET UNMARIS</h1>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto no-scrollbar">
            <a href="#" class="block px-4 py-2.5 rounded-lg bg-unmaris-600 text-white font-medium">Dashboard</a>
            <a href="#" class="block px-4 py-2.5 rounded-lg text-gray-300 hover:bg-unmaris-700 hover:text-white transition">Master Aset</a>
            <a href="#" class="block px-4 py-2.5 rounded-lg text-gray-300 hover:bg-unmaris-700 hover:text-white transition">Kategori & Lokasi</a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col min-w-0">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 flex-shrink-0">
            <h2 class="text-lg font-semibold text-gray-800">
                {{ $header ?? 'Dashboard' }}
            </h2>
            <div class="flex items-center gap-4">
                <span class="text-sm font-medium text-gray-600">Admin Kampus</span>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
            {{ $slot }}
        </main>
    </div>
<x-toast />
</body>

</html>
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
            <a href="{{ route('dashboard') }}" wire:navigate class="{{ request()->routeIs('dashboard') ? 'bg-unmaris-600 text-white' : 'text-gray-300 hover:bg-unmaris-700 hover:text-white' }} block px-4 py-2.5 rounded-lg font-medium transition">
                Dashboard
            </a>
            <a href="{{ route('assets.index') }}" wire:navigate class="{{ request()->routeIs('assets.*') ? 'bg-unmaris-600 text-white' : 'text-gray-300 hover:bg-unmaris-700 hover:text-white' }} block px-4 py-2.5 rounded-lg font-medium transition">
                Master Aset
            </a>

            @can('manage-users')
            <div class="pt-4 mt-4 border-t border-unmaris-700">
                <p class="px-4 text-xs font-semibold text-unmaris-300 uppercase tracking-wider mb-2">Administrator</p>
                <a href="{{ route('users.index') }}" wire:navigate class="{{ request()->routeIs('users.*') ? 'bg-unmaris-600 text-white' : 'text-gray-300 hover:bg-unmaris-700 hover:text-white' }} block px-4 py-2.5 rounded-lg font-medium transition">
                    Manajemen Pengguna
                </a>
            </div>
            @endcan
        </nav>
    </aside>

    <div class="flex-1 flex flex-col min-w-0">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 flex-shrink-0">
            <h2 class="text-lg font-semibold text-gray-800">
                {{ $header ?? 'Dashboard' }}
            </h2>
            <div class="flex items-center gap-4">
                <div class="flex flex-col text-right">
                    <span class="text-sm font-bold text-gray-800">{{ auth()->user()->name ?? 'Guest' }}</span>
                    <span class="text-xs text-gray-500 uppercase tracking-wider">{{ auth()->user()->role ?? 'viewer' }}</span>
                </div>

                <!-- Tombol Logout -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="Keluar">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
            {{ $slot }}
        </main>
    </div>
    <x-toast />
</body>

</html>
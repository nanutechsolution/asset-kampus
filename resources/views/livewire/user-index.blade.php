<div>
    <!-- Top Action Bar -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="relative w-full sm:w-80">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </div>
            <input wire:model.live.debounce.300ms="search" type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-xl leading-5 bg-white placeholder-gray-400 focus:ring-unmaris-500 focus:border-unmaris-500 sm:text-sm transition-colors shadow-sm" placeholder="Cari nama atau email pengguna...">
        </div>

        <a href="{{ route('users.form') }}" wire:navigate class="inline-flex items-center px-4 py-2 bg-unmaris-600 hover:bg-unmaris-700 text-white text-sm font-medium rounded-xl shadow-sm transition-colors">
            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
            Tambah Pengguna
        </a>
    </div>

    <!-- Data Table -->
    <div class="bg-white shadow-sm ring-1 ring-black ring-opacity-5 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50/50">
                    <tr>
                        <th class="py-4 pl-6 pr-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pengguna</th>
                        <th class="px-3 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Peran (Role)</th>
                        <th class="px-3 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status Akses</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 pl-6 pr-3 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-br from-unmaris-100 to-unmaris-200 flex items-center justify-center text-unmaris-700 font-bold shadow-inner">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-gray-900">{{ $user->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                @php
                                    $roleColors = [
                                        'admin' => 'bg-purple-100 text-purple-700 border-purple-200',
                                        'operator' => 'bg-blue-100 text-blue-700 border-blue-200',
                                        'viewer' => 'bg-gray-100 text-gray-700 border-gray-200',
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold border {{ $roleColors[$user->role] ?? 'bg-gray-100' }}">
                                    {{ strtoupper($user->role) }}
                                </span>
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                <!-- Tombol Toggle Status Modern -->
                                <button wire:click="toggleStatus({{ $user->id }})" class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-unmaris-600 focus:ring-offset-2 {{ $user->is_active ? 'bg-green-500' : 'bg-gray-300' }}" role="switch" aria-checked="{{ $user->is_active ? 'true' : 'false' }}">
                                    <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out {{ $user->is_active ? 'translate-x-5' : 'translate-x-0' }}"></span>
                                </button>
                                <span class="ml-2 text-xs font-medium {{ $user->is_active ? 'text-green-600' : 'text-gray-500' }}">
                                    {{ $user->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('users.form', $user->id) }}" wire:navigate class="text-unmaris-600 hover:text-unmaris-900 px-3 py-1 rounded-md hover:bg-unmaris-50 transition-colors">Edit & Akses</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="border-t border-gray-100 px-6 py-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
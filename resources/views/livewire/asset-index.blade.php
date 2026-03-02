<div>
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
            <div class="relative w-full sm:w-80">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input
                    wire:model.live.debounce.500ms="search"
                    type="text"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-unmaris-500 focus:border-unmaris-500 sm:text-sm transition-colors"
                    placeholder="Cari kode atau nama aset...">
            </div>

            <select wire:model.live="status" class="block w-full sm:w-48 py-2 pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-unmaris-500 focus:border-unmaris-500 sm:text-sm rounded-lg">
                <option value="">Semua Status</option>
                <option value="active">Aktif</option>
                <option value="maintenance">Perawatan</option>
                <option value="disposed">Dihapus/Dihibahkan</option>
                <option value="lost">Hilang</option>
            </select>
        </div>
        <a href="{{ route('assets.create') }}" wire:navigate class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-unmaris-600 hover:bg-unmaris-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-unmaris-500 transition-colors">
            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Tambah Aset Baru
        </a>
    </div>

    <div class="bg-white shadow-sm ring-1 ring-black ring-opacity-5 md:rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Kode & Nama Aset</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Kategori</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Lokasi</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Aksi</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($assets as $asset)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 sm:pl-6">
                            <div class="flex flex-col">
                                <span class="text-sm font-medium text-gray-900">{{ $asset->name }}</span>
                                <span class="text-sm text-gray-500">{{ $asset->asset_code }}</span>
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">
                            {{ $asset->category->name ?? '-' }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">
                            {{ $asset->location->name ?? '-' }}
                            <div class="text-xs text-gray-400">{{ $asset->location->building ?? '' }}</div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm">
                            @php
                            $colors = [
                            'active' => 'bg-green-100 text-green-800',
                            'maintenance' => 'bg-yellow-100 text-yellow-800',
                            'disposed' => 'bg-gray-100 text-gray-800',
                            'lost' => 'bg-red-100 text-red-800',
                            ];
                            $labels = [
                            'active' => 'Aktif',
                            'maintenance' => 'Perawatan',
                            'disposed' => 'Dihapus',
                            'lost' => 'Hilang',
                            ];
                            $badgeClass = $colors[$asset->status] ?? 'bg-gray-100 text-gray-800';
                            $badgeLabel = $labels[$asset->status] ?? ucfirst($asset->status);
                            @endphp
                            <span class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 {{ $badgeClass }}">
                                {{ $badgeLabel }}
                            </span>
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <button class="text-unmaris-600 hover:text-unmaris-900 mr-3 transition-colors">Edit</button>
                            <a href="{{ route('assets.history', $asset->id) }}" wire:navigate class="text-gray-500 hover:text-unmaris-600 font-semibold transition-colors">
                                Riwayat
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-10 text-center text-sm text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="h-10 w-10 text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                Tidak ada data aset yang ditemukan.
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="border-t border-gray-200 px-4 py-3 sm:px-6">
            {{ $assets->links() }}
        </div>
    </div>
</div>
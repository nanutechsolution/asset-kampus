<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow-sm ring-1 ring-black ring-opacity-5 rounded-lg overflow-hidden">
        
        <form wire:submit="save" class="p-6 sm:p-8 space-y-6">
            
            @if (session()->has('error'))
                <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-4">
                    <div class="flex">
                        <div class="ml-3">
                            <p class="text-sm text-red-700">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2">
                
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Nama / Merek Aset <span class="text-red-500">*</span></label>
                    <input type="text" wire:model="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-unmaris-500 focus:ring-unmaris-500 sm:text-sm" placeholder="Contoh: Laptop ASUS ROG Strix">
                    @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Kategori <span class="text-red-500">*</span></label>
                    <select wire:model="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-unmaris-500 focus:ring-unmaris-500 sm:text-sm">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->code }} - {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Lokasi Penempatan <span class="text-red-500">*</span></label>
                    <select wire:model="location_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-unmaris-500 focus:ring-unmaris-500 sm:text-sm">
                        <option value="">-- Pilih Ruangan --</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }} ({{ $location->building }})</option>
                        @endforeach
                    </select>
                    @error('location_id') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Tanggal Pengadaan <span class="text-red-500">*</span></label>
                    <input type="date" wire:model="purchase_date" max="{{ date('Y-m-d') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-unmaris-500 focus:ring-unmaris-500 sm:text-sm">
                    @error('purchase_date') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nilai Aset (Rp)</label>
                    <input type="number" wire:model="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-unmaris-500 focus:ring-unmaris-500 sm:text-sm" placeholder="0">
                    @error('price') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Status Operasional <span class="text-red-500">*</span></label>
                    <select wire:model="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-unmaris-500 focus:ring-unmaris-500 sm:text-sm">
                        <option value="active">Aktif</option>
                        <option value="maintenance">Perawatan</option>
                        <option value="disposed">Dihibahkan / Dihapus</option>
                        <option value="lost">Hilang</option>
                    </select>
                    @error('status') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Kondisi Fisik <span class="text-red-500">*</span></label>
                    <select wire:model="condition" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-unmaris-500 focus:ring-unmaris-500 sm:text-sm">
                        <option value="good">Baik</option>
                        <option value="fair">Kurang Baik</option>
                        <option value="poor">Rusak Ringan</option>
                        <option value="broken">Rusak Berat</option>
                    </select>
                    @error('condition') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Catatan Khusus (Opsional)</label>
                    <textarea wire:model="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-unmaris-500 focus:ring-unmaris-500 sm:text-sm" placeholder="Spesifikasi tambahan, nomor seri, dll..."></textarea>
                    @error('notes') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="pt-5 border-t border-gray-200 flex justify-end gap-3">
                <a href="{{ route('assets.index') }}" wire:navigate class="px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none transition-colors">
                    Batal
                </a>
                
                <button type="submit" class="inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-unmaris-600 hover:bg-unmaris-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-unmaris-500 transition-colors">
                    <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Simpan Aset Baru
                </button>
            </div>
        </form>
    </div>
</div>
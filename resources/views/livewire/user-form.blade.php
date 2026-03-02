<div class="max-w-3xl mx-auto">
    <div class="bg-white shadow-sm ring-1 ring-black ring-opacity-5 rounded-2xl overflow-hidden">
        
        <form wire:submit="save" class="p-6 sm:p-8 space-y-6">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                
                <!-- Nama Lengkap -->
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" wire:model="name" class="mt-2 block w-full rounded-xl border-gray-200 shadow-sm focus:border-unmaris-500 focus:ring-unmaris-500 sm:text-sm transition-colors">
                    @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Alamat Email <span class="text-red-500">*</span></label>
                    <input type="email" wire:model="email" class="mt-2 block w-full rounded-xl border-gray-200 shadow-sm focus:border-unmaris-500 focus:ring-unmaris-500 sm:text-sm transition-colors">
                    @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Role -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Peran Sistem (Role) <span class="text-red-500">*</span></label>
                    <select wire:model="role" class="mt-2 block w-full rounded-xl border-gray-200 shadow-sm focus:border-unmaris-500 focus:ring-unmaris-500 sm:text-sm transition-colors">
                        <option value="viewer">Viewer (Hanya Lihat)</option>
                        <option value="operator">Operator (Kelola Aset)</option>
                        <option value="admin">Administrator (Akses Penuh)</option>
                    </select>
                    @error('role') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Status Aktif (Hanya tampil jika edit) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Status Akun</label>
                    <select wire:model="is_active" class="mt-2 block w-full rounded-xl border-gray-200 shadow-sm focus:border-unmaris-500 focus:ring-unmaris-500 sm:text-sm transition-colors">
                        <option value="1">Aktif (Diizinkan Login)</option>
                        <option value="0">Nonaktif (Diblokir)</option>
                    </select>
                </div>

                <!-- Reset Password Area -->
                <div class="sm:col-span-2 pt-4 border-t border-gray-100">
                    <label class="block text-sm font-bold text-gray-900">
                        {{ $isEdit ? 'Ganti Kata Sandi (Opsional)' : 'Kata Sandi Awal' }}
                        @if(!$isEdit) <span class="text-red-500">*</span> @endif
                    </label>
                    @if($isEdit)
                        <p class="text-xs text-gray-500 mt-1 mb-3">Kosongkan bidang ini jika tidak ingin mengubah kata sandi pengguna.</p>
                    @endif
                    <input type="password" wire:model="password" class="mt-1 block w-full rounded-xl border-gray-200 shadow-sm focus:border-unmaris-500 focus:ring-unmaris-500 sm:text-sm transition-colors" placeholder="••••••••">
                    @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

            </div>

            <!-- Footer Buttons -->
            <div class="pt-6 border-t border-gray-100 flex justify-end gap-3">
                <a href="{{ route('users.index') }}" wire:navigate class="px-5 py-2.5 border border-gray-300 text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition-colors shadow-sm">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-xl text-white bg-unmaris-600 hover:bg-unmaris-700 shadow-sm transition-all">
                    <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                    {{ $isEdit ? 'Simpan Perubahan' : 'Buat Akun' }}
                </button>
            </div>
        </form>
    </div>
</div>
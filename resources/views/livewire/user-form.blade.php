<div class="max-w-3xl mx-auto space-y-6">
    <div class="bg-white/90 backdrop-blur-2xl shadow-sm border border-gray-100/50 rounded-[2.5rem] overflow-hidden">

        <div class="px-8 py-6 border-b border-gray-100/80 bg-white">
            <h3 class="text-xl font-bold text-unmaris-900 italic tracking-tight">{{ $isEdit ? 'Perbarui Profil Pengguna' : 'Daftarkan Pengguna Baru' }}</h3>
            <p class="text-xs text-gray-500 mt-1 font-medium">Tentukan hak akses dan kredensial login untuk staf kampus.</p>
        </div>

        <form wire:submit="save" class="p-8 sm:p-10 space-y-8">
            <div class="grid grid-cols-1 gap-y-7 gap-x-8 sm:grid-cols-2">

                <!-- Nama Lengkap -->
                <div class="sm:col-span-2 group">
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2 italic">Nama Lengkap Pengguna <span class="text-red-500">*</span></label>
                    <input type="text" wire:model="name" class="block w-full px-5 py-4 bg-gray-50/50 border-0 text-gray-900 rounded-2xl ring-1 ring-inset ring-gray-200 focus:bg-white focus:ring-2 focus:ring-inset focus:ring-unmaris-500 transition-all font-bold italic" placeholder="Masukkan nama sesuai KTP/NIDN">
                    @error('name') <span class="text-red-500 text-[10px] mt-2 block font-bold italic">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div class="sm:col-span-2 group">
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2 italic">Alamat Email Kampus <span class="text-red-500">*</span></label>
                    <input type="email" wire:model="email" class="block w-full px-5 py-4 bg-gray-50/50 border-0 text-gray-900 rounded-2xl ring-1 ring-inset ring-gray-200 focus:bg-white focus:ring-2 focus:ring-inset focus:ring-unmaris-500 transition-all font-bold" placeholder="contoh@unmaris.ac.id">
                    @error('email') <span class="text-red-500 text-[10px] mt-2 block font-bold italic">{{ $message }}</span> @enderror
                </div>

                <!-- Role & Status (Stacked in Card) -->
                <div class="sm:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6 bg-unmaris-50/50 p-6 rounded-[2rem] border border-unmaris-100/50">
                    <div>
                        <label class="block text-[10px] font-bold text-unmaris-700 uppercase tracking-widest mb-2 italic">Hak Akses Sistem</label>
                        <select wire:model="role" class="block w-full px-5 py-4 bg-white border-0 text-gray-900 rounded-2xl ring-1 ring-inset ring-unmaris-100 focus:ring-2 focus:ring-inset focus:ring-unmaris-500 transition-all font-bold cursor-pointer italic">
                            <option value="viewer">Viewer (Baca Saja)</option>
                            <option value="operator">Operator (Kelola Aset)</option>
                            <option value="admin">Administrator (Akses Penuh)</option>
                        </select>
                        @error('role') <span class="text-red-500 text-[10px] mt-2 block font-bold italic">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-unmaris-700 uppercase tracking-widest mb-2 italic">Status Keaktifan</label>
                        <select wire:model="is_active" class="block w-full px-5 py-4 bg-white border-0 text-gray-900 rounded-2xl ring-1 ring-inset ring-unmaris-100 focus:ring-2 focus:ring-inset focus:ring-unmaris-500 transition-all font-bold cursor-pointer italic">
                            <option value="1">Aktif & Izinkan Login</option>
                            <option value="0">Nonaktifkan / Blokir</option>
                        </select>
                    </div>
                </div>

                <!-- Password Area -->
                <div class="sm:col-span-2 space-y-4">
                    <div class="flex items-center justify-between">
                        <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest italic">
                            {{ $isEdit ? 'Reset Kata Sandi' : 'Kata Sandi Default' }}
                            @if(!$isEdit) <span class="text-red-500">*</span> @endif
                        </label>
                        @if($isEdit)
                        <span class="text-[9px] font-bold text-sunmaris-600 uppercase bg-sunmaris-50 px-2 py-0.5 rounded-md italic">Abaikan jika tidak diganti</span>
                        @endif
                    </div>
                    <div class="relative group">
                        <input type="password" wire:model="password" class="block w-full px-5 py-4 bg-gray-50/50 border-0 text-gray-900 rounded-2xl ring-1 ring-inset ring-gray-200 focus:bg-white focus:ring-2 focus:ring-inset focus:ring-unmaris-500 transition-all font-bold" placeholder="••••••••">
                        <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-300 group-focus-within:text-unmaris-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                            </svg>
                        </div>
                    </div>
                    @error('password') <span class="text-red-500 text-[10px] mt-1 block font-bold italic">{{ $message }}</span> @enderror
                </div>

            </div>

            <!-- Footer Buttons -->
            <div class="pt-8 border-t border-gray-100 flex flex-col-reverse sm:flex-row justify-end gap-4">
                <a href="{{ route('users.index') }}" wire:navigate class="w-full sm:w-auto text-center px-8 py-4 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-bold rounded-2xl transition-all italic">
                    Kembali
                </a>
                <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center px-10 py-4 bg-unmaris-600 hover:bg-unmaris-700 text-white text-sm font-extrabold rounded-2xl shadow-xl shadow-unmaris-200 transition-all hover:scale-[1.02] active:scale-[0.98] italic">
                    <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    {{ $isEdit ? 'Simpan Perubahan' : 'Buat Akun Sekarang' }}
                </button>
            </div>
        </form>
    </div>


</div>
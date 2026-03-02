<div class="bg-white/10 backdrop-blur-xl border border-white/20 shadow-2xl rounded-3xl p-8 sm:p-10">
    <div class="text-center mb-8">
        <div class="w-16 h-16 bg-white text-unmaris-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-inner">
            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
        </div>
        <h2 class="text-2xl font-bold text-white tracking-wide">SI Aset UNMARIS</h2>
        <p class="text-unmaris-100 mt-2 text-sm">Masuk untuk mengelola aset kampus</p>
    </div>

    <form wire:submit="authenticate" class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-unmaris-50">Alamat Email</label>
            <input type="email" wire:model="email" class="mt-2 block w-full rounded-xl border-0 bg-white/20 py-3 px-4 text-white placeholder-unmaris-200 ring-1 ring-inset ring-white/30 focus:ring-2 focus:ring-inset focus:ring-white sm:text-sm transition-all" placeholder="admin@unmaris.ac.id">
            @error('email') <span class="text-red-300 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-unmaris-50">Kata Sandi</label>
            <input type="password" wire:model="password" class="mt-2 block w-full rounded-xl border-0 bg-white/20 py-3 px-4 text-white placeholder-unmaris-200 ring-1 ring-inset ring-white/30 focus:ring-2 focus:ring-inset focus:ring-white sm:text-sm transition-all" placeholder="••••••••">
            @error('password') <span class="text-red-300 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember" type="checkbox" wire:model="remember" class="h-4 w-4 rounded border-gray-300 text-unmaris-600 focus:ring-unmaris-600 bg-white/20">
                <label for="remember" class="ml-2 block text-sm text-unmaris-50">Ingat saya</label>
            </div>
            <a href="#" class="text-sm font-medium text-white hover:text-unmaris-100">Lupa sandi?</a>
        </div>

        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-unmaris-900 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition-all">
            <svg wire:loading wire:target="authenticate" class="animate-spin -ml-1 mr-2 h-5 w-5 text-unmaris-600" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
            <span wire:loading.remove wire:target="authenticate">Masuk Sistem</span>
            <span wire:loading wire:target="authenticate">Memproses...</span>
        </button>
    </form>
</div>
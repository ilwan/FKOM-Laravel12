<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-cover bg-center">
        <!-- Overlay gelap dengan blur -->
        {{-- <div class="absolute inset-0 bg-blue-900/40 backdrop-blur-md"></div> --}}

        <!-- Kontainer register -->
        <div class="relative z-10 w-full max-w-md mx-auto">
            <div class="backdrop-blur-lg bg-white/20 dark:bg-gray-800/30 border border-white/30 rounded-2xl shadow-2xl p-8 text-white">
                
                <!-- Header -->
                <div class="text-center mb-6">
                    <img src="/images/fklogo.png" alt="Logo Fakultas" class="w-32 mx-auto mb-3">
                    <h2 class="text-2xl font-bold text-white drop-shadow-md">
                        Daftar Portal Fakultas Komputer
                    </h2>
                    <p class="text-white text-sm mt-1">Buat akun baru untuk melanjutkan</p>
                </div>

                <!-- Form register -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Nama')" class="text-white"/>
                        <x-text-input
                            id="name"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Nama lengkap"
                            class="block mt-1 w-full rounded-lg bg-white/30 text-white placeholder-blue-100 border border-white/40 focus:border-blue-400 focus:ring-blue-400"
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-200" />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" class="text-white"/>
                        <x-text-input
                            id="email"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autocomplete="username"
                            placeholder="you@example.com"
                            class="block mt-1 w-full rounded-lg bg-white/30 text-white placeholder-blue-100 border border-white/40 focus:border-blue-400 focus:ring-blue-400"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-200" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <x-input-label for="password" :value="__('Password')" class="text-white"/>
                        <x-text-input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                            class="block mt-1 w-full rounded-lg bg-white/30 text-white placeholder-blue-100 border border-white/40 focus:border-blue-400 focus:ring-blue-400"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-200" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-white"/>
                        <x-text-input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                            class="block mt-1 w-full rounded-lg bg-white/30 text-white placeholder-blue-100 border border-white/40 focus:border-blue-400 focus:ring-blue-400"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-200" />
                    </div>

                    <!-- Link login & tombol register -->
                    <div class="flex items-center justify-between mt-4">
                        <a href="{{ route('login') }}" class="text-sm text-blue-200 hover:text-white">
                            {{ __('Sudah punya akun? Masuk') }}
                        </a>

                        <x-primary-button class="ml-4 bg-blue-600/80 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-lg transition duration-200">
                            {{ __('Daftar Sekarang') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>

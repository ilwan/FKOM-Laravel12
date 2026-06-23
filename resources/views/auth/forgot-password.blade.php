{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-cover bg-center">
        <!-- Overlay gelap dengan blur -->


        <!-- Kontainer reset password -->
        <div class="relative z-10 w-full max-w-md mx-auto">
            <div class="backdrop-blur-lg bg-white/20 border border-white/30 rounded-2xl shadow-2xl p-8 text-white">
                
                <!-- Header -->
                <div class="text-center mb-6">
                    <img src="/images/fklogo.png" alt="Logo Fakultas" class="w-32 mx-auto mb-3">
                    <h2 class="text-2xl font-bold text-white drop-shadow-md">
                        Reset Password
                    </h2>
                    <p class="text-blue-100 text-sm mt-1">
                        Masukkan email Anda, dan kami akan mengirimkan link untuk membuat password baru.
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4 text-sm text-green-200" :status="session('status')" />

                <!-- Form reset password -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" class="text-white"/>
                        <x-text-input
                            id="email"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            placeholder="you@example.com"
                            class="block mt-1 w-full rounded-lg bg-white/30 text-white placeholder-blue-100 border border-white/40 focus:border-blue-400 focus:ring-blue-400"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-200" />
                    </div>

                    <!-- Button -->
                    <div class="mt-6">
                        <x-primary-button class="w-full bg-blue-600/80 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg shadow-lg transition duration-200">
                            {{ __('Kirim Link Reset Password') }}
                        </x-primary-button>
                    </div>

                    <!-- Link kembali ke login -->
                    <p class="text-center text-blue-100 text-sm mt-6">
                        Ingat password Anda? 
                        <a href="{{ route('login') }}" class="text-white font-semibold hover:underline">Masuk Sekarang</a>
                    </p>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>

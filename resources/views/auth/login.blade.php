<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portal Fakultas Komputer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        :root {
            --primary: #0f3b70;
            --primary-light: #1e5aa8;
            --primary-dark: #082a52;
            --accent: #10b981;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 50%, #3b82f6 100%);
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, -15px); }
            100% { transform: translate(0, 0px); }
        }

        .input-field {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: 0.3s ease;
        }

        .input-field:focus {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            box-shadow: 0 4px 15px rgba(11, 59, 117, 0.4);
            transition: 0.3s ease;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(11, 59, 117, 0.5);
        }

        /* RESPONSIVE FIX */
        @media (max-width: 640px) {
            .login-container {
                padding: 1.5rem !important;
            }
            .floating {
                display: none;
            }
            .footer-wave {
                height: 60px !important;
            }
        }
    </style>
</head>

<body class="min-h-screen gradient-bg text-white overflow-x-hidden">

    <!-- Floating Background -->
    <div class="hero-pattern absolute inset-0"></div>

    <div class="absolute top-10 left-10 w-20 h-20 bg-white opacity-10 rounded-full floating hidden md:block"></div>
    <div class="absolute top-1/4 right-20 w-16 h-16 bg-white opacity-10 rounded-full floating hidden md:block"
        style="animation-delay: 0.5s;"></div>
    <div class="absolute bottom-20 left-1/4 w-24 h-24 bg-white opacity-10 rounded-full floating hidden md:block"
        style="animation-delay: 1s;"></div>
    <div class="absolute bottom-10 right-10 w-12 h-12 bg-white opacity-10 rounded-full floating hidden md:block"
        style="animation-delay: 1.5s;"></div>

    <!-- Main Login Area -->
    <div class="min-h-screen flex items-center justify-center relative z-10 px-4">
        <div class="w-full max-w-md">

            <div class="login-container rounded-2xl p-8 md:p-10">
                <!-- Logo & Title -->
                <div class="text-center mb-8">
                    <div class="flex justify-center mb-4">
                        <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-sm">
                            <img src="/images/logoputih.png" alt="Logo Fakultas" class="w-28 mx-auto">
                        </div>
                    </div>
                    <h1 class="text-2xl font-bold text-white">Portal Fakultas Komputer</h1>
                    <p class="text-blue-100 text-sm">Silakan masuk untuk melanjutkan</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-6 p-3 bg-red-500/20 border border-red-500/30 rounded-lg text-red-200 text-center text-sm">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium mb-2">
                            <i class="fas fa-envelope mr-2"></i>Alamat Email
                        </label>

                        <div class="relative">
                            <input id="email" type="email" name="email"
                                value="{{ old('email') }}"
                                class="input-field w-full rounded-xl py-3 px-4 placeholder-blue-100 text-white focus:ring-2"
                                required autofocus placeholder="nama@email.com">
                            <i class="fas fa-user absolute right-3 top-3 text-blue-200"></i>
                        </div>

                        @error('email')
                            <p class="text-red-200 text-xs mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium mb-2">
                            <i class="fas fa-lock mr-2"></i>Kata Sandi
                        </label>

                        <div class="relative">
                            <input id="password" type="password" name="password"
                                class="input-field w-full rounded-xl py-3 px-4 text-white placeholder-blue-100"
                                required placeholder="••••••••">

                            <i class="fas fa-key absolute right-3 top-3 text-blue-200 cursor-pointer"></i>
                        </div>

                        @error('password')
                            <p class="text-red-200 text-xs mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Remember + Forgot -->
                    <div class="flex justify-between items-center mb-6">
                        <label class="flex items-center text-sm text-blue-100">
                            <input id="remember_me" type="checkbox" class="mr-2">
                            Ingat Saya
                        </label>

                        <a href="{{ route('password.request') }}" class="text-blue-200 hover:text-white text-sm">
                            <i class="fas fa-question-circle mr-1"></i>Lupa Password?
                        </a>
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="btn-login w-full py-3 rounded-xl font-semibold flex justify-center items-center">
                        <i class="fas fa-sign-in-alt mr-2"></i>Masuk Sekarang
                    </button>
                </form>

                <!-- Register Link -->
                {{-- <div class="text-center mt-8 pt-6 border-t border-white/20">
                    <p class="text-blue-100 text-sm">
                        Belum punya akun?
                        <a href="#" class="text-white font-semibold hover:underline">Daftar Sekarang</a>
                    </p>
                </div> --}}
            </div>

            <p class="text-center mt-6 text-blue-100 text-sm">
                © 2025 TPL Fakultas Komputer - Universitas Universal
            </p>
        </div>
    </div>

    <!-- Footer Wave -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" class="footer-wave w-full h-32 opacity-20">
            <path fill="#fff"
                d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,85.3C672,75,768,85,864,101.3C960,117,1056,139,1152,138.7C1248,139,1344,117,1392,106.7L1440,96V320H0Z"></path>
        </svg>
    </div>

    <!-- Toggle Password -->
    <script>
        document.querySelector('.fa-key').addEventListener('click', function () {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        });
    </script>

</body>
</html>

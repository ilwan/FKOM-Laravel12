<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Surat Fakultas Komputer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        :root {
            --primary: #0b3b75;
            --primary-light: #1e5aa8;
            --primary-dark: #082a52;
            --secondary: #f97316;
            --secondary-light: #fb923c;
            --accent: #10b981;
            --light: #f8fafc;
            --dark: #1e293b;
            --gray: #64748b;
        }
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #0b3b75 0%, #1e5aa8 50%, #3b82f6 100%);
        }
        
        .hero-pattern {
            background-image: radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.1) 0%, transparent 55%),
                              radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.1) 0%, transparent 55%);
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, -15px); }
            100% { transform: translate(0, 0px); }
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(11, 59, 117, 0.2);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            box-shadow: 0 6px 8px rgba(11, 59, 117, 0.3);
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: white;
            color: var(--primary);
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            border: 2px solid var(--primary);
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: var(--primary);
            color: white;
        }
        
        .section-padding {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #ffffff 0%, #e2e8f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }
        
        .service-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }
        
        .service-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            height: 100%;
        }
        
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- ========== NAVBAR ========== -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="bg-primary-700 p-2 rounded-lg">
                    <i class="fas fa-envelope-open-text text-white text-xl"></i>
                </div>
                <span class="font-bold text-xl text-primary-800">E-Surat Fakultas Komputer</span>
            </div>

            <nav class="hidden md:flex gap-8 text-sm font-medium text-primary-800">
                <a href="/" class="hover:text-primary-600 transition-all py-2 border-b-2 border-transparent hover:border-primary-600">Beranda</a>
                <a href="#services" class="hover:text-primary-600 transition-all py-2 border-b-2 border-transparent hover:border-primary-600">Layanan</a>
                <a href="#" class="hover:text-primary-600 transition-all py-2 border-b-2 border-transparent hover:border-primary-600">Lacak Surat</a>
                <a href="{{ route('login') }}" class="btn-secondary">Login</a>
            </nav>

            <button class="md:hidden text-2xl text-primary-800" id="menuBtn">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden bg-white shadow-lg md:hidden">
            <ul class="px-4 py-3 space-y-3 text-sm font-medium text-primary-800">
                <li><a href="/" class="block py-2 hover:text-primary-600 transition-all">Beranda</a></li>
                <li><a href="#services" class="block py-2 hover:text-primary-600 transition-all">Layanan</a></li>
                <li><a href="#" class="block py-2 hover:text-primary-600 transition-all">Lacak Surat</a></li>
                <li><a href="{{ route('login') }}" class="block py-2 hover:text-primary-600 transition-all">Login</a></li>
            </ul>
        </div>
    </header>
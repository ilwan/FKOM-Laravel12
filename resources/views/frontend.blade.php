<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fakultas Komputer - Universitas Universal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #0f3b70;
            --primary-light: #1e5aa8;
            --primary-dark: #082a52;
            --secondary: #f97316;
            --accent: #10b981;
            --light: #f8fafc;
            --dark: #1e293b;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 50%, #3b82f6 100%);
        }

        .hero-pattern {
            background-image:
                radial-gradient(circle at 15% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 55%),
                radial-gradient(circle at 85% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 55%);
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% {
                transform: translate(0, 0px);
            }

            50% {
                transform: translate(0, -15px);
            }

            100% {
                transform: translate(0, 0px);
            }
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
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
            0% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(59, 130, 246, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
            }
        }

        .service-icon {
            width: 70px;
            height: 70px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .program-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            height: 100%;
        }

        .program-card:hover {
            transform: translateY(-5px);
        }

        .news-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            height: 100%;
        }

        .news-card:hover {
            transform: translateY(-5px);
        }

        .facility-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            height: 100%;
        }

        .facility-card:hover {
            transform: translateY(-5px);
        }

        .tab-active {
            background: var(--primary);
            color: white;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .relative:hover .dropdown {
        display: block;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- ========== NAVBAR ========== -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <div class="flex items-center gap-3">
            {{-- <div class="bg-primary p-3 rounded-lg">
                <i class="fas fa-laptop-code text-blue-600 text-2xl"></i>
            </div> --}}
            <div class="bg-primary rounded-lg">
                <img src="/images/logouvers.png" alt="Logo Fakultas" class="w-30 h-10 object-contain">
            </div>
            <div>
                <span class="font-bold text-xl text-blue-600">Fakultas Komputer</span>
                <p class="text-xs text-gray-500">Universitas Universal</p>
            </div>
        </div>

        <nav class="hidden lg:flex gap-8 text-sm font-medium text-primary items-center">

            <a href="#home"
                class="hover:text-secondary transition-all py-2 border-b-2 border-transparent hover:border-secondary">Beranda</a>
            <a href="#about"
                class="hover:text-secondary transition-all py-2 border-b-2 border-transparent hover:border-secondary">Tentang</a>
            <a href="#programs"
                class="hover:text-secondary transition-all py-2 border-b-2 border-transparent hover:border-secondary">Program Studi</a>
            <a href="#facilities"
                class="hover:text-secondary transition-all py-2 border-b-2 border-transparent hover:border-secondary">Fasilitas</a>
            <a href="#news"
                class="hover:text-secondary transition-all py-2 border-b-2 border-transparent hover:border-secondary">Berita</a>
            <a href="#contact"
                class="hover:text-secondary transition-all py-2 border-b-2 border-transparent hover:border-secondary">Kontak</a>

            <div class="relative group">
    <button class="py-2 px-4 border-b-2 border-transparent hover:border-secondary hover:text-secondary transition-all">
        Layanan
    </button>

    <div class="absolute left-0 top-full hidden group-hover:block bg-white shadow-lg rounded-lg w-40 border border-gray-100 z-50">
        <a href="{{ route('e-surat') }}" class="block px-4 py-2 text-sm text-primary hover:bg-gray-100 transition">E-Surat</a>
        <a href="#" class="block px-4 py-2 text-sm text-primary hover:bg-gray-100 transition">E-Learning</a>
    </div>
</div>


            <a href="https://uvers.ac.id/admisi/" class="btn-primary" target="_blank">#joinUvers</a>
        </nav>

        <button class="lg:hidden text-2xl text-primary" id="menuBtn">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden bg-white shadow-lg lg:hidden">
        <ul class="px-4 py-3 space-y-3 text-sm font-medium text-primary">
            <li><a href="#home" class="block py-2 hover:text-secondary transition-all">Beranda</a></li>
            <li><a href="#about" class="block py-2 hover:text-secondary transition-all">Tentang</a></li>
            <li><a href="#programs" class="block py-2 hover:text-secondary transition-all">Program Studi</a></li>
            <li><a href="#facilities" class="block py-2 hover:text-secondary transition-all">Fasilitas</a></li>
            <li><a href="#news" class="block py-2 hover:text-secondary transition-all">Berita</a></li>
            <li><a href="#contact" class="block py-2 hover:text-secondary transition-all">Kontak</a></li>

            <!-- Mobile version Layanan -->
            <li>
                <button id="mobileLayananBtn" class="w-full text-left py-2 flex justify-between items-center hover:text-secondary transition-all">
                    Layanan
                    <i class="fas fa-chevron-down"></i>
                </button>
                <ul id="mobileLayananMenu" class="hidden pl-4 mt-1 space-y-1">
                    <li><a href="{{ route('e-surat') }}" class="block py-1 hover:text-secondary transition-all">E-Surat</a></li>
                    <li><a href="#" class="block py-1 hover:text-secondary transition-all">E-Learning</a></li>
                </ul>
            </li>
            <li><a href="#" class="block py-2 hover:text-secondary transition-all">Portal Mahasiswa</a></li>
        </ul>
    </div>
</header>


    <!-- ========== HERO SECTION ========== -->
    <section id="home" class="relative gradient-bg text-white overflow-hidden">
        <div class="hero-pattern absolute inset-0"></div>

        <!-- Background Elements -->
        <div class="absolute top-10 left-10 w-20 h-20 bg-white opacity-10 rounded-full floating"></div>
        <div class="absolute top-1/4 right-20 w-16 h-16 bg-white opacity-10 rounded-full floating"
            style="animation-delay: 0.5s;"></div>
        <div class="absolute bottom-20 left-1/4 w-24 h-24 bg-white opacity-10 rounded-full floating"
            style="animation-delay: 1s;"></div>
        <div class="absolute bottom-10 right-10 w-12 h-12 bg-white opacity-10 rounded-full floating"
            style="animation-delay: 1.5s;"></div>

        <div class="max-w-7xl mx-auto px-4 py-24 relative z-10">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 mb-10 lg:mb-0">
                    <div class="inline-block px-4 py-1 rounded-full bg-white bg-opacity-20 backdrop-blur-sm mb-6">
                        <span class="text-sm font-medium">Fakultas Teknologi Terdepan ( Data Dummy Karena Masih Dalam Pengembangan )</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                        Masa Depan Teknologi
                        <span class="text-gradient block">Dimulai Di Sini</span>
                    </h1>
                    <p class="text-lg md:text-xl mb-8 opacity-90 max-w-lg">
                        Menjadi pusat unggulan dalam pendidikan komputer dan teknologi informasi
                        yang menghasilkan lulusan berdaya saing global dan berkarakter.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#programs"
                            class="btn-primary inline-flex items-center justify-center text-center pulse-animation">
                            <i class="fas fa-graduation-cap mr-2"></i>
                            Program Studi
                        </a>
                        <a href="#contact"
                            class="btn-secondary inline-flex items-center justify-center text-center bg-white text-primary border-white">
                            <i class="fas fa-info-circle mr-2"></i>
                            Info Pendaftaran
                        </a>
                    </div>


                </div>
                <div class="lg:w-1/2 flex justify-center">
                    <div class="relative">
                        <div class="glass-effect rounded-2xl p-6 max-w-md">
                            <div class="bg-white rounded-xl shadow-lg p-6 text-gray-800">
                                <div class="flex items-center mb-6">
                                    <div class="bg-primary-100 p-3 rounded-lg mr-4">
                                        <i class="fas fa-bullhorn text-primary text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold">Pengumuman Akademik</h3>
                                        <p class="text-sm text-gray-600">Update Terbaru</p>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Jenis Pengumuman</span>
                                        <span class="font-medium">Ujian Akhir Semester</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Mulai Aktivitas</span>
                                        <span class="font-medium">08 Desember 2025</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Mode Ujian</span>
                                        <span class="font-medium">Sesuai Mata Kuliah</span>
                                    </div>
                                </div>

                                <div class="mt-6 pt-4 border-t border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">Lihat Jadwal Lengkap</span>
                                        <button class="text-primary hover:text-primary-800 text-sm font-medium">
                                            Cek Jadwal <i class="fas fa-arrow-right ml-1"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>



                        <!-- Floating Cards -->
                        <div class="absolute -top-4 -left-4 bg-white rounded-xl shadow-lg p-4 w-40 floating"
                            style="animation-delay: 0.3s;">
                            <div class="flex items-center">
                                <div class="bg-yellow-100 p-2 rounded-lg mr-2">
                                    <i class="fas fa-award text-yellow-600"></i>
                                </div>
                                <span class="text-sm font-medium text-yellow-600">Akreditasi Baik</span>
                            </div>
                        </div>

                        <div class="absolute -bottom-4 -right-4 bg-white rounded-xl shadow-lg p-4 w-50 floating"
                            style="animation-delay: 0.7s;">
                            <div class="flex items-center">
                                <div class="bg-purple-100 p-2 rounded-lg mr-2">
                                    <i class="fas fa-chalkboard-teacher text-purple-600"></i>
                                </div>
                                <span class="text-sm font-medium text-purple-600">Dosen Berpengalaman</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-auto">
                <path fill="#f8fafc" fill-opacity="1"
                    d="M0,160L48,170.7C96,181,192,203,288,197.3C384,192,480,160,576,144C672,128,768,128,864,149.3C960,171,1056,213,1152,208C1248,203,1344,149,1392,122.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </div>
    </section>

    <!-- ========== ABOUT SECTION ========== -->
    <section id="about" class="section-padding bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12 items-center">
                <div class="lg:w-1/2">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                            alt="Fakultas Komputer" class="rounded-2xl shadow-lg">
                        <div class="absolute -bottom-6 -right-6 bg-primary text-white p-6 rounded-2xl shadow-lg">
                            <div class="text-3xl font-bold">10+</div>
                            <div class="text-sm">Tahun Pengalaman</div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2">
                    <h2 class="text-3xl font-bold text-primary mb-6">Tentang Fakultas Komputer</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Fakultas Komputer Universitas Universal merupakan institusi pendidikan tinggi
                        yang berkomitmen untuk menghasilkan lulusan yang kompeten di bidang teknologi
                        informasi dan komputer. Dengan kurikulum yang terus diperbarui sesuai perkembangan
                        industri, kami mempersiapkan mahasiswa untuk menjadi profesional yang siap bersaing
                        di era digital.
                    </p>

                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div class="flex items-start">
                            <div class="bg-primary-100 p-2 rounded-lg mr-3 mt-1">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-primary">Akreditasi Baik</h4>
                                <p class="text-sm text-gray-600">Terakreditasi secara nasional</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-primary-100 p-2 rounded-lg mr-3 mt-1">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-primary">Dosen Berpengalaman</h4>
                                <p class="text-sm text-gray-600">Lulusan dalam dan luar negeri</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-primary-100 p-2 rounded-lg mr-3 mt-1">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-primary">Fasilitas Lengkap</h4>
                                <p class="text-sm text-gray-600">Laboratorium modern</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-primary-100 p-2 rounded-lg mr-3 mt-1">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-primary">Kerjasama Industri</h4>
                                <p class="text-sm text-gray-600">Link and match dengan perusahaan</p>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="btn-primary inline-flex items-center">
                        <i class="fas fa-book-open mr-2"></i>
                        Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== PROGRAMS SECTION ========== -->
    <section id="programs" class="section-padding bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-primary mb-4">
                    Program Studi
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Kami menawarkan berbagai program studi yang dirancang untuk memenuhi kebutuhan industri teknologi
                    masa kini.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Program 1: Teknik Informatika -->
                <div
                    class="program-card bg-white rounded-2xl shadow-lg border border-gray-100 card-hover overflow-hidden">
                    <div class="h-2 bg-gradient-to-r from-primary to-primary-light"></div>
                    <div class="p-6">
                        <div class="service-icon bg-blue-100 mx-auto">
                            <i class="fas fa-code text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary text-center mb-3">Teknik Informatika</h3>
                        <p class="text-gray-600 text-center mb-6">
                            Memfokuskan pada pemrograman, kecerdasan buatan, jaringan komputer,
                            serta pengembangan teknologi berbasis perangkat lunak modern.
                        </p>
                        <div class="flex justify-between text-sm text-gray-500 mb-4">
                            <span><i class="fas fa-clock mr-1"></i> 8 Semester</span>
                            <span><i class="fas fa-graduation-cap mr-1"></i> S.Kom</span>
                        </div>
                        <a href="#" class="btn-primary w-full text-center block">
                            Detail Program
                        </a>
                    </div>
                </div>

                <!-- Program 2: Sistem Informasi -->
                <div
                    class="program-card bg-white rounded-2xl shadow-lg border border-gray-100 card-hover overflow-hidden">
                    <div class="h-2 bg-gradient-to-r from-secondary to-orange-400"></div>
                    <div class="p-6">
                        <div class="service-icon bg-orange-100 mx-auto">
                            <i class="fas fa-network-wired text-orange-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary text-center mb-3">Sistem Informasi</h3>
                        <p class="text-gray-600 text-center mb-6">
                            Menggabungkan teknologi informasi dengan proses bisnis untuk menghasilkan
                            solusi sistem informasi yang mendukung pengambilan keputusan organisasi.
                        </p>
                        <div class="flex justify-between text-sm text-gray-500 mb-4">
                            <span><i class="fas fa-clock mr-1"></i> 8 Semester</span>
                            <span><i class="fas fa-graduation-cap mr-1"></i> S.Kom</span>
                        </div>
                        <a href="#" class="btn-primary w-full text-center block">
                            Detail Program
                        </a>
                    </div>
                </div>

                <!-- Program 3: Teknik Perangkat Lunak -->
                <div
                    class="program-card bg-white rounded-2xl shadow-lg border border-gray-100 card-hover overflow-hidden">
                    <div class="h-2 bg-gradient-to-r from-accent to-emerald-400"></div>
                    <div class="p-6">
                        <div class="service-icon bg-green-100 mx-auto">
                            <i class="fas fa-laptop-code text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary text-center mb-3">Teknik Perangkat Lunak</h3>
                        <p class="text-gray-600 text-center mb-6">
                            Berfokus pada rekayasa perangkat lunak, UI/UX, serta pengembangan aplikasi
                            mobile, web, dan game dengan standar industri modern.
                        </p>
                        <div class="flex justify-between text-sm text-gray-500 mb-4">
                            <span><i class="fas fa-clock mr-1"></i> 8 Semester</span>
                            <span><i class="fas fa-graduation-cap mr-1"></i> S.Kom</span>
                        </div>
                        <a href="#" class="btn-primary w-full text-center block">
                            Detail Program
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ========== FACILITIES SECTION ========== -->
    <section id="facilities" class="section-padding bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-primary mb-4">
                    Fasilitas & Laboratorium
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Didukung dengan fasilitas modern untuk menunjang proses belajar mengajar yang optimal.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Facility 1 -->
                <div
                    class="facility-card bg-white rounded-2xl shadow-lg border border-gray-100 card-hover overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-700 relative overflow-hidden">
                        <i class="fas fa-desktop text-white text-6xl absolute bottom-4 right-4 opacity-20"></i>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4">
                            <h3 class="text-xl font-bold text-white">Lab. Komputer & Pemrograman</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">
                            Digunakan untuk praktikum pemrograman dasar, pemrograman lanjut, pengembangan aplikasi web,
                            dan mobile.
                        </p>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-microchip mr-2"></i>
                            <span>40 Workstation High-End</span>
                        </div>
                    </div>
                </div>

                <!-- Facility 2 -->
                <div
                    class="facility-card bg-white rounded-2xl shadow-lg border border-gray-100 card-hover overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-green-500 to-green-700 relative overflow-hidden">
                        <i class="fas fa-network-wired text-white text-6xl absolute bottom-4 right-4 opacity-20"></i>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4">
                            <h3 class="text-xl font-bold text-white">Lab. Jaringan</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">
                            Diperuntukkan bagi praktikum jaringan komputer, manajemen server, serta dasar keamanan.
                        </p>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-server mr-2"></i>
                            <span>Peralatan Router, Switch, & Server</span>
                        </div>
                    </div>
                </div>

                <!-- Facility 3 -->
                <div
                    class="facility-card bg-white rounded-2xl shadow-lg border border-gray-100 card-hover overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-purple-500 to-purple-700 relative overflow-hidden">
                        <i class="fas fa-laptop-code text-white text-6xl absolute bottom-4 right-4 opacity-20"></i>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4">
                            <h3 class="text-xl font-bold text-white">Lab. RPL, Multimedia & UI/UX</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">
                            Mendukung pengembangan perangkat lunak, desain antarmuka, animasi, serta produksi
                            multimedia.
                        </p>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-tools mr-2"></i>
                            <span>Peralatan Editing & Perangkat Pengembangan</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========== NEWS SECTION ========== -->
    <section id="news" class="section-padding bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-primary mb-4">
                    Berita & Acara
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Ikuti perkembangan terbaru dari Fakultas Komputer Universitas Universal
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- News 1 -->
                <div
                    class="news-card bg-white rounded-2xl shadow-lg border border-gray-100 card-hover overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-primary to-primary-light relative overflow-hidden">
                        <div
                            class="absolute top-4 left-4 bg-white text-primary px-3 py-1 rounded-full text-sm font-semibold">
                            Berita
                        </div>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4">
                            <h3 class="text-xl font-bold text-white">Workshop AI untuk Industri 4.0</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="far fa-calendar mr-2"></i>
                            <span>15 Maret 2025</span>
                        </div>
                        <p class="text-gray-600 mb-4">
                            Fakultas Komputer menyelenggarakan workshop tentang penerapan Artificial Intelligence dalam
                            mendukung Industri 4.0.
                        </p>
                        <a href="#" class="text-primary font-medium hover:underline inline-flex items-center">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>

                <!-- News 2 -->
                <div
                    class="news-card bg-white rounded-2xl shadow-lg border border-gray-100 card-hover overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-secondary to-orange-500 relative overflow-hidden">
                        <div
                            class="absolute top-4 left-4 bg-white text-secondary px-3 py-1 rounded-full text-sm font-semibold">
                            Pengumuman
                        </div>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4">
                            <h3 class="text-xl font-bold text-white">Penerimaan Mahasiswa Baru 2025</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="far fa-calendar mr-2"></i>
                            <span>10 Maret 2025</span>
                        </div>
                        <p class="text-gray-600 mb-4">
                            Pendaftaran mahasiswa baru Fakultas Komputer gelombang III dibuka hingga 30 Juni 2025.
                        </p>
                        <a href="#" class="text-primary font-medium hover:underline inline-flex items-center">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>

                <!-- News 3 -->
                <div
                    class="news-card bg-white rounded-2xl shadow-lg border border-gray-100 card-hover overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-accent to-green-500 relative overflow-hidden">
                        <div
                            class="absolute top-4 left-4 bg-white text-accent px-3 py-1 rounded-full text-sm font-semibold">
                            Prestasi
                        </div>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4">
                            <h3 class="text-xl font-bold text-white">Tim Robotika Juara Nasional</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="far fa-calendar mr-2"></i>
                            <span>5 Maret 2025</span>
                        </div>
                        <p class="text-gray-600 mb-4">
                            Tim robotika Fakultas Komputer berhasil meraih juara 1 dalam kompetisi robot nasional di
                            Jakarta.
                        </p>
                        <a href="#" class="text-primary font-medium hover:underline inline-flex items-center">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="#" class="btn-secondary inline-flex items-center">
                    <i class="fas fa-newspaper mr-2"></i>
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </section>

    <!-- ========== CONTACT SECTION ========== -->
    <section id="contact" class="section-padding bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-3xl font-bold text-primary mb-6">Hubungi Kami</h2>
                    <p class="text-gray-600 mb-8">
                        Untuk informasi lebih lanjut mengenai program studi, pendaftaran, atau kerja sama,
                        silakan menghubungi kami melalui informasi kontak di bawah ini.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-primary-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-primary mb-1">Alamat</h4>
                                <p class="text-gray-600">
                                    Jl. Pasir Putih, Bengkong Sadai, Bengkong <br>
                                    Kota Batam, Kepulauan Riau 29432
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-primary-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-phone-alt text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-primary mb-1">Telepon</h4>
                                <p class="text-gray-600">08xxxxxxx</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-primary-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-envelope text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-primary mb-1">Email</h4>
                                <p class="text-gray-600">fkom@uvers.ac.id</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-primary-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-clock text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-primary mb-1">Jam Operasional</h4>
                                <p class="text-gray-600">
                                    Senin - Jumat: 13.00 - 22.00 WIB<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-8 rounded-2xl">
                    <h3 class="text-xl font-bold text-primary mb-6">Kirim Pesan</h3>
                    <form class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                                    placeholder="Masukkan nama lengkap">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                                    placeholder="Masukkan alamat email">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                                placeholder="Subjek pesan">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                            <textarea rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                                placeholder="Tulis pesan Anda"></textarea>
                        </div>
                        <button type="submit" class="btn-primary w-full">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== FOOTER ========== -->
    <footer class="bg-gray-900 text-gray-300 py-12">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-primary p-2 rounded-lg">
                        <i class="fas fa-laptop-code text-white text-xl"></i>
                    </div>
                    <div>
                        <span class="font-bold text-white text-lg">Fakultas Komputer</span>
                        <p class="text-xs">Universitas Universal</p>
                    </div>
                </div>
                <p class="text-sm leading-relaxed max-w-md mb-4">
                    Menjadi pusat unggulan dalam pendidikan komputer dan teknologi informasi
                    yang menghasilkan lulusan berdaya saing global dan berkarakter.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="bg-gray-800 p-2 rounded-lg hover:bg-primary transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="bg-gray-800 p-2 rounded-lg hover:bg-primary transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="bg-gray-800 p-2 rounded-lg hover:bg-primary transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="bg-gray-800 p-2 rounded-lg hover:bg-primary transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" class="bg-gray-800 p-2 rounded-lg hover:bg-primary transition">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4">Tautan Cepat</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#home" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="#about" class="hover:text-white transition">Tentang</a></li>
                    <li><a href="#programs" class="hover:text-white transition">Program Studi</a></li>
                    <li><a href="#facilities" class="hover:text-white transition">Fasilitas</a></li>
                    <li><a href="#news" class="hover:text-white transition">Berita</a></li>
                    <li><a href="{{ route('e-surat') }}" class="hover:text-white transition">E-Surat</a></li>
                    <li><a href="#contact" class="hover:text-white transition">Kontak</a></li> 
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4">Program Studi</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition">Teknik Informatika</a></li>
                    <li><a href="#" class="hover:text-white transition">Sistem Informasi</a></li>
                    <li><a href="#" class="hover:text-white transition">Teknik Perangkat Lunak</a></li>
                </ul>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 mt-8 pt-6 border-t border-gray-800">
            <p class="text-center text-gray-500 text-sm">
                © 2025 IS Fakultas Komputer - Universitas Universal. All rights reserved. (Data Dummy Karena Masih Dalam Pengembangan)
            </p>
        </div>
    </footer>

    <script>
        const btn = document.getElementById('menuBtn');
        const menu = document.getElementById('mobileMenu');
        btn.addEventListener('click', () => menu.classList.toggle('hidden'));

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

</body>

</html>

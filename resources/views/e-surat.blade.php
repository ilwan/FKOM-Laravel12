@extends('frontend.home')

@section('content')
    <!-- ========== HERO SECTION ========== -->
    <section class="relative gradient-bg text-white overflow-hidden">
        <div class="hero-pattern absolute inset-0"></div>
        
        <!-- Background Elements -->
        <div class="absolute top-10 left-10 w-20 h-20 bg-white opacity-10 rounded-full floating"></div>
        <div class="absolute top-1/4 right-20 w-16 h-16 bg-white opacity-10 rounded-full floating" style="animation-delay: 0.5s;"></div>
        <div class="absolute bottom-20 left-1/4 w-24 h-24 bg-white opacity-10 rounded-full floating" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-10 right-10 w-12 h-12 bg-white opacity-10 rounded-full floating" style="animation-delay: 1.5s;"></div>
        
        <div class="max-w-7xl mx-auto px-4 py-24 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <div class="inline-block px-4 py-1 rounded-full bg-white bg-opacity-20 backdrop-blur-sm mb-6">
                        <span class="text-sm font-medium">Sistem Terintegrasi</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                        Pengajuan Surat
                        <span class="text-gradient block">Digital Mudah & Cepat</span>
                    </h1>
                    <p class="text-lg md:text-xl mb-8 opacity-90 max-w-lg">
                        Ajukan berbagai jenis surat akademik secara online dengan proses yang cepat, mudah, dan terintegrasi. 
                        Lacak status pengajuan Anda kapan saja.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#services" 
                           class="btn-primary inline-flex items-center justify-center text-center pulse-animation">
                            <i class="fas fa-plus-circle mr-2"></i>
                            Ajukan Surat Sekarang
                        </a>
                        <a href="#"
                           class="btn-secondary inline-flex items-center justify-center text-center bg-white text-primary-800 border-white">
                            <i class="fas fa-search mr-2"></i>
                            Lacak Surat
                        </a>
                    </div>
                    
                   
                </div>
                
                <div class="md:w-1/2 flex justify-center">
                    <div class="relative">
                        <div class="glass-effect rounded-2xl p-6 max-w-md">
                            <div class="bg-white rounded-xl shadow-lg p-6">
                                <div class="flex items-center mb-6">
                                    <div class="bg-primary-100 p-3 rounded-lg mr-4">
                                        <i class="fas fa-file-alt text-primary-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-800">Surat Permohonan</h3>
                                        <p class="text-sm text-gray-600">Disetujui lebih cepat</p>
                                    </div>
                                </div>
                                
                                <div class="space-y-4">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Jenis Surat</span>
                                        <span class="font-medium">Permohonan Riset</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Status</span>
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Selesai</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Tanggal Pengajuan</span>
                                        <span class="font-medium">15 Mar 2025</span>
                                    </div>
                                </div>
                                
                                <div class="mt-6 pt-4 border-t border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">Contoh Surat</span>
                                        <button class="text-primary-600 hover:text-primary-800 text-sm font-medium">
                                            Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Floating Cards -->
                        <div class="absolute -top-4 -left-4 bg-white rounded-xl shadow-lg p-4 w-40 floating" style="animation-delay: 0.3s;">
                            <div class="flex items-center">
                                <div class="bg-green-100 p-2 rounded-lg mr-2">
                                    <i class="fas fa-check text-green-600"></i>
                                </div>
                                <span class="text-sm font-medium">500+ Surat Diproses</span>
                            </div>
                        </div>
                        
                        <div class="absolute -bottom-4 -right-4 bg-white rounded-xl shadow-lg p-4 w-40 floating" style="animation-delay: 0.7s;">
                            <div class="flex items-center">
                                <div class="bg-blue-100 p-2 rounded-lg mr-2">
                                    <i class="fas fa-clock text-blue-600"></i>
                                </div>
                                <span class="text-sm font-medium">Proses 24 Jam</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-auto">
                <path fill="#f8fafc" fill-opacity="1" d="M0,160L48,170.7C96,181,192,203,288,197.3C384,192,480,160,576,144C672,128,768,128,864,149.3C960,171,1056,213,1152,208C1248,203,1344,149,1392,122.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- ========== LAYANAN SURAT ========== -->
    <section id="services" class="section-padding bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-primary-800 mb-4">
                    Layanan Surat Tersedia
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Pilih jenis surat yang Anda butuhkan untuk proses pengajuan yang cepat dan mudah
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Card 1: Surat Keputusan -->
                <div class="service-card bg-white rounded-xl shadow-lg border border-gray-100 card-hover p-6">
                    <div class="service-icon bg-blue-100">
                        <i class="fas fa-gavel text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800 mb-2">Surat Keputusan</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Surat penetapan resmi mengenai keputusan tertentu dari pimpinan fakultas.
                    </p>
                    <a href="#" class="text-primary-600 font-medium hover:underline text-sm inline-flex items-center">
                        Ajukan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Card 2: Surat Undangan -->
                <div class="service-card bg-white rounded-xl shadow-lg border border-gray-100 card-hover p-6">
                    <div class="service-icon bg-purple-100">
                        <i class="fas fa-envelope text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800 mb-2">Surat Undangan</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Undangan resmi untuk menghadiri acara, rapat, atau kegiatan fakultas.
                    </p>
                    <a href="#" class="text-primary-600 font-medium hover:underline text-sm inline-flex items-center">
                        Ajukan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Card 3: Surat Permohonan -->
                <div class="service-card bg-white rounded-xl shadow-lg border border-gray-100 card-hover p-6">
                    <div class="service-icon bg-green-100">
                        <i class="fas fa-handshake text-green-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800 mb-2">Surat Permohonan</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Permohonan izin penelitian, magang, observasi, dan kegiatan akademik lainnya.
                    </p>
                    <a href="{{ route('surat.public.create')}}" class="text-primary-600 font-medium hover:underline text-sm inline-flex items-center">
                        Ajukan Sekarang<i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Card 4: Surat Pemberitahuan -->
                <div class="service-card bg-white rounded-xl shadow-lg border border-gray-100 card-hover p-6">
                    <div class="service-icon bg-yellow-100">
                        <i class="fas fa-bullhorn text-yellow-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800 mb-2">Surat Pemberitahuan</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Pemberitahuan resmi mengenai informasi penting dari fakultas.
                    </p>
                    <a href="#" class="text-primary-600 font-medium hover:underline text-sm inline-flex items-center">
                        Ajukan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Card 5: Surat Peminjaman -->
                <div class="service-card bg-white rounded-xl shadow-lg border border-gray-100 card-hover p-6">
                    <div class="service-icon bg-indigo-100">
                        <i class="fas fa-hand-holding-usd text-indigo-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800 mb-2">Surat Peminjaman</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Permohonan peminjaman barang, ruangan, atau fasilitas fakultas.
                    </p>
                    <a href="#" class="text-primary-600 font-medium hover:underline text-sm inline-flex items-center">
                        Ajukan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Card 6: Surat Pernyataan -->
                <div class="service-card bg-white rounded-xl shadow-lg border border-gray-100 card-hover p-6">
                    <div class="service-icon bg-red-100">
                        <i class="fas fa-file-signature text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800 mb-2">Surat Pernyataan</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Pernyataan resmi mengenai suatu hal dengan tanggung jawab penuh.
                    </p>
                    <a href="#" class="text-primary-600 font-medium hover:underline text-sm inline-flex items-center">
                        Ajukan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Card 7: Surat Mandat -->
                <div class="service-card bg-white rounded-xl shadow-lg border border-gray-100 card-hover p-6">
                    <div class="service-icon bg-teal-100">
                        <i class="fas fa-user-tie text-teal-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800 mb-2">Surat Mandat</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Pemberian wewenang untuk mewakili fakultas dalam kegiatan tertentu.
                    </p>
                    <a href="#" class="text-primary-600 font-medium hover:underline text-sm inline-flex items-center">
                        Ajukan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Card 8: Surat Tugas -->
                <div class="service-card bg-white rounded-xl shadow-lg border border-gray-100 card-hover p-6">
                    <div class="service-icon bg-orange-100">
                        <i class="fas fa-tasks text-orange-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800 mb-2">Surat Tugas</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Penugasan resmi untuk melaksanakan kegiatan tertentu dari fakultas.
                    </p>
                    <a href="#" class="text-primary-600 font-medium hover:underline text-sm inline-flex items-center">
                        Ajukan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Card 9: Surat Keterangan -->
                <div class="service-card bg-white rounded-xl shadow-lg border border-gray-100 card-hover p-6">
                    <div class="service-icon bg-cyan-100">
                        <i class="fas fa-certificate text-cyan-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800 mb-2">Surat Keterangan</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Keterangan aktif kuliah, bebas perpustakaan, dan keperluan administratif.
                    </p>
                    <a href="#" class="text-primary-600 font-medium hover:underline text-sm inline-flex items-center">
                        Ajukan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Card 10: Surat Rekomendasi -->
                <div class="service-card bg-white rounded-xl shadow-lg border border-gray-100 card-hover p-6">
                    <div class="service-icon bg-pink-100">
                        <i class="fas fa-star text-pink-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800 mb-2">Surat Rekomendasi</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Rekomendasi untuk beasiswa, pekerjaan, atau kegiatan akademik lainnya.
                    </p>
                    <a href="#" class="text-primary-600 font-medium hover:underline text-sm inline-flex items-center">
                        Ajukan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Card 11: Surat Balasan -->
                <div class="service-card bg-white rounded-xl shadow-lg border border-gray-100 card-hover p-6">
                    <div class="service-icon bg-lime-100">
                        <i class="fas fa-reply text-lime-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800 mb-2">Surat Balasan</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Tanggapan resmi terhadap surat masuk atau permohonan dari pihak lain.
                    </p>
                    <a href="#" class="text-primary-600 font-medium hover:underline text-sm inline-flex items-center">
                        Ajukan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Card 12: Surat Perintah Perjalanan Dinas -->
                <div class="service-card bg-white rounded-xl shadow-lg border border-gray-100 card-hover p-6">
                    <div class="service-icon bg-amber-100">
                        <i class="fas fa-plane text-amber-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800 mb-2">Surat Perintah Perjalanan Dinas</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Perintah resmi untuk melaksanakan perjalanan dinas dengan biaya fakultas.
                    </p>
                    <a href="#" class="text-primary-600 font-medium hover:underline text-sm inline-flex items-center">
                        Ajukan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Card 13: Sertifikat -->
                <div class="service-card bg-white rounded-xl shadow-lg border border-gray-100 card-hover p-6">
                    <div class="service-icon bg-emerald-100">
                        <i class="fas fa-award text-emerald-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800 mb-2">Sertifikat</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Pengesahan keikutsertaan, prestasi, atau penyelesaian program akademik.
                    </p>
                    <a href="#" class="text-primary-600 font-medium hover:underline text-sm inline-flex items-center">
                        Ajukan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Card 14: Surat Perjanjian Kerja -->
                <div class="service-card bg-white rounded-xl shadow-lg border border-gray-100 card-hover p-6">
                    <div class="service-icon bg-rose-100">
                        <i class="fas fa-file-contract text-rose-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800 mb-2">Surat Perjanjian Kerja</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Perjanjian kerja sama, magang, atau kegiatan profesional lainnya.
                    </p>
                    <a href="#" class="text-primary-600 font-medium hover:underline text-sm inline-flex items-center">
                        Ajukan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Card 15: Surat Pengantar -->
                <div class="service-card bg-white rounded-xl shadow-lg border border-gray-100 card-hover p-6">
                    <div class="service-icon bg-violet-100">
                        <i class="fas fa-paper-plane text-violet-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary-800 mb-2">Surat Pengantar</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Pengantar dokumen atau individu kepada instansi atau pihak tertentu.
                    </p>
                    <a href="#" class="text-primary-600 font-medium hover:underline text-sm inline-flex items-center">
                        Ajukan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

   

    <!-- ========== CTA SECTION ========== -->
    <section class="py-16 bg-gradient-to-r from-primary-700 to-primary-900 text-white">
        <div class="max-w-5xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Siap Mengajukan Surat?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Bergabung dengan ratusan mahasiswa yang telah menggunakan layanan E-Surat Fakultas Komputer
            </p>
            <a href="#services" 
               class="btn-primary inline-flex items-center text-lg px-8 py-4">
                <i class="fas fa-rocket mr-2"></i>
                Ajukan Surat Sekarang
            </a>
        </div>
    </section>

@endsection


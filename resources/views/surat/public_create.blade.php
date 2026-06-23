@extends('frontend.home')
@section('content')

<!DOCTYPE html>
<html lang="id">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fakultas Komputer</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Tailwind / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-blue-50 to-white text-gray-800 font-inter flex flex-col min-h-screen">

    <div class="container mx-auto my-10 px-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">

            <!-- Header -->
            <div class="bg-blue-600 text-white p-6">
                <h4 class="text-lg font-semibold">Formulir Pengajuan Surat</h4>
            </div>

            <!-- Body -->
<div class="p-6 space-y-6">

    @if (session('success'))
        <!-- Pesan Sukses -->
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-6 animate-fade-in">
            <h2 class="text-lg font-semibold mb-2">✅ Berhasil!</h2>
            <p>{{ session('success') }}</p>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-center gap-4 mt-6">
            <a href="{{ route('surat.public.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
                📝 Ajukan Surat Baru
            </a>
            <a href="{{ url('/') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition">
                ⬅️ Kembali
            </a>
        </div>

    @else
        <!-- Form hanya tampil jika belum berhasil -->
        <form action="{{ route('surat.public.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Kategori Surat -->
                    <div>
                        <label for="kategori_surat_id" class="block mb-2 font-medium">Kategori Surat</label>
                        <select name="kategori_surat_id" id="kategori_surat_id"
                            class="block w-full px-3 py-2 border border-gray-300 rounded bg-white text-gray-800 focus:outline-none focus:ring focus:ring-blue-300"
                            required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->jenis_surat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr class="border-t border-gray-300">

                    <!-- Data Mahasiswa -->
<h5 class="text-blue-600 font-semibold text-lg mb-4">Data Mahasiswa</h5>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <!-- NIM dengan button cari -->
    <div>
        <label class="block mb-2 font-medium">NIM (Silakan masukan NIM yang benar)</label>
        <div class="flex">
            <input type="text" name="nim" id="nim"
                class="border rounded-l px-3 py-2 w-full focus:outline-none focus:ring focus:ring-blue-300"
                placeholder="Masukkan NIM" required>
            <button type="button" id="btn_cari"
                class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-600 focus:outline-none">
                Cari
            </button>
        </div>
        <p id="nim_error" class="text-red-500 mt-1 text-sm hidden">NIM tidak ditemukan di database.</p>
    </div>

    <!-- Nama Mahasiswa -->
    <div>
        <label class="block mb-2 font-medium">Nama Mahasiswa</label>
        <input type="text" name="nama_mahasiswa" id="nama_mahasiswa"
            class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:ring-blue-300"
            readonly>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
    <!-- Program Studi -->
    <div>
        <label class="block mb-2 font-medium">Program Studi</label>
        <input type="text" name="program_studi" id="program_studi"
            class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:ring-blue-300"
            readonly>
    </div>

    <!-- Judul Penelitian / Kegiatan -->
    <div>
        <label class="block mb-2 font-medium">Judul Penelitian / Kegiatan</label>
        <textarea name="judul_penelitian" rows="4"
            class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:ring-blue-300"
            placeholder="Tulis judul penelitian atau kegiatan di sini..."></textarea>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const nimInput = document.getElementById('nim');
    const btnCari = document.getElementById('btn_cari');
    const namaInput = document.getElementById('nama_mahasiswa');
    const prodiInput = document.getElementById('program_studi');
    const errorMsg = document.getElementById('nim_error');

    async function cariMahasiswa() {
        const nim = nimInput.value.trim();
        if (nim === '') {
            namaInput.value = '';
            prodiInput.value = '';
            errorMsg.classList.add('hidden');
            nimInput.classList.remove('border-red-500');
            return;
        }

        try {
            const response = await fetch(`/mahasiswa/${nim}`);
            const result = await response.json();

            if (result.success) {
                namaInput.value = result.data.nama;
                prodiInput.value = result.data.program_studi;
                errorMsg.classList.add('hidden');
                nimInput.classList.remove('border-red-500');
            } else {
                namaInput.value = '';
                prodiInput.value = '';
                errorMsg.classList.remove('hidden');
                nimInput.classList.add('border-red-500');
            }
        } catch (error) {
            console.error('Error fetching data:', error);
            namaInput.value = '';
            prodiInput.value = '';
            errorMsg.classList.remove('hidden');
            errorMsg.textContent = 'Terjadi kesalahan saat mengambil data.';
            nimInput.classList.add('border-red-500');
        }
    }

    // Event button click
    btnCari.addEventListener('click', cariMahasiswa);

    // Optional: juga bisa pakai blur
    nimInput.addEventListener('blur', cariMahasiswa);
});
</script>

                    <hr class="border-t border-gray-300">

                    <h5 class="text-blue-600 font-semibold text-lg mb-4">Data Penerima Surat</h5>

<!-- Pilih penerima -->
<div class="mb-4">
    <label for="penerima_option" class="block mb-2 font-medium">Pilih Penerima</label>
    <select name="penerima_option" id="penerima_option"
        class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:ring-blue-300"
        required>
        <option value="">-- Pilih Penerima --</option>
        <option value="baru">+ Tambah Penerima Baru</option>
        @foreach ($penerima as $p)
            <option value="{{ $p->id }}">{{ $p->nama_penerima }} ({{ $p->instansi }} - {{ $p->jabatan_penerima }})</option>
        @endforeach
        
    </select>
</div>

<!-- Field tambahan jika pilih penerima baru -->
<div id="penerima_baru_fields" class="hidden border border-blue-200 bg-blue-50 p-4 rounded-lg">
    <p class="text-sm text-blue-700 mb-3">Masukkan data penerima baru di bawah ini:</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Nama penerima -->
        <div>
            <label for="nama_penerima" class="block mb-2 font-medium">Nama Penerima</label>
            <input type="text" name="nama_penerima" id="nama_penerima"
                class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:ring-blue-300"
                placeholder="Contoh: Ilwan Syafrinal, S.Kom., M.KOm.">
        </div>

        <!-- Jabatan penerima -->
        <div>
            <label for="jabatan_penerima" class="block mb-2 font-medium">Jabatan</label>
            <input type="text" name="jabatan_penerima" id="jabatan_penerima"
                class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:ring-blue-300"
                placeholder="Contoh: Sekretaris Dekan Fakultas Komputer">
        </div>

        <!-- Instansi penerima -->
        <div>
            <label for="instansi" class="block mb-2 font-medium">Instansi</label>
            <input type="text" name="instansi" id="instansi"
                class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:ring-blue-300"
                placeholder="Contoh: Universitas Universal">
        </div>
    </div>
</div>

<!-- Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const select = document.getElementById('penerima_option');
    const fields = document.getElementById('penerima_baru_fields');

    select.addEventListener('change', function() {
        if (select.value === 'baru') {
            fields.classList.remove('hidden');
        } else {
            fields.classList.add('hidden');
        }
    });
});
</script>


                    <hr class="border-t border-gray-300">

                    <!-- Perihal dan Lampiran -->
                    <div>
                        <label class="block mb-2 font-medium">Perihal Surat</label>
                        <input type="text" name="perihal"
                            class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:ring-blue-300"
                            required placeholder="Misal: Permohonan Izin Wawancara untuk Tugas Akhir">
                    </div>
                    {{-- <div>
                        <label class="block mb-2 font-medium">Tanggal</label>
                        <input type="date" name="tanggal"
                            class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:ring-blue-300"
                            required>
                    </div> --}}

                    <div>
                        <label class="block mb-2 font-medium">Lampiran (Opsional)</label>
                        <input type="file" name="file"
                            class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:ring-blue-300"
                            accept=".pdf,.doc,.docx">
                    </div>

                    <div class="text-right">
                        <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Kirim
                            Pengajuan</button>
                    </div>
                </form>
    @endif
</div>        
            </div>
        </div>
    </div>
</body>
</html>
@endsection
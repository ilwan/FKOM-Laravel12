@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
    <div class="col-lg-3 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Selamat Datang</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->name }}</div>
            </div>
        </div>
    </div>

   <div class="col-lg-9 mb-4">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="card-title">Fakultas Komputer - Universitas Universal</h4>
            <p>Selamat datang di dashboard Fakultas Komputer <strong>Universitas Universal</strong>. 
            Halaman ini merupakan tampilan dashboard yang telah dimodifikasi menggunakan template 
            <strong>SB Admin 2</strong> dan framework <strong>Laravel Breeze</strong>.</p>
            
            <p>Dashboard ini dirancang untuk memudahkan pengelolaan data akademik, kegiatan mahasiswa, serta informasi terkini 
            seputar Fakultas Komputer.</p>
            
            <p>Kamu dapat menambahkan grafik perkembangan mahasiswa, tabel data dosen dan mata kuliah, 
            serta berbagai fitur lainnya sesuai kebutuhan sistem akademik universitas.</p>
            
            <p><em>Versi Dashboard: 1.0 | Terakhir diperbarui: November 2025</em></p>
        </div>
    </div>
</div>

</div>
@endsection

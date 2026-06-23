@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <h3>Detail Project</h3>

    <div class="card p-3">
        <h4>{{ $project->title }}</h4>
        <p><strong>Mahasiswa:</strong> {{ $project->student }} ({{ $project->nim }})</p>
        <p><strong>Prodi:</strong> {{ $project->prodi }}</p>
        <p><strong>Kategori:</strong> {{ $project->category }}</p>
        <p><strong>Deskripsi:</strong> {{ $project->description }}</p>

        <p><strong>Tags:</strong> 
            {{ implode(', ', json_decode($project->tags ?? '[]')) }}
        </p>

        <p><strong>Gallery:</strong></p>
        @foreach (json_decode($project->gallery ?? '[]') as $img)
            <img src="{{ $img }}" width="120" class="me-2 mb-2">
        @endforeach

        <p><strong>GitHub:</strong> <a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a></p>
        <p><strong>Demo:</strong> <a href="{{ $project->demo }}" target="_blank">{{ $project->demo }}</a></p>
        <p><strong>Tahun:</strong> {{ $project->year }}</p>

        <a href="{{ route('project.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection

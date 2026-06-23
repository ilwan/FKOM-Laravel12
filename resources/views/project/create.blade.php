@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Tambah Project</h3>
    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('project.form')

        <button class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection

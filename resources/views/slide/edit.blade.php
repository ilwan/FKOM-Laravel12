@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Slide</h6>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('slide.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Slide</label>
                    <input type="text" name="title" id="title" 
                           class="form-control" value="{{ old('title', $slide->title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Slide</label>
                    <textarea name="description" id="description" rows="4" 
                              class="form-control">{{ old('description', $slide->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="alt_text" class="form-label">ALT Text Gambar</label>
                    <input type="text" name="alt_text" id="alt_text" 
                           class="form-control" value="{{ old('alt_text', $slide->alt_text) }}" required>
                </div>

                <div class="mb-3">
                    <label for="is_active" class="form-label">Status</label>
                    <select name="is_active" id="is_active" class="form-control">
                        <option value="1" {{ old('is_active', $slide->is_active) == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('is_active', $slide->is_active) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="display_order" class="form-label">Urutan Tampil</label>
                    <input type="number" name="display_order" id="display_order" 
                           class="form-control" value="{{ old('display_order', $slide->display_order) }}">
                </div>

                <div class="mb-3">
                    <label for="image_path" class="form-label">Upload Gambar</label>
                    <input type="file" name="image_path" id="image_path" class="form-control">
                    @if ($slide->image_path)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $slide->image_path) }}" width="100" class="img-thumbnail">
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('slide.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<div class="row">

    <div class="col-md-6">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" required
            value="{{ old('title', $project->title ?? '') }}">
    </div>

    <div class="col-md-6">
        <label>Mahasiswa</label>
        <input type="text" name="student" class="form-control" required
            value="{{ old('student', $project->student ?? '') }}">
    </div>

    <div class="col-md-6 mt-3">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control" required
            value="{{ old('nim', $project->nim ?? '') }}">
    </div>

    <div class="col-md-6 mt-3">
        <label>Prodi</label>
        <input type="text" name="prodi" class="form-control" required
            value="{{ old('prodi', $project->prodi ?? '') }}">
    </div>

    <div class="col-md-6 mt-3">
        <label>Kategori</label>
        <input type="text" name="category" class="form-control"
            value="{{ old('category', $project->category ?? '') }}">
    </div>

    <div class="col-md-12 mt-3">
        <label>Deskripsi</label>
        <textarea name="description" rows="4" class="form-control">{{ old('description', $project->description ?? '') }}</textarea>
    </div>

<div class="col-md-6 mt-3">
    <label>Gambar Utama</label>
    <input type="file" name="image" class="form-control" accept="image/*">
    
    @if(isset($project) && $project->image)
        <img src="{{ asset('storage/' . $project->image) }}" 
             class="img-thumbnail mt-2" width="120">
    @endif
</div>

<div class="col-md-6 mt-3">
    <label>Gallery</label>
    <input type="file" name="gallery[]" class="form-control" accept="image/*" multiple>

    @if(isset($project) && $project->gallery)
        <div class="mt-2 d-flex flex-wrap">
            @foreach(json_decode($project->gallery) as $g)
                <img src="{{ asset('storage/' . $g) }}" 
                     class="img-thumbnail me-2 mb-2" width="100">
            @endforeach
        </div>
    @endif
</div>

    <div class="col-md-6 mt-3">
        <label>Tags (Pisahkan dengan koma)</label>
        <input type="text" name="tags" class="form-control"
            value="{{ old('tags', isset($project) ? implode(',', json_decode($project->tags ?? '[]')) : '') }}">
    </div>

    <div class="col-md-6 mt-3">
        <label>GitHub / Link</label>
        <input type="text" name="link" class="form-control"
            value="{{ old('link', $project->link ?? '') }}">
    </div>

    <div class="col-md-6 mt-3">
        <label>Demo Aplikasi</label>
        <input type="text" name="demo" class="form-control"
            value="{{ old('demo', $project->demo ?? '') }}">
    </div>

    <div class="col-md-3 mt-3">
        <label>Tahun</label>
        <input type="text" name="year" class="form-control"
            value="{{ old('year', $project->year ?? '') }}">
    </div>

</div>

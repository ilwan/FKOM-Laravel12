<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('project.index', compact('projects'));
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
    // ========================
    // VALIDASI
    // ========================
    $validated = $request->validate([
        'title'      => 'required|string|max:255',
        'student'    => 'required|string|max:255',
        'nim'        => 'required|string|max:50',
        'prodi'      => 'required|string|max:255',
        'category'   => 'nullable|string|max:255',
        'description'=> 'nullable|string',
        'image'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'gallery.*'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'tags'       => 'nullable|string',
        'link'       => 'nullable|string',
        'demo'       => 'nullable|string',
        'year'       => 'nullable|string|max:10',
    ]);

    // ========================
    // HANDLE GAMBAR UTAMA
    // ========================
    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('project/image', 'public');
    }

    // ========================
    // HANDLE GALLERY MULTIPLE
    // ========================
    $galleryPaths = [];

    if ($request->hasFile('gallery')) {
        foreach ($request->file('gallery') as $file) {
            $galleryPaths[] = $file->store('project/gallery', 'public');
        }
    }

    // ========================
    // HANDLE TAGS (diubah menjadi array JSON)
    // ========================
    $tags = [];
    if (!empty($request->tags)) {
        $tags = array_map('trim', explode(',', $request->tags));
    }

    // ========================
    // SIMPAN KE DATABASE
    // ========================
    $project = new Project();
    $project->title       = $request->title;
    $project->student     = $request->student;
    $project->nim         = $request->nim;
    $project->prodi       = $request->prodi;
    $project->category    = $request->category;
    $project->description = $request->description;
    $project->image       = $imagePath;
    $project->gallery     = json_encode($galleryPaths);
    $project->tags        = json_encode($tags);
    $project->link        = $request->link;
    $project->demo        = $request->demo;
    $project->year        = $request->year;
    $project->save();

    return redirect()->route('project.index')->with('success', 'Project berhasil ditambahkan!');
}

// public function store(Request $request)
// {
//     $request->validate([
//         'title' => 'required',
//         'student' => 'required',
//         'nim' => 'required',
//         'prodi' => 'required',
//         'category' => 'nullable',
//         'description' => 'nullable',
//         'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
//         'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
//         'tags' => 'nullable',
//     ]);
// dd($request->all());

//     // Upload Gambar Utama
//     $imagePath = null;
//     if ($request->hasFile('image')) {
//         $imagePath = $request->file('image')->store('projects', 'public');
//     }

//     // Upload Galeri
//     $galleryPaths = [];
//     if ($request->hasFile('gallery')) {
//         foreach ($request->file('gallery') as $file) {
//             $galleryPaths[] = $file->store('projects/gallery', 'public');
//         }
//     }

//     // Tags aman
//     $tags = $request->tags 
//         ? array_map('trim', explode(',', $request->tags)) 
//         : [];

//     Project::create([
//         'title' => $request->title,
//         'student' => $request->student,
//         'nim' => $request->nim,
//         'prodi' => $request->prodi,
//         'category' => $request->category,
//         'description' => $request->description,
//         'image' => $imagePath,
//         'gallery' => json_encode($galleryPaths),
//         'tags' => json_encode($tags),
//         'link' => $request->link,
//         'demo' => $request->demo,
//         'year' => $request->year,
//     ]);

//     return back()->with('success', 'Project berhasil disimpan!');
// }
    public function show(Project $project)
    {
        return view('project.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'student' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
        ]);

        $project->update([
            'title' => $request->title,
            'student' => $request->student,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $request->image,
            'gallery' => json_encode($request->gallery ?? []),
            'tags' => json_encode($request->tags ?? []),
            'link' => $request->link,
            'demo' => $request->demo,
            'year' => $request->year,
        ]);

        return redirect()->route('project.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index')->with('success', 'Data berhasil dihapus!');
    }
}

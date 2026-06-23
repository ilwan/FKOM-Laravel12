<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slide = Slide::all();
        return view('slide.index', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slide.create');
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    $request->validate([
        'image_path'  => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'alt_text'    => 'required|string|max:255',
        'title'       => 'required|string|max:255',
        'description' => 'nullable|string', // bisa panjang sesuai tipe text
        'is_active'   => 'required|boolean',
        'display_order' => 'nullable|integer|min:0',
    ]);

    // Upload gambar
    $gambarPath = null;
    if ($request->hasFile('image_path')) {
        $gambarPath = $request->file('image_path')->store('slides', 'public');
    }

    Slide::create([
        'image_path'    => $gambarPath,
        'alt_text'      => $request->alt_text,
        'title'         => $request->title,
        'description'   => $request->description,
        'is_active'     => $request->is_active,
        'display_order' => $request->display_order ?? 0,
    ]);

    return redirect()->route('slide.index')->with('success', 'Slide berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(Slide $slide)
    {
        return view('slide.show', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        return view('slide.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, Slide $slide)
{
    $request->validate([
        'image_path'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'alt_text'      => 'required|string|max:255',
        'title'         => 'required|string|max:255',
        'description'   => 'nullable|string',
        'is_active'     => 'required|boolean',
        'display_order' => 'nullable|integer|min:0',
    ]);

    $gambarPath = $slide->image_path;

    if ($request->hasFile('image_path')) {
        // hapus gambar lama
        if ($slide->image_path && Storage::disk('public')->exists($slide->image_path)) {
            Storage::disk('public')->delete($slide->image_path);
        }

        $gambarPath = $request->file('image_path')->store('slides', 'public');
    }

    // update data
    $slide->update([
        'image_path'    => $gambarPath,
        'alt_text'      => $request->alt_text,
        'title'         => $request->title,
        'description'   => $request->description,
        'is_active'     => $request->is_active,
        'display_order' => $request->display_order ?? 0,
    ]);

    return redirect()->route('slide.index')->with('success', 'Slide berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        if($slide->image_path && Storage::disk('public')->exists($slide->image_path)){
            Storage::disk('public')->delete($slide->image_path);
        }
        $slide->delete();
        return redirect()->route('slide.index')->with('success', 'Data Image Berhasil Dihapus');
    }
}

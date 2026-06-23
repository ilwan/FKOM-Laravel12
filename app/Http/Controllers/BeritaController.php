<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Tampilkan semua berita.
     */
    public function index()
    {
        $berita = Berita::latest()->paginate(10); 
        return view('berita.index', compact('berita'));
    }

    /**
     * Form tambah berita.
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Simpan berita baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required',
            'kategori'=> 'nullable|string|max:100',
            'penulis' => 'nullable|string|max:100',
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'  => 'required|in:draft,publish',
        ]);

        // Upload gambar jika ada
        $gambarPath = null;
        if ($request->hasFile('foto')) {
            $gambarPath = $request->file('foto')->store('berita', 'public');
        }

        Berita::create([
            'judul'   => $request->judul,
            'slug'    => Str::slug($request->judul),
            'isi'     => $request->isi,
            'kategori'=> $request->kategori ?? 'Umum',
            'penulis' => $request->penulis ?? 'Admin',
            'foto'  => $gambarPath,
            'status'  => $request->status,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Detail berita.
     */
    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    /**
     * Form edit berita.
     */
    public function edit(Berita $berita)
    {
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update berita.
     */
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required',
            'kategori'=> 'nullable|string|max:100',
            'penulis' => 'nullable|string|max:100',
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'  => 'required|in:draft,publish',
        ]);

        $gambarPath = $berita->foto;
        if ($request->hasFile('foto')) {
            $gambarPath = $request->file('foto')->store('berita', 'public');
        }

        $berita->update([
            'judul'   => $request->judul,
            'slug'    => Str::slug($request->judul),
            'isi'     => $request->isi,
            'kategori'=> $request->kategori ?? 'Umum',
            'penulis' => $request->penulis ?? 'Admin',
            'foto'  => $gambarPath,
            'status'  => $request->status,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Hapus berita.
     */
    public function destroy(Berita $berita)
    {
        if ($berita->foto && file_exists(storage_path('app/public/' . $berita->foto))) {
            unlink(storage_path('app/public/' . $berita->foto));
        }

        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}

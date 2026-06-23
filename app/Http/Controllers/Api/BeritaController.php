<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    // GET /api/berita
    public function index()
    {
        $berita = Berita::all()->map(function($item) {
        $item->foto_url = $item->foto ? url('storage/' . $item->foto) : null;
        return $item;
        });
        return response()->json($berita);
    }

    // POST /api/berita
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
            'foto'  => 'nullable|image|max:2048',
            'kategori' => 'nullable|string|max:100',
            'penulis'  => 'nullable|string|max:100',
            'status'   => 'nullable|in:draft,publish',
        ]);

        $fotoPath = $request->file('foto') ? $request->file('foto')->store('berita', 'public') : null;

        $berita = Berita::create([
            'judul' => $request->judul,
            'slug'  => Str::slug($request->judul),
            'isi'   => $request->isi,
            'kategori' => $request->kategori ?? 'Umum',
            'penulis'  => $request->penulis ?? 'Admin',
            'status'   => $request->status ?? 'publish',
            'foto'     => $fotoPath,
        ]);

        return response()->json($berita, 201);
    }

    // GET /api/berita/{berita}
    public function show(Berita $berita)
    {
        return response()->json($berita);
    }

    // PUT /api/berita/{berita}
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
            'foto'  => 'nullable|image|max:2048',
            'kategori' => 'nullable|string|max:100',
            'penulis'  => 'nullable|string|max:100',
            'status'   => 'nullable|in:draft,publish',
        ]);

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            if ($berita->foto && file_exists(storage_path('app/public/' . $berita->foto))) {
                unlink(storage_path('app/public/' . $berita->foto));
            }
            $berita->foto = $request->file('foto')->store('berita', 'public');
        }

        $berita->update([
            'judul' => $request->judul,
            'slug'  => Str::slug($request->judul),
            'isi'   => $request->isi,
            'kategori' => $request->kategori ?? $berita->kategori,
            'penulis'  => $request->penulis ?? $berita->penulis,
            'status'   => $request->status ?? $berita->status,
        ]);

        return response()->json($berita);
    }

    // DELETE /api/berita/{berita}
    public function destroy(Berita $berita)
    {
        if ($berita->foto && file_exists(storage_path('app/public/' . $berita->foto))) {
            unlink(storage_path('app/public/' . $berita->foto));
        }

        $berita->delete();

        return response()->json(['message' => 'Berita berhasil dihapus']);
    }
}


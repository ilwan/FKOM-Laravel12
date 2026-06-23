<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\NotulenRapat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class NotulenRapatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $notulen = NotulenRapat::with('foto')->latest()->paginate(10);
        return view('notulen.index', compact('notulen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::all();
        return view('notulen.create', compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  Validasi input
        $validated = $request->validate([
            'judul'          => 'required|string|max:255',
            'tanggal'        => 'required|date',
            'waktu_mulai'    => 'required',
            'waktu_selesai'  => 'required',
            'tempat'         => 'required|string|max:255',
            'pemimpin_rapat' => 'required|string|max:255',
            'notulis'        => 'required|string|max:255',
            'agenda'         => 'nullable|string',
            'hasil_rapat'    => 'nullable|string',
            'tindak_lanjut'  => 'nullable|string',
            'peserta'        => 'nullable|array',
            'foto.*'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        //  Simpan data notulen
        $notulen = NotulenRapat::create($validated);

        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                if ($file->isValid()) {
                    // Upload ke storage/app/public/notulen_foto
                    $path = $file->store('notulen_foto', 'public');
                    // Debug: cek path
                    Log::info('Upload foto notulen: ' . $path);
                    // Simpan ke tabel notulen_foto
                    $foto = $notulen->foto()->create([
                        'foto_path' => $path,
                    ]);
                    // Debug: cek data foto tersimpan
                    Log::info('Foto tersimpan: ' . json_encode($foto));
                } else {
                    Log::warning('File tidak valid: ' . $file->getClientOriginalName());
                }
            }
        }

        //  Redirect dengan pesan sukses
        return redirect()->route('notulen.index')
                         ->with('success', 'Notulen rapat dan foto berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(NotulenRapat $notulen)
    {
        $notulen->load('foto');
        return view('notulen.show', compact('notulen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NotulenRapat $notulen)
    {
        return view('notulen.edit', compact('notulen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NotulenRapat $notulen)
    {
        $validated = $request->validate([
            'judul'          => 'required|string|max:255',
            'tanggal'        => 'required|date',
            'waktu_mulai'    => 'required',
            'waktu_selesai'  => 'required',
            'tempat'         => 'required|string|max:255',
            'pemimpin_rapat' => 'required|string|max:255',
            'notulis'        => 'required|string|max:255',
            'agenda'         => 'nullable|string',
            'hasil_rapat'    => 'nullable|string',
            'tindak_lanjut'  => 'nullable|string',
            'peserta'        => 'nullable|array',
            'foto.*'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'hapus_foto'     => 'nullable|array', // array id foto yang mau dihapus
        ]);

        // Update data notulen
        $notulen->update($validated);


        // Hapus foto lama jika diminta
        if ($request->filled('hapus_foto')) {
            foreach ($request->hapus_foto as $fotoId) {
                $foto = $notulen->foto()->find($fotoId);
                if ($foto) {
                    // Hapus file dari storage
                    if ($foto->foto_path && Storage::disk('public')->exists($foto->foto_path)) {
                        Storage::disk('public')->delete($foto->foto_path);
                    }
                    // Hapus record dari database
                    $foto->delete();
                }
            }
        }

        //  Tambahkan foto baru jika ada
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('notulen_foto', 'public');
                    Log::info('Upload foto baru: '.$path);

                    $notulen->foto()->create([
                        'foto_path' => $path,
                    ]);
                }
            }
        }

        return redirect()->route('notulen.index')->with('success', 'Notulen rapat berhasil diperbarui.');
    }


    public function print($id)
        {
        $notulen = NotulenRapat::with('foto')->findOrFail($id);

        $pdf = Pdf::loadView('notulen.print', compact('notulen'))
              ->setPaper('a4', 'portrait');

        return $pdf->stream('notulen-'.$notulen->id.'.pdf');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NotulenRapat $notulen)
    {
         foreach ($notulen->foto as $foto) {
        if ($foto->foto_path && Storage::disk('public')->exists($foto->foto_path)) {
            Storage::disk('public')->delete($foto->foto_path);
        }
        $foto->delete();
    }
    // Hapus notulen
    $notulen->delete();

    return redirect()->route('notulen.index')->with('success', 'Notulen rapat berhasil dihapus.');
    }
}

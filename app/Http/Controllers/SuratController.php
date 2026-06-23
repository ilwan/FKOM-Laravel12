<?php

namespace App\Http\Controllers;

use App\Models\KategoriSurat;
use App\Models\Surat;
use App\Services\LetterNumberGenerator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected LetterNumberGenerator $generator;


    public function __construct(LetterNumberGenerator $generator)
    {
        $this->generator = $generator;
    }
    
public function index(Request $request)
{
    // $query = Surat::query()->with('kategori');

    // if ($request->q) {
    //     $query->where(function ($q) use ($request) {
    //         $q->where('nomor_surat', 'like', '%' . $request->q . '%')
    //           ->orWhere('perihal', 'like', '%' . $request->q . '%');
    //     });
    // }

    // if ($request->kategori) {
    //     $query->where('kategori_surat_id', $request->kategori);
    // }

    // if ($request->has(['sort', 'order'])) {
    //     $query->orderBy($request->sort, $request->order);
    // } else {
    //     $query->latest();
    // }

    // $surats = $query->get(); // <-- Ganti paginate jadi get()

    // $kategori = KategoriSurat::all();

    // return view('surat.index', compact('surats', 'kategori'))
    //     ->with([
    //         'q' => $request->q,
    //         'selectedKategori' => $request->kategori,
    //         'sort' => $request->sort,
    //         'order' => $request->order,
    //     ]);
        // Ambil semua surat beserta relasinya
        $surat = Surat::with([
            'kategori',
            'penerima',
            'mahasiswa',
        ])->latest()->get();

        return view('surat.index', compact('surat'));
    
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = KategoriSurat::all();
        return view('surat.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $data = $request->validate([
        'kategori_surat_id' => 'required|exists:tbl_kategori_surat,id',
        'tanggal' => 'required|date',
        'perihal' => 'required|string',
        'file' => 'nullable|file|mimes:pdf|max:5120',
    ]);

    $kategori = KategoriSurat::find($request->kategori_surat_id);

    // Validasi tipe hanya jika kategori adalah "Undangan"
    if ($kategori && $kategori->kode === '02') {
        $request->validate([
            'tipe' => 'required|in:internal,external',
        ]);

        // Tambahkan 'tipe' ke array data agar bisa digunakan di LetterNumberGenerator
        $data['tipe'] = $request->input('tipe');
    }

    if ($request->hasFile('file')) {
        $path = $request->file('file')->store('surat');
        $data['file_url'] = $path;
    }

    $surat = $this->generator->createLetter($data);

    return redirect()->route('surat.show', $surat->id)
        ->with('success', 'Surat berhasil dibuat: ' . $surat->nomor_surat);
}
    /**
     * Display the specified resource.
     */
    public function show(Surat $surat)
    {
    // Muat relasi terkait menggunakan load()
    $surat->load(['kategori', 'penerima', 'mahasiswa']);
    return view('surat.show', compact('surat'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    // public function verifikasi(Surat $surat)
    // {
    //     // contoh sederhana: verifikasi hanya menampilkan halaman untuk tanda tangan
    //     return view('surat.verifikasi', compact('surat'));
    // }
    
public function verifikasi(Surat $surat)
{
    if(!$surat->pengirim_id){
        // Contoh: otomatis assign pengirim dengan id 1
        $surat->pengirim_id = 1; // sesuaikan dengan logika verifikasi
        $surat->save();

        return redirect()->back()->with('success', 'Surat berhasil diverifikasi.');
    }

    return redirect()->back()->with('info', 'Surat sudah diverifikasi sebelumnya.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
       $surat->delete();
        return redirect()->route('surat.index')->with('success', 'Surat dihapus');
    }
    public function setuju(Surat $surat)
{
    if($surat->status == 'pending'){
        $surat->status = 'disetujui';
        $surat->save();

        return redirect()->back()->with('success', 'Surat berhasil disetujui.');
    }

    return redirect()->back()->with('info', 'Surat sudah diproses sebelumnya.');
}

public function tolak(Surat $surat)
{
    if($surat->status == 'pending'){
        $surat->status = 'ditolak';
        $surat->save();

        return redirect()->back()->with('success', 'Surat berhasil ditolak.');
    }

    return redirect()->back()->with('info', 'Surat sudah diproses sebelumnya.');
}


public function cetakPDF(Surat $surat)
{
    $surat->load(['pengirim','mahasiswa','kategori','penerima']);
    $pdf = Pdf::loadView('surat.pdf', compact('surat'))
              ->setPaper('a4', 'portrait');

    $filename = 'Surat_' . Str::slug($surat->nomor_surat, '_') . '.pdf';

    return $pdf->stream($filename);
}

}

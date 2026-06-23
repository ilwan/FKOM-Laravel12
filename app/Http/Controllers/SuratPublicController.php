<?php

namespace App\Http\Controllers;

use App\Models\KategoriSurat;
use App\Models\PenerimaSurat;
use App\Models\Mahasiswa;
use App\Models\MahasiswaSurat;
use App\Services\LetterNumberGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class SuratPublicController extends Controller
{
    protected LetterNumberGenerator $generator;

    public function __construct(LetterNumberGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * Tampilkan form pengajuan surat.
     */
    public function create()
    {
        $kategori = KategoriSurat::where('jenis_surat', 'Surat Permohonan')->get();
        $penerima = PenerimaSurat::all();
        $mahasiswa = Mahasiswa::all();

        return view('surat.public_create', compact('kategori', 'penerima', 'mahasiswa'));
    }

    /**
     * Simpan pengajuan surat ke database.
     */
    public function store(Request $request)
{
    // 1. Validasi input
    $request->validate([
        'kategori_surat_id' => 'required|exists:tbl_kategori_surat,id',
        // 'tanggal' => 'required|date',
        'tanggal' => 'nullable|date',
        'perihal' => 'required|string|max:255',
        'file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        'nim' => 'nullable|string|max:20',
        'nama_mahasiswa' => 'required|string|max:255',
        'program_studi' => 'nullable|string|max:255',
        'judul_penelitian' => 'nullable|string|max:500',
        'penerima_option' => 'required|string',
        'nama_penerima' => 'sometimes|required_if:penerima_option,baru|nullable|string|max:255',
        'jabatan_penerima' => 'nullable|string|max:255',
        'instansi' => 'nullable|string|max:255',
    ]);

    try {
        // 🗂️ 2. Upload file (jika ada)
        $fileUrl = null;
        if ($request->hasFile('file')) {
            $fileUrl = $request->file('file')->store('surat', 'public');
        }

        // ⚙️ 3. Siapkan data untuk LetterNumberGenerator
        $data = [
            'kategori_surat_id' => $request->kategori_surat_id,
            // 'tanggal' => $request->tanggal,
            'tanggal' => now()->format('Y-m-d'),
            'perihal' => $request->perihal,
            'file_url' => $fileUrl,
        ];

        // 🔢 4. Tambahkan tipe jika kategori = "Undangan"
        $kategori = KategoriSurat::find($request->kategori_surat_id);
        if ($kategori && $kategori->kode === '02') {
            $request->validate(['tipe' => 'required|in:internal,external']);
            $data['tipe'] = $request->input('tipe');
        }

        // 📨 5. Buat surat baru via service (service sudah pakai DB::transaction)
        $surat = $this->generator->createLetter($data);

        // 👤 6. Tambah penerima (baru atau pilih dari existing)
        if ($request->penerima_option === 'baru') {
            $penerima = PenerimaSurat::create([
                'nama_penerima' => $request->nama_penerima,
                'jabatan_penerima' => $request->jabatan_penerima,
                'instansi' => $request->instansi,
            ]);
            $surat->update(['penerima_id' => $penerima->id]);
        } else {
            $surat->update(['penerima_id' => $request->penerima_option]);
        }

        // 🎓 7. Simpan data mahasiswa pengaju
        MahasiswaSurat::create([
            'surat_id' => $surat->id,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim' => $request->nim,
            'program_studi' => $request->program_studi,
            'judul_penelitian' => $request->judul_penelitian,
        ]);

        // ✅ 8. Redirect sukses
        return redirect()->route('surat.public.create')
            ->with('success', 'Surat berhasil dibuat: ');

    } catch (\Throwable $e) {
        // 🚨 Tangani error dengan detail
        return back()
            ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])
            ->withInput();
    }
}
}

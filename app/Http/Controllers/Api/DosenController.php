<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;
use Symfony\Component\HttpFoundation\Response;

class DosenController extends Controller
{
    // GET /api/dosen
    public function index()
    {

        $dosen = Dosen::all()->map(function($item) {
        $item->foto_url = $item->foto_url ? url('storage/' . $item->foto_url) : null;
       return $item;
       });
        return response()->json($dosen, Response::HTTP_OK);
    }
    //menanpilkan
    public function dosenprodi($prodi)
        {
    
        // return response()->json(
        // Dosen::where('prodi', urldecode($prodi))->get()
        // );
        
        $dosen = Dosen::where('prodi', urldecode($prodi))->get();
        $dosen->transform(function ($item) {
        // jika ada foto
        if ($item->foto_url) {
            $item->foto_url = asset('storage/' . $item->foto_url);
        } else {
            $item->foto_url = null;
        }
        return $item;
        });
        return response()->json($dosen);
    }

    public function show($id)
    {
    $dosen = Dosen::find($id);

    if (!$dosen) {
        return response()->json(['message' => 'Data Dosen tidak ditemukan'], 404);
    }

    // pastikan URL foto disamakan dengan index
    $dosen->foto_url = $dosen->foto_url 
        ? url('storage/' . $dosen->foto_url) 
        : null;

    return response()->json($dosen);
}

    // POST /api/dosen
    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:tbl_dosen,nidn',
            'nama' => 'required',
            'email' => 'required|email|unique:tbl_dosen,email',
            'jurusan' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('dosen', 'public');
        }

        $dosen = Dosen::create([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'jabatan' => $request->jabatan,
            'foto' => $foto,
        ]);

        return response()->json([
            'message' => 'Data Dosen berhasil ditambahkan',
            'data' => $dosen
        ], 201);
    }

    // PUT /api/dosen/{id}
    public function update(Request $request, $id)
    {
        $dosen = Dosen::find($id);
        if (!$dosen) {
            return response()->json(['message' => 'Data Dosen tidak ditemukan'], 404);
        }

        $request->validate([
            'nidn' => 'required|unique:tbl_dosen,nidn,' . $dosen->id,
            'nama' => 'required',
            'email' => 'required|email|unique:tbl_dosen,email,' . $dosen->id,
            'jurusan' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = $dosen->foto;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('dosen', 'public');
        }

        $dosen->update([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'jabatan' => $request->jabatan,
            'foto' => $foto,
        ]);

        return response()->json([
            'message' => 'Data Dosen berhasil diperbarui',
            'data' => $dosen
        ]);
    }

    // DELETE /api/dosen/{id}
    public function destroy($id)
    {
        $dosen = Dosen::find($id);
        if (!$dosen) {
            return response()->json(['message' => 'Data Dosen tidak ditemukan'], 404);
        }
        $dosen->delete();
        return response()->json(['message' => 'Data Dosen berhasil dihapus']);
    }
}

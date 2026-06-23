<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $dosen = Dosen::all();
         return view('dosen.index', compact('dosen'));
    }
//  public function index(Request $request)
//     {
//         if ($request->ajax()) {
//             $query = Dosen::query();

//             return DataTables::of($query)
//                 ->addIndexColumn() // untuk nomor urut otomatis
//                 ->addColumn('foto', function ($dosen) {
//                     if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)) {
//                         return '<img src="' . Storage::url($dosen->foto) . '" alt="Foto Dosen" width="70" class="img-thumbnail">';
//                     }
//                     return '<img src="' . asset('assets/images/avatar-grey.png') . '" alt="No Foto" width="70" class="img-thumbnail">';
//                 })
//                 ->addColumn('action', function ($dosen) {
//                     $showUrl = route('dosen.show', $dosen->id);
//                     $editUrl = route('dosen.edit', $dosen->id);
//                     $deleteUrl = route('dosen.destroy', $dosen->id);

//                     return '
//                         <a href="'.$showUrl.'" class="btn btn-sm btn-info mr-1"><i class="fas fa-eye"></i> Show</a>
//                         <a href="'.$editUrl.'" class="btn btn-sm btn-warning mr-1"><i class="fas fa-edit"></i> Edit</a>
//                         <form action="'.$deleteUrl.'" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Yakin ingin menghapus data ini?\')">
//                             '.csrf_field().method_field('DELETE').'
//                             <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
//                         </form>
//                     ';
//                 })
//                 ->rawColumns(['foto', 'action'])
//                 ->make(true);
//         }

//         return view('dosen.index');
//     }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nidn' =>'required|unique:tbl_dosen,nidn',
            'nama' =>'required',
            'email' =>'required|unique:tbl_dosen,email',
            'jurusan' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $foto = null;
        if($request->hasFile('foto')){
            $foto = $request->file('foto')->store('dosen', 'public');
        }

        Dosen::create([
             'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'jabatan' => $request->jabatan,
            'foto' => $foto,
        ]);
        return redirect()->route('dosen.index')->with('success','Data Dosen Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    //public function show(string $id)
    public function show(Dosen $dosen)
    {
            //$dosen = Dosen::findOrFail($id);
            return view('dosen.show', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
    'nidn' => 'required|unique:tbl_dosen,nidn,' . $dosen->id . ',id',
    'nama' => 'required',
    'email'=> 'required|unique:tbl_dosen,email,' . $dosen->id . ',id',
    'jurusan' => 'required',
    'jabatan' => 'required',
    'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);
        $foto = $dosen->foto;
        if($request->hasFile('foto')){
            $foto = $request->file('foto')->store('dosen','public');
        }
        $dosen->update([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'jabatan' => $request->jabatan,
            'foto' => $foto,
        ]);
        return redirect()->route('dosen.index')->with('success','Data berhasil diperbaharui');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        
        if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)) {
        Storage::disk('public')->delete($dosen->foto);
        }
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success','Data dosen berhasil dihapus');
    }
}

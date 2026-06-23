<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function show($namaProdi)
    {
        $prodi = Prodi::with(['dosen', 'kurikulum'])
            ->where('nama', $namaProdi)
            ->first();

        if (!$prodi) {
            return response()->json(['message' => 'Prodi tidak ditemukan'], 404);
        }

        // Atur kurikulum per semester
        $curriculumBySemester = [];
        foreach ($prodi->kurikulum as $k) {
            $curriculumBySemester[$k->semester][] = $k->course_name;
        }

        return response()->json([
            'prodi' => $prodi->nama,
            'lecturers' => $prodi->dosen,
            'curriculum' => $curriculumBySemester
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaSurat extends Model
{
    use HasFactory;

    protected $table = 'tbl_mahasiswa_surat';

    protected $fillable = [
        'surat_id',
        'nama_mahasiswa',
        'nim',
        'program_studi',
        'judul_penelitian',
    ];
}

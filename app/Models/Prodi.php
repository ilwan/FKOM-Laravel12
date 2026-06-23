<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    // Nama tabel sesuai database
    protected $table = 'tbl_prodi';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama', // nama program studi
        'created_at',
        'updated_at',
    ];

    // Relasi ke dosen
    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'prodi', 'nama'); 
        // 'prodi' di tabel dosen mengacu ke 'nama' di tbl_prodi
    }

    // Relasi ke kurikulum
    public function kurikulum()
    {
        return $this->hasMany(Kurikulum::class, 'prodi_id', 'id'); 
    }
}

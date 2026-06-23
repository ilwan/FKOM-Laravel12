<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengirim extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi plural
    protected $table = 'tbl_pengirim_surat'; 

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama_pengirim',
        'jabatan_pengirim',
        'penandatangan',
    ];

    /**
     * Relasi ke Surat
     * Satu pengirim bisa memverifikasi banyak surat
     */
    public function surat()
    {
        return $this->hasMany(Surat::class, 'id_pengirim');
    }
}

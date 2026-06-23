<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotulenRapat extends Model
{
    use HasFactory;

    protected $table = 'tbl_notulen_rapat';

    protected $fillable = [
        'judul',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'tempat',
        'pemimpin_rapat',
        'notulis',
        'agenda',
        'hasil_rapat',
        'tindak_lanjut',
        'peserta',
    ];

    protected $casts = [
        'peserta' => 'array',
    ];

    public function foto()
    {
        return $this->hasMany(NotulenFoto::class, 'notulen_id');
    }
}

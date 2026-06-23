<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
        use HasFactory;

    protected $table = 'tbl_surat';

    protected $fillable = [
        'kategori_surat_id',
        'pengirim_id',
        'penerima_id',
        'leading_number',
        'nomor_urut',
        'tanggal',
        'nomor_surat',
        'perihal',
        'file_url',
    ];

    protected $dates = ['tanggal'];
    protected $casts = [
    'tanggal' => 'datetime',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSurat::class, 'kategori_surat_id');
    }
    public function mahasiswa()
    {
    return $this->hasMany(MahasiswaSurat::class, 'surat_id');
    }
    public function penerima()
    {
    return $this->belongsTo(PenerimaSurat::class, 'penerima_id');
    }
    public function pengirim()
    {
    return $this->belongsTo(Pengirim::class, 'pengirim_id');
    }
}

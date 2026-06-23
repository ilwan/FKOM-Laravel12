<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSurat extends Model
{
    use HasFactory;

    protected $table = 'tbl_kategori_surat';

    protected $fillable = [
        'jenis_surat',
        'kode',
        'start_number',
        'latest_number',
        'latest_year',
    ];

    public function surat()
    {
        return $this->hasMany(Surat::class);
    }
}

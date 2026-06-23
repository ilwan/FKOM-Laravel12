<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaSurat extends Model
{
    use HasFactory;

    protected $table = 'tbl_penerima_surat';
    protected $fillable = ['nama_penerima', 'jabatan_penerima', 'instansi'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = "tbl_berita";
    protected $fillable=[
        'judul',
        'slug',
        'isi',
        'kategori',
        'penulis',
        'foto',
        'status',
    ];
    public $timestamps = true;
}

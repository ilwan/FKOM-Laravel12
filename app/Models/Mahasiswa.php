<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'tbl_mahasiswa';

   protected $fillable = [
    'nama',
    'nim',
    'program_studi',
    'angkatan',
    'email',
    'no_hp',
    'foto',
];

}

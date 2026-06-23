<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'tbl_project';

    protected $fillable = [
        'title',
        'student',
        'nim',
        'prodi',
        'category',
        'description',
        'image',
        'gallery',
        'tags',
        'link',
        'demo',
        'year'
    ];
}

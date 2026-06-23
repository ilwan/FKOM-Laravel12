<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
  protected $table = "tbl_slide";

    protected $fillable = [
        'image_path',     
        'alt_text',
        'title',
        'description',
        'is_active',
        'display_order',
    ];

    public $timestamps = true;
}

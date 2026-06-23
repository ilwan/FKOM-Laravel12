<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotulenFoto extends Model
{
        use HasFactory;

    protected $table = 'tbl_notulen_foto';

    protected $fillable = [
        'notulen_id',
        'foto_path',
        'keterangan',
    ];

    public function notulen()
    {
        return $this->belongsTo(NotulenRapat::class, 'notulen_id');
    }

    public function getFotoUrlAttribute()
    {
        return $this->foto_path ? url('storage/' . $this->foto_path) : null;
    }
}

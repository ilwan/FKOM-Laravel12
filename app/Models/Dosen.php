<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'tbl_dosen';

    // Matikan auto increment karena id kita generate sendiri
    public $incrementing = false;

    // Tipe primary key string karena angka 10 digit bisa terlalu besar untuk integer di PHP
    protected $keyType = 'string';

    protected $fillable = [
        'nidn',
        'nama',
        'email',
        'no_hp',
        'jabatan',
        'pendidikan_terakhir',
        'bidang_keahlian',
        'google_scholar_link',
        'sinta_link',
        'scopus_link',
        'foto_url',
        'status'
    ];
    // Generate id acak 10 digit sebelum model disimpan
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                do {
                    // Generate angka acak 10 digit
                    $randomId = mt_rand(1000000000, 9999999999);
                } while (self::where('id', $randomId)->exists());

                $model->id = (string) $randomId;
            }
        });
    }
}

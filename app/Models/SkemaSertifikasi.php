<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkemaSertifikasi extends Model
{
    use HasFactory;
    protected $table = 'skema_sertifikasis';
    protected $fillable = [
        'kode_skema',
        'nama_skema',
        'deskripsi',
    ];

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'skema_sertifikasi_id');
    }
}

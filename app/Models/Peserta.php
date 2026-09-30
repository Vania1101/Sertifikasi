<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'pesertas';
    protected $fillable = [
        'nama',
        'nisn',
        'jenis_kelamin',
        'email',
        'no_hp',
        'tanggal_lahir',
        'alamat',
        'skema_sertifikasi_id',
    ];

    public function skema()
    {
        return $this->belongsTo(
            SkemaSertifikasi::class,
            'skema_sertifikasi_id'
        );
    }
}

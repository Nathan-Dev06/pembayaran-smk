<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
<<<<<<< HEAD
        'bulan',
        'tahun',
        'nominal',
        'status',
=======
        'jenis_tagihan',
        'jumlah',
        'status',
        'tanggal',
>>>>>>> 26eb881691a1068e82aaade1ae7d22475a69507c
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}

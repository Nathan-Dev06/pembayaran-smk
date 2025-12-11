<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'jenis_tagihan',
        'jumlah',
        'status',
        'tanggal',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}

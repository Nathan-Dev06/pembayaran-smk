<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tagihan;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'user_id',
        'nama',
        'kelas',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tagihans()
    {
        return $this->hasMany(Tagihan::class);
    }
}

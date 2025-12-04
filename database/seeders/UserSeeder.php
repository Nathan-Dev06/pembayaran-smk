<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'nis_nip' => '111111',
            'name' => 'Admin Utama',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        // Siswa
        User::create([
            'nis_nip' => '222222',
            'name' => 'Siswa Contoh',
            'role' => 'siswa',
            'password' => Hash::make('siswa123'),
        ]);

        // Pemilik
        User::create([
            'nis_nip' => '333333',
            'name' => 'Pemilik Sekolah',
            'role' => 'pemilik',
            'password' => Hash::make('pemilik123'),
        ]);
    }
}

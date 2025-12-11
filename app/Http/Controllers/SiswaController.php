<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    // Tampilkan daftar siswa
    public function index()
    {
        $siswas = Siswa::with('user')->get();
        return view('admin.siswa.index', compact('siswas'));
    }

    // Form tambah siswa
    public function create()
    {
        return view('admin.siswa.create');
    }

    // Simpan data siswa
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas',
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'kelas' => 'required',
            'alamat' => 'nullable',
        ]);

        // Buat user baru dulu
        $user = User::create([
             'nis_nip' => $request->nis,   // ← tambahkan ini
              'name' => $request->nama,
              'email' => $request->email,
              'password' => Hash::make('password'),
              'role' => 'siswa'
]);


        // Buat data siswa
        Siswa::create([
            'nis' => $request->nis,
            'user_id' => $user->id,
            'nama' => $request->nama,
             'email' => $request->email,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    // Form edit
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    // Update data siswa
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'alamat' => 'nullable',
        ]);

        // Update user
        $siswa->user->update([
            'name' => $request->nama,
        ]);

        // Update siswa
        $siswa->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa diperbarui!');
    }

    // Hapus data siswa
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        // Hapus user otomatis karena foreign key cascade
        $siswa->user->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil dihapus!');
    }
}

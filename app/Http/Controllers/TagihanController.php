<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::with('siswa')->get();
        return view('admin.tagihan.index', compact('tagihans'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        return view('admin.tagihan.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'nominal' => 'required|numeric',
        ]);

        Tagihan::create([
            'siswa_id' => $request->siswa_id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
            'status' => 'belum_dibayar',
        ]);

        return redirect()->route('admin.tagihan.index')->with('success', 'Tagihan berhasil dibuat');
    }

    public function edit($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $siswas = Siswa::all();

        return view('admin.tagihan.edit', compact('tagihan', 'siswas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nominal' => 'required|numeric',
        ]);

        $tagihan = Tagihan::findOrFail($id);

        $tagihan->update([
            'nominal' => $request->nominal,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.tagihan.index')->with('success', 'Tagihan diperbarui');
    }

    public function destroy($id)
    {
        Tagihan::findOrFail($id)->delete();
        return back()->with('success', 'Tagihan dihapus');
    }
}

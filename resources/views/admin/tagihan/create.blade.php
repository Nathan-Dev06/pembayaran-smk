<h2>Tambah Tagihan</h2>

<form action="{{ route('admin.tagihan.store') }}" method="POST">
    @csrf

    <label>Pilih Siswa</label><br>
    <select name="siswa_id" required>
        <option value="">-- pilih siswa --</option>
        @foreach ($siswas as $siswa)
            <option value="{{ $siswa->id }}">{{ $siswa->nama }} ({{ $siswa->kelas }})</option>
        @endforeach
    </select>
    <br><br>

    <label>Bulan</label><br>
    <input type="text" name="bulan" placeholder="Januari" required><br><br>

    <label>Tahun</label><br>
    <input type="number" name="tahun" placeholder="2025" required><br><br>

    <label>Nominal</label><br>
    <input type="number" name="nominal" placeholder="500000" required><br><br>

    <button type="submit">Simpan</button>
</form>

<br>
<a href="{{ route('admin.tagihan.index') }}">⟵ Kembali</a>

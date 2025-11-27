<h2>Edit Tagihan</h2>

<form action="{{ route('admin.tagihan.update', $tagihan->id) }}" method="POST">
    @csrf

    <label>Siswa</label><br>
    <select name="siswa_id" disabled>
        @foreach ($siswas as $siswa)
            <option value="{{ $siswa->id }}" 
                    {{ $siswa->id == $tagihan->siswa_id ? 'selected' : '' }}>
                {{ $siswa->nama }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Bulan</label><br>
    <input type="text" value="{{ $tagihan->bulan }}" disabled><br><br>

    <label>Tahun</label><br>
    <input type="text" value="{{ $tagihan->tahun }}" disabled><br><br>

    <label>Nominal</label><br>
    <input type="number" name="nominal" value="{{ $tagihan->nominal }}" required><br><br>

    <label>Status</label><br>
    <select name="status" required>
        <option value="belum_dibayar" {{ $tagihan->status == 'belum_dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
        <option value="dibayar" {{ $tagihan->status == 'dibayar' ? 'selected' : '' }}>Dibayar</option>
    </select>
    <br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="{{ route('admin.tagihan.index') }}">⟵ Kembali</a>

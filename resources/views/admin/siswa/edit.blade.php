<h2>Edit Siswa</h2>

<form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST">
    @csrf

    <label>Nama</label>
    <input type="text" name="nama" value="{{ $siswa->nama }}" required><br>

    <label>Kelas</label>
    <input type="text" name="kelas" value="{{ $siswa->kelas }}" required><br>

    <label>Alamat</label>
    <textarea name="alamat">{{ $siswa->alamat }}</textarea><br>

    <button type="submit">Update</button>
</form>

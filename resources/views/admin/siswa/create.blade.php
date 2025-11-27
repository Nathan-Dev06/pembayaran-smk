<h2>Tambah Siswa</h2>

<form action="{{ route('admin.siswa.store') }}" method="POST">
    @csrf

    <label>NIS</label>
    <input type="text" name="nis" required><br>

    <label>Nama</label>
    <input type="text" name="nama" required><br>

    <label>Email</label>
    <input type="email" name="email" required><br>

    <label>Kelas</label>
    <input type="text" name="kelas" required><br>

    <label>Alamat</label>
    <textarea name="alamat"></textarea><br>

    <button type="submit">Simpan</button>
</form>

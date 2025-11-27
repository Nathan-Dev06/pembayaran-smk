<h2>Daftar Siswa</h2>

<a href="{{ route('admin.siswa.create') }}">Tambah Siswa</a>

<table border="1" cellpadding="10">
    <tr>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>

    @foreach ($siswas as $siswa)
    <tr>
        <td>{{ $siswa->nis }}</td>
        <td>{{ $siswa->nama }}</td>
        <td>{{ $siswa->kelas }}</td>
        <td>{{ $siswa->user->email }}</td>
        <td>
            <a href="{{ route('admin.siswa.edit', $siswa->id) }}">Edit</a>

            <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Hapus siswa?')" type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

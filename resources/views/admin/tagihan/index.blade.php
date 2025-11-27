<h2>Daftar Tagihan</h2>

<a href="{{ route('admin.tagihan.create') }}">+ Tambah Tagihan</a>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Nama Siswa</th>
        <th>Bulan</th>
        <th>Tahun</th>
        <th>Nominal</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @forelse ($tagihans as $t)
    <tr>
        <td>{{ $t->siswa->nama }}</td>
        <td>{{ $t->bulan }}</td>
        <td>{{ $t->tahun }}</td>
        <td>Rp {{ number_format($t->nominal, 0, ',', '.') }}</td>
        <td>{{ $t->status }}</td>
        <td>
            <a href="{{ route('admin.tagihan.edit', $t->id) }}">Edit</a>

            <form action="{{ route('admin.tagihan.destroy', $t->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Hapus tagihan?')" type="submit">Hapus</button>
            </form>
        </td>
    </tr>

    @empty
        <tr>
            <td colspan="6">Belum ada tagihan.</td>
        </tr>
    @endforelse

</table>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Dashboard Admin</h1>

    <p>Selamat datang, {{ auth()->user()->name }} (Admin)</p>

    <ul>
        <li><a href="{{ route('admin.siswa.index') }}">Kelola Siswa</a></li>
        <li><a href="{{ route('admin.tagihan.index') }}">Kelola Tagihan</a></li>
    </ul>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>

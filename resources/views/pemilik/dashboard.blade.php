<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Pemilik</title>
</head>
<body>

    <h1>Dashboard Pemilik</h1>
    <p>Selamat datang, {{ Auth::user()->name }}</p>

    <h3>Menu Pemilik</h3>
    <ul>
        <li><a href="#">Laporan Pembayaran (coming soon)</a></li>
        <li><a href="#">Manajemen Admin (coming soon)</a></li>

        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </li>
    </ul>

</body>
</html>

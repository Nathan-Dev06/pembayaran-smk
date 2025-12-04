<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #f7f7f7;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        a, button {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 18px;
            background: #4a5568;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
        button {
            border: none;
            cursor: pointer;
            background: #e53e3e;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Selamat Datang</h2>

    @auth
        <p>Hai, <b>{{ Auth::user()->name }}</b></p>

        {{-- 🔥 Redirect dashboard otomatis sesuai role --}}
        @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
        @elseif(Auth::user()->role === 'siswa')
            <a href="{{ route('siswa.dashboard') }}">Dashboard Siswa</a>
        @elseif(Auth::user()->role === 'pemilik')
            <a href="{{ route('pemilik.dashboard') }}">Dashboard Pemilik</a>
        @endif

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>

    @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endauth

</div>

</body>
</html>

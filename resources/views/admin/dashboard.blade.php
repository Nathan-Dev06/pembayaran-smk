<h2>Dashboard Admin</h2>

<p>Selamat datang, {{ Auth::user()->name }}</p>

<h3>Menu Admin</h3>

<ul>
    <li><a href="{{ route('admin.siswa.index') }}">📘 Data Siswa</a></li>
    <li><a href="{{ route('admin.tagihan.index') }}">💰 Data Tagihan</a></li>
    <li><a href="#">💳 Pembayaran (coming soon)</a></li>
    <li><a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        🚪 Logout
    </a></li>
</ul>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
</form>

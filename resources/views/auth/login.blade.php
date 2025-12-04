<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-purple-700 to-purple-500 flex items-center justify-center p-4">

<div class="bg-white w-full max-w-md rounded-3xl shadow-xl p-8 relative">

    {{-- Logo --}}
    <div class="absolute -top-16 left-1/2 -translate-x-1/2">
        <div class="bg-white p-4 rounded-full shadow-xl">
            <img src="/img/logo.png" class="w-20">
        </div>
    </div>

    <div class="mt-14 text-center">
        <h1 class="text-2xl font-bold text-gray-800">Selamat Datang</h1>
        <p class="text-gray-500 text-sm mt-1">Masuk ke akun Anda untuk melanjutkan</p>
    </div>

    {{-- ERROR --}}
    @if (session('error'))
    <div class="bg-red-500 text-white p-3 rounded-lg text-center mt-4">
        {{ session('error') }}
    </div>
@endif

    <form method="POST" action="{{ route('login.submit') }}" class="mt-6">
        @csrf

        {{-- Nomor Induk --}}
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Nomor Induk</label>
            <div class="flex items-center bg-gray-100 rounded-lg p-3">
                <svg width="20" height="20" fill="#555"><circle cx="10" cy="7" r="4"/></svg>
                <input type="text" name="nis_nip"
                       class="bg-transparent ml-3 w-full outline-none"
                       placeholder="Masukkan Nomor Induk" required>
            </div>
        </div>

        {{-- Password + toggle --}}
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Password</label>
            <div class="flex items-center bg-gray-100 rounded-lg p-3">
                <svg width="20" height="20" fill="#555"><path d="M10 1a4 4 0 00-4 4v3H4v9h12v-9h-2V5a4 4 0 00-4-4z"/></svg>

                <input type="password" id="password" name="password"
                       class="bg-transparent ml-3 w-full outline-none"
                       placeholder="Masukkan Password" required>

                <button type="button" onclick="togglePassword()">
                    👁️
                </button>
            </div>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
            Masuk
        </button>

    </form>
</div>

<script>
    function togglePassword() {
        const field = document.getElementById('password');
        field.type = field.type === "password" ? "text" : "password";
    }
</script>

</body>
</html>

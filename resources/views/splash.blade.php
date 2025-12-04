<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Splash Screen</title>
    <script>
        setTimeout(() => {
            window.location.href = "/login";
        }, 2500);
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center h-screen bg-gradient-to-br from-indigo-600 to-purple-600 text-white">

    <div class="flex flex-col items-center text-center animate-fadeIn">
        <img src="/img/logo.png" class="w-28 mb-5 opacity-90">

        <h1 class="text-2xl font-semibold">SMK PGRI Cikampek</h1>
        <p class="text-sm opacity-90 mt-1">Sistem Pembayaran Digital</p>

        <div class="w-40 bg-white/30 rounded-full h-2 mt-6 overflow-hidden">
            <div class="h-full bg-white animate-loadingBar"></div>
        </div>
    </div>

    <style>
        @keyframes loadingBar { from { width: 5%; } to { width: 100%; } }
        .animate-loadingBar { animation: loadingBar 2.3s linear forwards; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        .animate-fadeIn { animation: fadeIn 1s ease-out; }
    </style>

</body>
</html>

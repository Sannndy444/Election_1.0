<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Pending</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <body class="bg-gray-800 flex items-center justify-center min-h-screen">

        <div class="max-w-md w-full bg-gray-300 shadow-lg rounded-lg p-8">
            <div class="text-center">
                <!-- Icon or Image -->
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="p-3 bg-red-500 rounded-lg hover:bg-red-400">
                        <p class="font-semibold text-white">Log Out</p>
                    </button>
                </form>
                <h2 class="text-2xl font-semibold text-gray-800 mt-4">Akun Anda Sedang Menunggu Verifikasi</h2>
                <p class="text-sm text-gray-500 mt-2">Kami sedang memeriksa data Anda. Mohon tunggu konfirmasi dari admin.</p>

                <!-- Notification / Message -->
                <div class="mt-4">
                    <div class="alert alert-warning px-4 py-2 rounded-lg bg-yellow-50 border border-yellow-400 text-yellow-600">
                        <span class="font-medium">Pemberitahuan:</span>
                        <span>Proses verifikasi akun Anda bisa memakan waktu beberapa menit hingga beberapa jam.</span>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-8 text-center text-gray-600">
                <p class="text-sm">&copy; 2025 Soleh. Semua hak dilindungi.</p>
            </div>
        </div>
    </body>
</body>

</html>
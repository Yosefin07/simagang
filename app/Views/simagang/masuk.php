<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
</head>

<body class="min-h-screen flex flex-col md:flex-row font-[Roboto]">

    <!-- Gambar Samping -->
    <div class="hidden md:flex md:w-1/2">
        <img src="https://storage.googleapis.com/a1aa/image/01169bf7-0617-49f7-615b-7b8e1bb5882e.jpg"
            alt="Modern office building" class="object-cover w-full h-full" />
    </div>

    <!-- Form Login -->
    <div class="flex-1 flex items-center justify-center bg-blue-50">
        <div class="w-full max-w-xl p-8 bg-white/70 backdrop-blur rounded-xl shadow-md mx-4 md:mx-auto text-center">

            <!-- Judul -->
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-4">
                Sistem Informasi<br />
                Layanan Magang &<br />
                Rekruitmen Industri Mitra
            </h1>
            <hr class="border-gray-300 mb-6" />

            <!-- Flashdata Error -->
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <!-- Form -->
            <form action="/masuk/auth" method="post" class="text-left mt-4">
                <?= csrf_field() ?>

                <input type="text" id="username" name="username"
                    class="w-full mb-4 px-4 py-3 rounded-full bg-blue-100 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Username" required />

                <input type="password" id="password" name="password"
                    class="w-full mb-6 px-4 py-3 rounded-full bg-blue-100 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Password" required />

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white text-lg font-semibold rounded-full py-3 transition-all duration-200">
                    Log In
                </button>
            </form>

            <!-- Link Registrasi -->
            <p class="text-sm text-gray-600 mt-5">
                Belum punya akun?
                <a href="/registrasi" class="text-blue-600 hover:underline">Daftar</a>
            </p>
        </div>
    </div>

</body>

</html>
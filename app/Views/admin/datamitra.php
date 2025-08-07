<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>ADMIN - Admin</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#000000ff',
                        secondary: '#f3f4f6'
                    }
                }
            }
        }
    </script>

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        .submenu {
            background-color: #2c3035;
            padding-left: 10px;
            border-left: 3px solid #495057;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .submenu a {
            font-size: 14px;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
    <nav class="flex items-center justify-between px-6 py-4 bg-gray-900 text-white shadow">
        <div class="text-xl font-bold">ADMIN</div>
        <div class="flex items-center space-x-4">
            <input type="text" placeholder="Search..."
                class="px-3 py-1 rounded bg-white text-black focus:outline-none focus:ring focus:ring-blue-400">
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded"><i
                    class="fas fa-search"></i></button>
            <div class="relative">
                <button id="userMenuButton" class="focus:outline-none">
                    <i class="fas fa-user fa-fw"></i>
                </button>
                <div id="logoutMenu" class="absolute right-0 mt-2 w-40 bg-white shadow-md rounded hidden">
                    <a class="block px-4 py-2 hover:bg-gray-200 text-black" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <script>
        const button = document.getElementById('userMenuButton');
        const menu = document.getElementById('logoutMenu');
        button.addEventListener('click', () => menu.classList.toggle('hidden'));
        window.addEventListener('click', function(e) {
            if (!button.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white h-screen p-4">
            <h2 class="font-semibold mb-4 uppercase tracking-wide">Menu</h2>
            <nav class="space-y-2">
                <!-- Data Mahasiswa -->
                <div>
                    <a href="<?= site_url('datamahasiswa') ?>"
                        class="flex items-center p-2 rounded hover:bg-gray-700">
                        <i class="fas fa-user-graduate mr-2"></i> Data Mahasiswa
                    </a>
                    <div class="submenu space-y-1">
                        <a href="<?= site_url('validasiview') ?>"
                            class="flex items-center p-2 rounded hover:bg-gray-700">
                            <i class="fas fa-chart-line mr-2"></i> Tracker Study
                        </a>
                        <a href="<?= site_url('home') ?>" class="flex items-center p-2 rounded hover:bg-gray-700">
                            <i class="fas fa-users mr-2"></i> Mahasiswa Yang Mendaftar
                        </a>
                    </div>
                </div>

                <!-- Data Mitra -->
                <div>
                    <a href="#" class="flex items-center p-2 rounded hover:bg-gray-700">
                        <i class="fas fa-building mr-2"></i> Data Mitra
                    </a>
                    <div class="submenu space-y-1">
                        <a href="<?= site_url('datamitra') ?>" class="flex items-center p-2 rounded hover:bg-gray-700">
                            <i class="fas fa-clipboard-check mr-2"></i> Mitra Yang Mendaftar
                        </a>
                    </div>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-auto">
            <div class="container mx-auto">
                <h1 class="text-2xl font-semibold mb-4">Validasi Pendaftaran Mitra</h1>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 text-sm text-left">
                        <thead class="bg-gray-200 text-gray-700 uppercase">
                            <tr>
                                <th class="px-4 py-2 border">No</th>
                                <th class="px-4 py-2 border">Nama</th>
                                <th class="px-4 py-2 border">Deskripsi</th>
                                <th class="px-4 py-2 border">Posisi</th>
                                <th class="px-4 py-2 border">Status</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($mitra)): ?>
                                <?php $no = 1;
                                foreach ($mitra as $row): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border"><?= $no++ ?></td>
                                        <td class="px-4 py-2 border"><?= esc($row['nama']) ?></td>
                                        <td class="px-4 py-2 border"><?= esc($row['deskripsi']) ?></td>
                                        <td class="px-4 py-2 border"><?= esc($row['posisi']) ?></td>
                                        <td class="px-4 py-2 border">
                                            <?php if (isset($row['status_acc']) && $row['status_acc'] === 'Sudah Diacc'): ?>
                                                <span class="text-green-600 font-semibold">Sudah Diacc</span>
                                            <?php else: ?>
                                                <span class="text-red-600 font-semibold">Belum Diacc</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-4 py-2 border">
                                            <div class="flex gap-2">
                                                <a href="<?= site_url('validasi/delete/' . $row['id']) ?>"
                                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                    Hapus
                                                </a>
                                                <?php if (!isset($row['status_acc']) || $row['status_acc'] !== 'Sudah Diacc'): ?>
                                                    <a href="<?= site_url('validasi/acc/' . $row['id']) ?>"
                                                        class="px-3 py-1 bg-yellow-400 text-black rounded hover:bg-yellow-500"
                                                        onclick="return confirm('Apakah Anda yakin ingin ACC?');">
                                                        ACC
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center py-4">Tidak ada data mitra yang tersedia.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Halaman Mahasiswa yang Melamar" />
    <meta name="author" content="Sistem Magang" />
    <title>MITRA - Mahasiswa Melamar</title>

    <!-- Bootstrap & SB Admin -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('css/mitra.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('css/dashmitra.css') ?>" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        body {
            background: #f8fafc;
        }

        .header {
            background: linear-gradient(to right, #a0abbbff, #9499a5ff);
            color: white;
            padding: 40px 20px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .header h2 {
            font-size: 28px;
            font-weight: 600;
        }

        .card-table {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .table thead {
            background-color: #9a9399ff;
            color: white;
        }

        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #6b7280;
            margin-top: 40px;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <!-- NAVBAR -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="#">MITRA</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        <div class="d-flex ms-auto me-3">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown">
                <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item text-dark" href="<?= site_url('/logout') ?>">Logout</a></li>
            </ul>
        </li>
    </ul>
</div>

            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <!-- SIDEBAR -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="<?= base_url('mitra') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Dashboard Mitra
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="<?= site_url('formulir-mitra') ?>">Daftar Mitra Sekarang</a>
                        <a class="nav-link" href="<?= site_url('validasiformulir') ?>">Status Pendaftaran</a>
                        <a class="nav-link active" href="<?= site_url('mitra/mahasiswa-melamar') ?>">Mahasiswa Yang Melamar</a>
                        <a class="nav-link" href="<?= site_url('validasiview') ?>">Tracker Study</a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- MAIN CONTENT -->
        <div id="layoutSidenav_content">
            <main class="container mt-4">
                <div class="header">
                    <h2>📋 Daftar Mahasiswa yang Melamar</h2>
                    <p class="mt-2">Lihat data mahasiswa yang melamar posisi di perusahaan Anda.</p>
                </div>

                <div class="card-table p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>TTL</th>
                                    <th>Alamat</th>
                                    <th>NIM</th>
                                    <th>Jurusan</th>
                                    <th>Posisi</th>
                                    <th>Mitra</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($daftarmahasiswa as $mhs): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= esc($mhs->nama) ?></td>
                                        <td><?= esc($mhs->tempat_tanggal_lahir) ?></td>
                                        <td><?= esc($mhs->alamat) ?></td>
                                        <td><?= esc($mhs->nim) ?></td>
                                        <td><?= esc($mhs->jurusan) ?></td>
                                        <td><?= esc($mhs->posisi) ?></td>
                                        <td><?= esc($mhs->mitra) ?></td>
                                        <td>
                                            <?php if ($mhs->status_acc === 'Sudah Diacc'): ?>
                                                <span class="badge bg-success"><?= esc($mhs->status_acc) ?></span>
                                            <?php else: ?>
                                                <span class="badge bg-warning text-dark"><?= esc($mhs->status_acc) ?></span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3 text-end">
                        <a href="<?= base_url('/mitra') ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                        </a>
                    </div>
                </div>

                <div class="footer">
                    <p>&copy; 2025 Dashboard Mitra | Dibuat oleh Tim Developer</p>
                </div>
            </main>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('js/scripts.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>
    <script>
        // Optional: DataTables agar tabel lebih interaktif
        document.addEventListener('DOMContentLoaded', () => {
            const table = document.querySelector('table');
            if (table) new simpleDatatables.DataTable(table);
        });
    </script>
</body>

</html>
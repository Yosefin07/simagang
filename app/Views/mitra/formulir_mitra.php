<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulir Mitra</title>

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
            background: linear-gradient(to right, #828a85ff, #99969bff);
            color: white;
            padding: 40px 20px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .header .form-title {
            font-size: 28px;
            font-weight: 600;
        }

        .card-form {
            background-color: #fff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .btn-submit {
            background: linear-gradient(to right, #b4c4baff, #c5cdc8ff);
            color: white;
            font-weight: 600;
            border: none;
            transition: 0.3s ease;
        }

        .btn-submit:hover {
            background: linear-gradient(to right, #a0abbbff, #84868dff);
            color: white;
        }

        .back-dashboard-btn {
            background-color: #ffffff;
            color: #212529;
            border: 1px solid #ccc;
            transition: all 0.3s ease;
        }

        .back-dashboard-btn:hover {
            background-color: #adb1b4ff;
            color: #000;
        }

        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #595b60ff;
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
                        <a class="nav-link active" href="<?= site_url('formulir-mitra') ?>">Daftar Mitra Sekarang</a>
                        <a class="nav-link" href="<?= site_url('validasiformulir') ?>">Status Pendaftaran</a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Daftar Pelamar
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= site_url('mitra/mahasiswa-melamar') ?>">Mahasiswa Yang Melamar</a>
                                <a class="nav-link" href="<?= site_url('validasiview') ?>">Tracker Study</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <!-- MAIN CONTENT -->
        <div id="layoutSidenav_content">
            <main class="container mt-4">
                <div class="header">
                    <div class="form-title">Formulir Pendaftaran Mitra</div>
                    <p class="mt-2">Isi formulir di bawah untuk mendaftarkan perusahaan Anda sebagai mitra industri.</p>
                </div>

                <div class="col-lg-8 mx-auto">
                    <div class="card-form">
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success d-flex justify-content-between align-items-center">
                                <span><?= session()->getFlashdata('success') ?></span>
                                <a href="<?= site_url('mitra') ?>" class="btn btn-sm back-dashboard-btn">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard
                                </a>
                            </div>
                        <?php endif; ?>

                        <form action="<?= site_url('formulir-mitra/simpan') ?>" method="post">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Mitra</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama perusahaan" required>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi Mitra</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsikan perusahaan Anda" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="posisi" class="form-label">Posisi yang Tersedia</label>
                                <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Contoh: Web Developer, Marketing, dsb." required>
                            </div>

                            <button type="submit" class="btn btn-submit w-100">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Formulir
                            </button>
                        </form>
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
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard Mitra</title>

    <!-- Bootstrap & SB Admin -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('css/mitra.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('css/dashmitra.css') ?>" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        body {
            background: #ebedf0ff;
        }

        .header {
            background: linear-gradient(to right, #7e767cff, #988b96ff);
            color: white;
            padding: 40px 20px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .header .welcome-text {
            font-size: 28px;
            font-weight: 600;
            color: #f8f6f8ff;
        }

        .feature-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }

        .feature-card h4 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #6b7280;
            margin-top: 40px;
        }

        /* Navbar dropdown style */
        .nav-link.dropdown-toggle i.fas.fa-user.fa-fw {
            color: #fff;
        }

        .dropdown-menu {
            background-color: #212529 !important;
            border: none;
        }

        .dropdown-menu .dropdown-item {
            color: #fff;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #343a40;
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
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search..." aria-label="Search..." />
                <button class="btn btn-success" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item text-dark" href="<?= site_url('/logout') ?>">Logout</a></li>
                </ul>
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
                    <div class="welcome-text">Selamat Datang di Dashboard Mitra! 🧑‍💼</div>
                    <p class="mt-2">Kelola pendaftaran mitra, pantau pelamar, dan verifikasi status dengan mudah.</p>
                </div>

                <h2 class="mb-4 text-center">✨ Fitur Utama</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="feature-card">
                            <h4>📄 Pendaftaran Mitra</h4>
                            <p>Daftarkan perusahaan Anda sebagai mitra industri dengan cepat dan mudah.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card">
                            <h4>📊 Statistik Pelamar</h4>
                            <p>Lihat statistik jumlah pelamar harian, mingguan, atau bulanan.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card">
                            <h4>✅ Verifikasi & Validasi</h4>
                            <p>Verifikasi pelamar dan kelola status mahasiswa yang melamar di perusahaan Anda.</p>
                        </div>
                    </div>
                </div>

                <div class="section bg-light p-4 rounded mt-5">
                    <h2 class="text-center">Kenapa Menjadi Mitra?</h2>
                    <p class="lead mx-auto text-center" style="max-width: 700px;">
                        Dengan menjadi mitra, Anda dapat menjaring talenta muda terbaik dari seluruh penjuru negeri.
                        Sistem ini memudahkan pengelolaan, penerimaan, dan pemantauan pelamar secara online.
                    </p>
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
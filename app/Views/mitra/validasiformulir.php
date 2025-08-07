<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>MITRA - Validasi Formulir</title>

    <!-- Bootstrap & Custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('css/mitra.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('css/dashmitra.css') ?>" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        /* Supaya navbar sama seperti halaman mitra */
        .nav-link.dropdown-toggle {
            background: transparent !important;
            padding: 0 8px;
            border-radius: 0;
        }

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

        .nav-link.dropdown-toggle:focus {
            box-shadow: none;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <!-- Navbar -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="<?= site_url('mitra') ?>">MITRA</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." />
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item text-dark" href="<?= site_url('/logout') ?>">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Layout -->
    <div id="layoutSidenav">
        <!-- Sidebar -->
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
                            <nav class="sb-sidenav-menu-nested nav accordion">
                                <a class="nav-link" href="<?= site_url('mitra/mahasiswa-melamar') ?>">Mahasiswa Yang Melamar</a>
                                <a class="nav-link" href="<?= site_url('validasiview') ?>">Tracker Study</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div id="layoutSidenav_content">
            <main class="container-fluid px-4">
                <h1 class="mt-4">Status Pendaftaran Mitra</h1>
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Data Mitra</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-center">
                                <thead class="table-primary">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mitra</th>
                                        <th>Deskripsi Mitra</th>
                                        <th>Posisi yang Tersedia</th>
                                        <th>Status ACC</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php $no = 1;
foreach ($mitra as $row): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= esc($row['nama']) ?></td>
        <td><?= esc($row['deskripsi']) ?></td>
        <td><?= esc($row['posisi']) ?></td>
        <td>
            <?php if ($row['status_acc'] == 1): ?>
                <span class="badge bg-success">Sudah Diacc</span>
            <?php else: ?>
                <span class="badge bg-warning text-dark">Belum Diacc</span>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('js/scripts.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/demo/chart-area-demo.js') ?>"></script>
    <script src="<?= base_url('assets/demo/chart-bar-demo.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('js/datatables-simple-demo.js') ?>"></script>
</body>

</html>
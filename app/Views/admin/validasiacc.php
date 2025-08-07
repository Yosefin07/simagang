<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Validasi Mitra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MITRA - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('css/mitra.css') ?>" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.html">MITRA</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." />
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="<?= site_url('formulir-mitra') ?>">Daftar Mitra Sekarang</a>
                        <a class="nav-link" href="<?= site_url('validasi') ?>">Status Pendaftaran</a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Daftar Pelamar
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages">
                            <nav class="sb-sidenav-menu-nested nav accordion">
                                <a class="nav-link" href="<?= site_url('daftarmahasiswa') ?>">Mahasiswa yang melamar</a>
                                <a class="nav-link" href="<?= site_url('daftarmahasiswa') ?>">Tracker Study</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            </main>

            <body>
                <div class="container mt-5">
                    <h1>Validasi Pendaftaran Mitra</h1>
                    <table class="table table-bordered table-striped mt-4">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Posisi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <?php if (!empty($mitra)): ?>
                            <?php $no = 1;
                            foreach ($mitra as $row): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($row['nama']) ?></td>
                                    <td><?= esc($row['deskripsi']) ?></td>
                                    <td><?= esc($row['posisi']) ?></td>
                                    <td>
                                        <?php if (isset($row['status_acc']) && $row['status_acc'] === 'Sudah Diacc'): ?>
                                            <span class="badge bg-success">Sudah Diacc</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Belum Diacc</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('validasi/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                                        <?php if (!isset($row['status_acc']) || $row['status_acc'] !== 'Sudah Diacc'): ?>
                                            <a href="<?= site_url('validasi/acc/' . $row['id']) ?>" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda yakin ingin ACC?');">ACC</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data mitra yang tersedia.</td>
                            </tr>
                        <?php endif; ?>

                    </table>
                </div>
            </body>

</html>
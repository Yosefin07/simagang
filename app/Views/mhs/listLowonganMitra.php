<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>ADMIN - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/mahasiswa.css" rel="stylesheet" />
    <link href="css/dashmitra.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        .custom-card {
            border: 1px solid #dee2e6;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .custom-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 18px rgba(0, 123, 255, 0.2);
        }

        .scroll-container {
            max-height: 600px;
            overflow-y: auto;
            padding-right: 10px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #0d6efd;
        }

        .card-text {
            font-size: 0.95rem;
            color: #343a40;
        }

        .card-body i {
            color: #6c757d;
            margin-right: 6px;
        }

        .lihat-detail {
            text-decoration: none;
            font-size: 0.85rem;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <!-- NAVBAR DAN SIDEBAR TIDAK DIUBAH -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.html">MAHASISWA</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." />
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <!-- SIDEBAR TETAP -->
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.html"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Dashboard</a>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a href="/daftarmahasiswa/create" class="nav-link btn btn-dark"><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>Pendaftaran Magang</a>
                        <a class="nav-link" href="<?= site_url('daftarmahasiswa') ?>">Status Pendaftaran</a>
                        <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>Program
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= site_url('validasiformulir') ?>">List Lowongan Mitra</a>
                                <a class="nav-link" href="<?= site_url('trackerstudy') ?>">Tracker Study</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main class="container-fluid px-4">
                <h1 class="mt-4">Status Pendaftaran Mitra</h1>
                <div class="card mt-4">
                    <div class="card-header"><h4>Data Mitra</h4></div>
                    <div class="card-body">
                        <div class="scroll-container row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            <?php foreach ($mitra as $index => $row): ?>
                                <div class="col">
                                    <div class="card h-100 custom-card p-3">
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <div>
                                                <h5 class="card-title"><i class="fas fa-building"></i> <?= esc($row['nama']) ?></h5>
                                                <p class="card-text"><i class="fas fa-align-left"></i><strong>Deskripsi:</strong><br><?= esc($row['deskripsi']) ?></p>
                                                <p class="card-text"><i class="fas fa-briefcase"></i><strong>Lowongan:</strong><br><?= esc($row['posisi']) ?></p>
                                            </div>
                                            <div class="mt-3 text-end">
                                                <button class="btn btn-sm btn-outline-primary lihat-detail" data-bs-toggle="modal" data-bs-target="#modalDetail<?= $index ?>">
                                                    <i class="fas fa-eye"></i> Lihat Detail
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- MODAL DETAIL -->
                                <div class="modal fade" id="modalDetail<?= $index ?>" tabindex="-1" aria-labelledby="modalLabel<?= $index ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title" id="modalLabel<?= $index ?>">Detail Mitra: <?= esc($row['nama']) ?></h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Nama Mitra:</strong> <?= esc($row['nama']) ?></p>
                                                <p><strong>Deskripsi Mitra:</strong><br><?= esc($row['deskripsi']) ?></p>
                                                <p><strong>Lowongan Tersedia:</strong><br><?= esc($row['posisi']) ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('js/scripts.js') ?>"></script>
</body>

</html>

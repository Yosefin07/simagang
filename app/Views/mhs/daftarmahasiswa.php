<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MAHASISWA - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/mahasiswa.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>


</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">MAHASISWA</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a href="/daftarmahasiswa/create" class="nav-link btn btn-dark">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Pendaftaran Magang
                        </a>
                        <div class="nav">
                            <a class="nav-link" href="<?= site_url('daftarmahasiswa') ?>">Status Pendaftaran</a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            </div>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Program
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="listLowonganMitra">List Lowongan Mitra</a>
                                    </nav>
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('trackerstudy') ?>">Tracker Study</a>
                                    </nav>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <!-- code -->

                <div class="container mt-5">
                    <div class="container-box">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>Data Magang Mahasiswa</h4>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-primary text-center">
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
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php foreach ($daftarmahasiswa as $key => $row) { ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td><?= $row->nama; ?></td>
                                            <td><?= $row->tempat_tanggal_lahir; ?></td>
                                            <td><?= $row->alamat; ?></td>
                                            <td><?= $row->nim; ?></td>
                                            <td><?= $row->jurusan; ?></td>
                                            <td><?= $row->posisi; ?></td>
                                            <td><?= $row->mitra; ?></td>

                                            <td class="text-center fw-semibold <?= ($row->status_acc === 'Sudah Diacc') ? 'text-success' : 'text-warning'; ?>">
                                            <?= esc($row->status_acc ?? 'Belum Diacc') ?>
                                            </td>
                                            <?= esc($row->status_acc ?? 'Belum Diacc') ?>
                                            </td>
                                            <td>
                                                <form action="/daftarmahasiswa/delete/<?= $row->id; ?>" method="post">
                                                    <a href="/daftarmahasiswa/edit/<?= $row->id; ?>" class="btn btn-warning">Edit</a>
                                                    <?= csrf_field(); ?>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>

                                                <?php if ($row->status_acc !== 'Sudah Diacc'): ?>
                                                    <a href="<?= base_url('daftarmahasiswa/acc/' . $row->id) ?>" class=""></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
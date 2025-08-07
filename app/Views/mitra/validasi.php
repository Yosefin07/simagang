<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>MITRA - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('css/mitra.css') ?>" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.html">ADMIN</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
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
                    <li><hr class="dropdown-divider" /></li>
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
                        <a class="nav-link" href="<?= site_url('validasi') ?>">Status pendaftaran</a>
                        <a class="nav-link" href="<?= site_url('formulir-mitra') ?>">Daftar Mitra Sekarang</a>
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
            <main>
                <div class="container mt-5">
                    <h1> Mitra Yang Mendaftar </h1>

                    <table class="table table-bordered table-striped table-hover align-middle mt-4">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Posisi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($mitra)): ?>
                                <?php $no = 1; foreach ($mitra as $row): ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= esc($row['nama']) ?></td>
                                        <td><?= esc($row['deskripsi']) ?></td>
                                        <td><?= esc($row['posisi']) ?></td>
                                        <td class="text-center">
                                            <?php if (!empty($row['status_acc']) && $row['status_acc'] == 1): ?>
                                                <span class="badge bg-success px-3 py-2">Sudah Diacc</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger px-3 py-2">Belum Diacc</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <button type="button"
                                                    class="btn btn-info btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#detailModal"
                                                    data-nama="<?= esc($row['nama']) ?>"
                                                    data-deskripsi="<?= esc($row['deskripsi']) ?>"
                                                    data-posisi="<?= esc($row['posisi']) ?>">
                                                    <i class="fas fa-eye"></i>
                                                </button>

                                                <a href="<?= site_url('validasi/delete/' . $row['id']) ?>" 
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                                   title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
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

                    <!-- Modal -->
                    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="detailModalLabel">Detail Mitra</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Nama:</strong> <span id="detailNama"></span></p>
                                    <p><strong>Deskripsi:</strong> <span id="detailDeskripsi"></span></p>
                                    <p><strong>Posisi:</strong> <span id="detailPosisi"></span></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <!-- JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const detailModal = document.getElementById('detailModal');
            detailModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                document.getElementById('detailNama').textContent = button.getAttribute('data-nama');
                document.getElementById('detailDeskripsi').textContent = button.getAttribute('data-deskripsi');
                document.getElementById('detailPosisi').textContent = button.getAttribute('data-posisi');
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

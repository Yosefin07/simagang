<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MITRA - Admin</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

    <style>
        body {
            background: linear-gradient(to right, #e0f2fe, #fce7f3);
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            height: 100vh;
            background-color: #1f2937;
        }

        .sidebar .nav-link {
            color: #e5e7eb;
            font-size: 15px;
        }

        .sidebar .nav-link:hover {
            background-color: #374151;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-radius: 1rem 1rem 0 0;
        }

        .btn-warning {
            background-color: #facc15;
            border: none;
        }

        .btn-warning:hover {
            background-color: #eab308;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">ADMIN</a>
            <ul class="navbar-nav ms-auto">
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
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar p-3">
                <h6 class="text-white text-uppercase">Menu</h6>
                <ul class="nav flex-column mt-2">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('validasiview') ?>">
                            <i class="fas fa-chart-line me-2"></i> Tracker Study
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('home') ?>">
                            <i class="fas fa-users me-2"></i> Mahasiswa Mendaftar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('datamitra') ?>">
                            <i class="fas fa-building me-2"></i> Mitra Mendaftar
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 p-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">📄 Data Mitra</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-center">
                                <thead class="table-primary text-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Bulan</th>
                                        <th>Skill</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tracker as $row): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= esc($row['nama']) ?></td>
                                            <td><?= esc($row['bulan']) ?></td>
                                            <td><?= esc($row['skill']) ?></td>
                                            <td>
                                                <button
                                                    class="btn btn-warning btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#detailModal"
                                                    data-nama="<?= esc($row['nama']) ?>"
                                                    data-bulan="<?= esc($row['bulan']) ?>"
                                                    data-skill="<?= esc($row['skill']) ?>">
                                                    <i class="fas fa-eye"></i>
                                                </button>
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

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-3">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Mitra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama:</strong> <span id="modalNama"></span></p>
                    <p><strong>Bulan:</strong> <span id="modalBulan"></span></p>
                    <p><strong>Skill:</strong> <span id="modalSkill"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Modal Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var detailModal = document.getElementById('detailModal');
            detailModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                document.getElementById('modalNama').textContent = button.getAttribute('data-nama');
                document.getElementById('modalBulan').textContent = button.getAttribute('data-bulan');
                document.getElementById('modalSkill').textContent = button.getAttribute('data-skill');
            });
        });
    </script>
</body>

</html>

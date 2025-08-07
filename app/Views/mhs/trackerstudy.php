<!-- app/Views/simagang/trackerstudy.php -->
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>MAHASISWA - Tracker Study</title>

  <!-- Bootstrap & SB Admin -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('css/mahasiswa.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('css/dashmitra.css') ?>" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

  <style>
    body {
      background: linear-gradient(to right, #dbeafe, #fce7f3);
      min-height: 100vh;
    }

    .card-form {
      background-color: #ffffffcc;
      backdrop-filter: blur(10px);
      border-radius: 16px;
      padding: 2rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body class="sb-nav-fixed">

  <!-- Navbar -->
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="#">MAHASISWA</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
      <i class="fas fa-bars"></i>
    </button>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search..." />
        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
      </div>
    </form>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" data-bs-toggle="dropdown">
          <i class="fas fa-user fa-fw"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="/logout">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>

  <div id="layoutSidenav">
    <!-- Sidebar -->
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <a class="nav-link" href="#">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Menu</div>
            <a href="/daftarmahasiswa/create" class="nav-link btn btn-dark">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Pendaftaran Magang
            </a>
            <a class="nav-link" href="<?= site_url('daftarmahasiswa') ?>">Status Pendaftaran</a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages">
              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
              Program
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?= site_url('listLowonganMitra') ?>">List Lowongan Mitra</a>
                <a class="nav-link" href="<?= site_url('trackerstudy') ?>">Tracker Study</a>
              </nav>
            </div>
          </div>
        </div>
      </nav>
    </div>

    <!-- Main Content -->
    <div id="layoutSidenav_content">
      <main>
        <div class="container mt-5">
          <div class="col-lg-8 mx-auto card-form">
            <h3 class="mb-4 text-center">📝 Laporan Bulanan Magang</h3>
            <form action="<?= site_url('trackerstudy/store') ?>" method="post">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
              </div>
              <div class="mb-3">
                <label for="bulan" class="form-label">Tanggal Laporan</label>
                <input type="date" class="form-control" id="bulan" name="bulan" required>
              </div>
              <div class="mb-3">
                <label for="skill" class="form-label">Skill yang Dikembangkan</label>
                <textarea class="form-control" id="skill" name="skill" rows="3" placeholder="Max 1000 kata" required></textarea>
              </div>
              <button type="submit" class="btn btn-dark rounded-pill w-100">Simpan Laporan</button>
            </form>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('js/scripts.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>
</body>

</html>

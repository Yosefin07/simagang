<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Dashboard Mahasiswa</title>

  <!-- Bootstrap & SB Admin -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('css/mahasiswa.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('css/dashmitra.css') ?>" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

  <style>
    body {
      background: #f8fafc;
    }
    .header {
      background: linear-gradient(to right, #e0e4e9ff, #6366f1);
      color: white;
      padding: 40px 20px;
      text-align: center;
      border-radius: 10px;
      margin-bottom: 30px;
    }
    .header .welcome-text {
      font-size: 28px;
      font-weight: 600;
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
  </style>
</head>

<body class="sb-nav-fixed">

  <!-- NAVBAR -->
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="#">MAHASISWA</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
      <i class="fas fa-bars"></i>
    </button>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." />
        <button class="btn btn-primary" type="button">
          <i class="fas fa-search"></i>
        </button>
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
    <!-- SIDEBAR -->
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <a class="nav-link" href="#">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Menu</div>
            <a href="/daftarmahasiswa/create" class="nav-link">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Pendaftaran Magang
            </a>
            <a class="nav-link" href="<?= site_url('daftarmahasiswa') ?>">
              <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
              Status Pendaftaran
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages">
              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
              Program
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?= site_url('listLowonganMitra') ?>">List Lowongan Mitra</a>
                <a class="nav-link" href="<?= site_url('trackerstudy') ?>">Tracker Study</a>
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
          <div class="welcome-text">Selamat Datang di Dashboard Mahasiswa! 🎓</div>
          <p class="mt-2">Kelola pendaftaran magang, pantau status, dan isi laporan magang dengan mudah.</p>
        </div>

        <h2 class="mb-4 text-center">✨ Fitur Utama</h2>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="feature-card">
              <h4>📄 Status Pendaftaran</h4>
              <p>Cek apakah pengajuan magang Anda sedang diproses, disetujui, atau perlu revisi.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="feature-card">
              <h4>📊 Pendaftaran Magang</h4>
              <p>Isi formulir pendaftaran magang dan pastikan semua data Anda lengkap & benar.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="feature-card">
              <h4>✅ Tracker Study</h4>
              <p>Lakukan pelaporan bulanan magang secara online untuk dokumentasi & evaluasi.</p>
            </div>
          </div>
        </div>

        <div class="section bg-light p-4 rounded mt-5">
          <h2 class="text-center">👩‍🎓 Kenapa Harus Magang Industri?</h2>
          <p class="lead mx-auto text-center" style="max-width: 700px;">
            Magang industri membantu Anda mengembangkan keterampilan nyata di dunia kerja.
            Sistem ini mendukung pengajuan lamaran, pelaporan kegiatan, dan pemantauan status
            magang secara online dengan mudah dan efisien.
          </p>
        </div>

        <div class="footer">
          <p>&copy; 2025 Dashboard Mahasiswa | Dibuat oleh Tim Developer</p>
        </div>
      </main>
    </div>
  </div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

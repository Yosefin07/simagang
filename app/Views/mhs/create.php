<!-- Pastikan variabel $mitraAcc berisi mitra yang status_acc = 1 -->
<!-- Contoh di controller: $mitraAcc = $db->table('mitra')->where('status_acc', 1)->get()->getResultArray(); -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Form Mahasiswa - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet">
  <link href="<?= base_url('css/mahasiswa.css') ?>" rel="stylesheet">
  <link href="<?= base_url('css/dashmitra.css') ?>" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <style>
    body {
      background: linear-gradient(to right, #dbeafe, #fce7f3);
    }
  </style>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand ps-3" href="index.html">MAHASISWA</a>
    <!-- Ini bagian Logout yang akan terletak di pojok kanan -->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user fa-fw"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><hr class="dropdown-divider" /></li>
          <li><a class="dropdown-item" href="/logout">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
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
            <a href="/daftarmahasiswa/create" class="nav-link btn btn-dark">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Pendaftaran Magang
            </a>
            <a class="nav-link" href="<?= site_url('daftarmahasiswa') ?>">Status Pendaftaran</a>
          </div>
        </div>
      </nav>
    </div>

    <div id="layoutSidenav_content">
      <main>
        <div class="container py-5">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center rounded-top-4">
                  <h4 class="mb-0">Form Mahasiswa</h4>
                </div>
                <div class="card-body p-4">
                  <form action="/daftarmahasiswa/store" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                      <label for="ttl" class="form-label">Tempat Tanggal Lahir</label>
                      <input type="text" class="form-control" id="ttl" name="tempat_tanggal_lahir" required>
                    </div>
                    <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="mb-3">
                      <label for="nim" class="form-label">NIM</label>
                      <input type="text" class="form-control" id="nim" name="nim" required>
                    </div>
                    <div class="mb-3">
                      <label for="jurusan" class="form-label">Jurusan</label>
                      <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                    </div>
                    <div class="mb-3">
                      <label for="mitra" class="form-label">Mitra yang Anda Pilih</label>
                      <select class="form-select" id="mitra" name="mitra" required>
                        <option value="">-- Pilih Mitra --</option>
                        <?php foreach ($mitraAcc as $m): ?>
                          <option value="<?= esc($m['nama']) ?>" data-posisi="<?= esc($m['posisi']) ?>">
                            <?= esc($m['nama']) ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="posisi" class="form-label">Posisi yang Anda Pilih</label>
                      <select class="form-select" id="posisi" name="posisi" required>
                        <option value="">-- Pilih Mitra Terlebih Dahulu --</option>
                      </select>
                    </div>
                    <div class="d-grid">
                      <button type="submit" class="btn btn-dark rounded-pill">Daftar Sekarang</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const mitraSelect = document.getElementById("mitra");
      const posisiSelect = document.getElementById("posisi");

      mitraSelect.addEventListener("change", function () {
        const selectedOption = mitraSelect.options[mitraSelect.selectedIndex];
        const posisi = selectedOption.getAttribute("data-posisi");

        posisiSelect.innerHTML = "";

        if (posisi) {
          const posisiList = posisi.split(',');

          posisiList.forEach(function (item) {
            const option = document.createElement("option");
            option.value = item.trim();
            option.textContent = item.trim();
            posisiSelect.appendChild(option);
          });
        } else {
          const option = document.createElement("option");
          option.value = "";
          option.textContent = "-- Posisi Tidak Tersedia --";
          posisiSelect.appendChild(option);
        }
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

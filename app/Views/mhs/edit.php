<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow rounded-4 border-0">
          <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center rounded-top-4">
            <h4 class="mb-0">Edit Form Mahasiswa</h4>
            <a href="/daftarmahasiswa" class="btn btn-outline-light btn-sm">Kembali</a>
          </div>
          <div class="card-body p-4">
            <form action="/daftarmahasiswa/update/<?=$daftarmahasiswa->id;?>" method="post">
              <?= csrf_field(); ?>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?=$daftarmahasiswa->nama;?>" placeholder="Masukkan nama Anda" required>
              </div>
              <div class="mb-3">
                <label for="ttl" class="form-label">Tempat Tanggal Lahir</label>
                <input type="text" class="form-control" id="ttl" name="tempat_tanggal_lahir"  value="<?=$daftarmahasiswa->tempat_tanggal_lahir;?>" placeholder="Contoh: Surabaya, 1 Januari 2000" required>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?=$daftarmahasiswa->alamat;?>" placeholder="Masukkan alamat Anda" required>
              </div>
              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?=$daftarmahasiswa->nim;?>" placeholder="Masukkan NIM Anda" required>
              </div>
              <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan"  value="<?=$daftarmahasiswa->jurusan;?>" placeholder="Masukkan jurusan Anda" required>
              </div>
              <div class="mb-3">
                <label for="posisi" class="form-label">Posisi yang Anda Pilih</label>
                <input type="text" class="form-control" id="posisi" name="posisi" value="<?=$daftarmahasiswa->posisi;?>" placeholder="Contoh: Front-End Developer" required>
              </div>
              <div class="mb-3">
                <label for="mitra" class="form-label">Mitra yang Anda Pilih</label>
                <input type="text" class="form-control" id="mitra" name="mitra" value="<?=$daftarmahasiswa->mitra;?>" placeholder="Masukkan nama mitra" required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-dark rounded-pill">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Halaman Registrasi</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/registrasi.css" />
</head>

<body>
    <div class="background-image">
        <div class="overlay">
            <div class="register-form">

                <div class="logo-register">
                    <em class="glyphicon glyphicon-user"></em>
                </div>

                <!-- Flashdata -->
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <form action="/registrasi/save" method="post">
                    <h3>Buat Akun Baru</h3>

                    <div class="form-group">
                        <input type="text" name="nickname" class="form-control" placeholder="Nama" required />
                    </div>

                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required />
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required />
                    </div>

                    <div class="form-group">
                        <input type="password" name="repassword" class="form-control" placeholder="Re-Password"
                            required />
                    </div>

                    <div class="form-group">
                        <select name="role" class="form-control" required>
                            <option value="" disabled selected>-- Pilih Role --</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="mitra">Mitra</option>
                        </select>
                    </div>

                    <input type="submit" class="btn btn-block btn-custom-green" value="REGISTER" />

                    <div class="text-center forget">
                        <p>Sudah punya akun? <a href="/masuk">Login</a></p>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
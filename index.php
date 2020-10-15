<?php
require $_SERVER['DOCUMENT_ROOT'] . "/perpustakaan/config/connection.php";
require $_SERVER['DOCUMENT_ROOT'] . "/perpustakaan/helpers/helper.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perpustakaan | Absensi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition lockscreen">
  <!-- Automatic element centering -->
  <div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
      <a href="#"><b>Perpustakaan</b> - SMK Negeri 7 Medan</a>
    </div>

    <div class="card shadow">
      <div class="card-body login-card-body">
        <h4 class="login-box-msg"><b>Form Pengunjung</b></h4>

        <form action="actions.php" method="POST" autocomplete="off">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nomor Induk Mahasiswa" name="nim" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="far fa-id-card"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col">
              <button type="submit" class="btn btn-primary btn-block" name="simpan">Simpan</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
    <div class="help-block text-center">
      Masukkan NIM (Nomor Induk Siswa) Anda dan Nama Lengkap 
      Anda  sebagai bukti absensi anda
    </div>
    <div class="text-center mt-4">
      <a href="<?= base_url('login') ?>">Masuk sebagai Staff Perpustakaan</a>
    </div>
  </div>
  <!-- /.center -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
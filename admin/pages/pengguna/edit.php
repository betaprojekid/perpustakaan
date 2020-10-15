<?php
$action = base_url('admin/pages/pengguna/actions.php');
$back = base_url('admin/pengguna');
$id = $_GET['id'];
$judul = 'pengguna';

$query = "SELECT
           *
          FROM
            users
          WHERE
            id = '$id'";
$data = show_query($query);
// var_dump($data);
// die();
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Edit <?= $judul ?></h2>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>

      <div class="card-body p-4">
        <div class="row">
          <div class="col-6">
            <form action="<?= $action ?>" method="POST" autocomplete="off">
              <input type="hidden" name="id" value="<?= $data['id'] ?>">



              <div class="form-group">
                <label for="username">username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" required value="<?=$data['username']?>">
              </div>

              <div class="form-group">
                <label for="nama">nama</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama" required value="<?=$data['nama']?>">
              </div>

              <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email" required value="<?=$data['email']?>">
              </div>

              <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required>
                <small class="form-text text-muted">
                  password minimal 6 karakter
                </small>
              </div>

              <div class="form-group">
                <label for="level">level</label>
                <select name="level" id="level" class="form-control custom-select">
                  <option value="">Pilih Level</option>
                  <option value="admin" <?= (($data['level'] === 'admin')? 'selected' : '');?> >Admin</option>
                  <option value="admin" <?= (($data['level'] === 'staff')? 'selected' : '');?>>Staff</option>
                </select>
              </div>

              <div class="form-group">
                <label for="aktif">aktif</label>
                <select name="aktif" id="aktif" class="form-control custom-select">
                  <option value="">Pilih aktif</option>
                  <option value="y" <?= (($data['aktif'] === 'y')? 'selected' : '');?> >Aktif</option>
                  <option value="n" <?= (($data['aktif'] === 'n')? 'selected' : '');?>>Non-Aktif</option>
                </select>
              </div>

              <div class="form-group">
                <button type="submit" name="edit" class="btn btn-primary btn-flat">Save</button>
                <a href="<?= $back ?>" class="btn btn-danger btn-flat">Cancel</a>
              </div>
            </form>
          </div>
          <!-- <div class="col-6"></div> -->
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$action = base_url('admin/pages/prodi/actions.php');
$back = base_url('admin/prodi');
$id = $_GET['id'];
$judul = 'prodi';

$query = "SELECT
           *
          FROM
            prodi
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
                <label for="kode">kode</label>
                <input type="text" class="form-control" name="kode" id="kode" placeholder="Masukkan kode program studi" required value="<?= $data['kode'];?>">
              </div>

              <div class="form-group">
                <label for="prodi">program studi</label>
                <input type="text" class="form-control" name="prodi" id="prodi" placeholder="Masukkan program studi" required value="<?= $data['prodi'];?>">
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
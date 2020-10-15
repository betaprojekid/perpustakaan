<?php
$action = base_url('admin/pages/transaksi/actions.php');
$back = "transaksi";

$buku_query = "SELECT id, kode_buku, judul, jumlah_buku FROM buku ORDER BY id ASC";
$anggota_query = "SELECT id, nim, nama_lengkap FROM anggota ORDER BY id ASC";

$buku_options = list_query($buku_query);
$anggota_options = list_query($anggota_query);
?>

<div class="row">
  <div class="col-8 offset-2">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Tambah Transaksi</h2>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>

      <div class="card-body p-4">
        <form action="<?= $action ?>" method="POST" autocomplete="off">

          <div class="form-group">
            <label for="buku">Buku</label>
            <select name="buku" id="buku" class="form-control custom-select select-opsi" data-placeholder="Silahkan Pilih Buku">
              <?php foreach ($buku_options as $option) : ?>
                <option value="<?= $option['id'] ?>"><?= $option['kode_buku'] . ' - ' . $option['judul'] . ' (Stok '  . $option['jumlah_buku'] . ')'?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="anggota">Anggota</label>
            <select name="anggota" id="anggota" class="form-control custom-select select-opsi" data-placeholder="Silahkan Pilih Anggota">
              <?php foreach ($anggota_options as $option) : ?>
                <option value="<?= $option['id'] ?>"><?= $option['nim'] . ' - ' . $option['nama_lengkap'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <button type="submit" name="add" class="btn btn-primary">Save</button>
            <a href="<?= $back ?>" class="btn btn-danger">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
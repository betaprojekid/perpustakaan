<?php
$action = base_url('admin/pages/transaksi/actions.php');
$back = base_url('admin/transaksi');
$id = $_GET['id'];
$judul = 'transaksi';

$query = "SELECT * FROM transaksi WHERE id = '$id'";
$buku_query = "SELECT id, kode_buku, judul, jumlah_buku FROM buku ORDER BY id ASC";
$anggota_query = "SELECT id, nim, nama_lengkap FROM anggota ORDER BY id ASC";

$data = show_query($query);
$buku_options = list_query($buku_query);
$anggota_options = list_query($anggota_query);
// var_dump($data);
// die();
?>

<div class="row">
  <div class="col-8 offset-2">
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
        <form action="<?= $action ?>" method="POST" autocomplete="off">
          <input type="hidden" name="id" value="<?= $data['id'] ?>">

          <div class="form-group">
            <label for="buku">Buku</label>
            <select name="buku" id="buku" class="form-control custom-select" disabled>
              <?php foreach ($buku_options as $option) : ?>
                <option value="<?= $option['id'] ?>" <?= ($option['id'] == $data['buku_id'] ? 'selected' : '') ?>><?= $option['kode_buku'] . ' - ' . $option['judul'] . ' (Stok '  . $option['jumlah_buku'] . ')' ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="anggota">Anggota</label>
            <select name="anggota" id="anggota" class="form-control custom-select" disabled>
              <?php foreach ($anggota_options as $option) : ?>
                <option value="<?= $option['id'] ?>" <?= ($option['id'] == $data['anggota_id'] ? 'selected' : '') ?>><?= $option['nim'] . ' - ' . $option['nama_lengkap'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-row">
            <div class="form-group col-6">
              <label for="tgl_pinjam">Tanggal Peminjaman</label>
              <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?=$data['tgl_pinjam']?>" disabled>
            </div>
            <div class="form-group col-6">
              <label for="tgl_berakhir">Tanggal Berakhir</label>
              <input type="date" class="form-control" id="tgl_berakhir" name="tgl_pinjam" value="<?=$data['tgl_berakhir']?>" disabled>
            </div>
          </div>

          <div class="form-group">
            <label for="keterangan">keterangan</label>
            <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"><?=$data['keterangan']?></textarea>
          </div>

          <div class="form-group">
            <button type="submit" name="edit" class="btn btn-primary btn-flat">Save</button>
            <a href="<?= $back ?>" class="btn btn-danger btn-flat">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
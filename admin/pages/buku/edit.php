<?php
$action = base_url('admin/pages/buku/actions.php');
$back = base_url('admin/buku');
$id = $_GET['id'];
$judul = 'buku';

$query = "SELECT
           *
          FROM
            buku
          WHERE
            id = '$id'";
$data = show_query($query);

$kategori_query = 'SELECT
                    *
                    FROM
                      kategori';
$kategori_options = list_query($kategori_query);

$lokasi_query = "SELECT
                  *
                FROM
                  lokasi_buku";
$lokasi_options = list_query($lokasi_query);
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
                <input type="text" class="form-control" name="kode" id="kode" placeholder="Masukkan kode buku" required value="<?= $data['kode_buku'] ?>">
              </div>

              <div class="form-group">
                <label for="isbn">isbn</label>
                <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Masukkan isbn buku" required value="<?= $data['isbn'] ?>">
              </div>

              <div class="form-group">
                <label for="judul">Judul Buku</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul Buku" required value="<?= $data['judul'] ?>">
              </div>

              <div class="form-group">
                <label for="kategori">kategori buku</label>
                <select name="kategori" id="kategori" class="form-control custom-select" required>
                  <option value="">Pilih kategori</option>
                  <?php
                  foreach ($kategori_options as $option) :
                    if ($option['id'] === $data['kategori_id']) :
                  ?>
                      <option value="<?= $option['id'] ?>" selected><?= $option['kategori'] ?></option>
                    <?php else : ?>
                      <option value="<?= $option['id'] ?>"><?= $option['kategori'] ?></option>
                  <?php
                    endif;
                  endforeach;
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="pengarang">pengarang</label>
                <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Masukkan pengarang" required value="<?= $data['pengarang'] ?>">
              </div>

              <div class="form-group">
                <label for="penerbit">penerbit</label>
                <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Masukkan penerbit buku" required value="<?= $data['penerbit'] ?>">
              </div>

              <div class="form-group">
                <label for="tahun">tahun terbit</label>
                <input type="number" class="form-control" min="1900" max="2099" step="1" name="tahun" id="tahun" placeholder="Masukkan tahun terbit buku" required value="<?= $data['tahun_terbit'] ?>">
              </div>

              <div class="form-group">
                <label for="stok">stok terbit</label>
                <input type="number" class="form-control" min="0" step="1" name="stok" id="stok" placeholder="Masukkan stok buku" required value="<?= $data['jumlah_buku'] ?>">
              </div>

              <div class="form-group">
                <label for="lokasi">lokasi</label>
                <select name="lokasi" id="lokasi" class="form-control custom-select" required>
                  <option value="">Pilih lokasi</option>
                  <?php
                  foreach ($lokasi_options as $option) :
                    if ($option['id'] === $data['lokasi_buku_id']) :
                  ?>
                      <option value="<?= $option['id'] ?>" selected><?= $option['lokasi'] ?></option>
                    <?php else : ?>

                      <option value="<?= $option['id'] ?>"><?= $option['lokasi'] ?></option>
                  <?php
                    endif;
                  endforeach;
                  ?>
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
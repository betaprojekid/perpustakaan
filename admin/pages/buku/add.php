<?php
$action = base_url('admin/pages/buku/actions.php');
$back = "buku";

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
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Tambah Buku</h2>
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
            <form action="<?=$action?>" method="POST" autocomplete="off">
            
              <div class="form-group">
                <label for="kode">kode</label>
                <input type="text" class="form-control" name="kode" id="kode" placeholder="Masukkan kode buku" required>
              </div>

              <div class="form-group">
                <label for="isbn">isbn</label>
                <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Masukkan isbn buku" required>
              </div>

              <div class="form-group">
                <label for="judul">Judul Buku</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul Buku" required>
              </div>

              <div class="form-group">
                <label for="kategori">kategori buku</label>
                <select name="kategori" id="kategori" class="form-control custom-select" required>
                  <option value="">Pilih kategori</option>
                  <?php  foreach($kategori_options as $option): ?> 
                    <option value="<?=$option['id']?>"><?=$option['kategori']?></option>
                  <?php  endforeach;?>
                </select>
              </div>

              <div class="form-group">
                <label for="pengarang">pengarang</label>
                <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Masukkan pengarang" required>
              </div>

              <div class="form-group">
                <label for="penerbit">penerbit</label>
                <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Masukkan penerbit buku" required>
              </div>

              <div class="form-group">
                <label for="tahun">tahun terbit</label>
                <input type="number" class="form-control" min="1900" max="2099" step="1"  name="tahun" id="tahun" placeholder="Masukkan tahun terbit buku" required />
                <!-- <input type="year" class="form-control" name="tahun" id="tahun" placeholder="Masukkan tahun terbit buku" required> -->
              </div>

              <div class="form-group">
                <label for="stok">stok terbit</label>
                <input type="number" class="form-control" min="0" step="1"  name="stok" id="stok" placeholder="Masukkan stok buku" required />
                <!-- <input type="year" class="form-control" name="tahun" id="tahun" placeholder="Masukkan tahun terbit buku" required> -->
              </div>

              <div class="form-group">
                <label for="lokasi">lokasi</label>
                <select name="lokasi" id="lokasi" class="form-control custom-select" required>
                  <option value="">Pilih lokasi</option>
                  <?php  foreach($lokasi_options as $option): ?> 
                    <option value="<?=$option['id']?>"><?=$option['lokasi']?></option>
                  <?php  endforeach;?>
                </select>
              </div>

              <div class="form-group">
                <button type="submit" name="add" class="btn btn-primary btn-flat">Save</button>
                <a href="<?=$back?>" class="btn btn-danger btn-flat">Cancel</a>
              </div>
            </form>
          </div>
          <!-- <div class="col-6"></div> -->
        </div>
      </div>
    </div>
  </div>
</div>
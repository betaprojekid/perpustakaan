<?php
$action = base_url('admin/pages/anggota/actions.php');
$back = base_url('admin/anggota');
$id = $_GET['id'];

$query = "SELECT
           *
          FROM
            anggota
          WHERE
            id = '$id'";
$data = show_query($query);

$query_prodi = 'SELECT
           *
          FROM
            prodi';
$options = list_query($query_prodi);
// var_dump($data);
// die();
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">View Anggota</h2>
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
            <form>
              <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" name="nim" id="nim" placeholder="Masukkan NIM anda" disabled value="<?= $data['nim'] ?>">
              </div>

              <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama Lengkap anda" disabled value="<?= $data['nama_lengkap'] ?>">
              </div>

              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan tempat lahir anda" disabled value="<?= $data['tempat_lahir'] ?>">
              </div>

              <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Nama Lengkap anda" disabled value="<?= $data['tgl_lahir'] ?>">
              </div>

              <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" disabled>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="laki-laki" <?= (($data['jk'] === 'laki-laki')? 'selected' : '');?> >Laki - laki</option>
                  <option value="perempuan" <?= (($data['jk'] === 'perempuan')?'selected':'');?> >Perempuan</option>
                </select>
              </div>

              <div class="form-group">
                <label for="prodi">Prodi Studi</label>
                <select name="prodi" id="prodi" class="form-control" disabled>
                  <option value="">Pilih Program Studi</option>
                  <?php
                  foreach ($options as $option) :
                    if ($option['id'] === $data['prodi_id']) :
                  ?>

                      <option value="<?= $option['id'] ?>" selected><?= $option['prodi'] ?></option>

                    <?php else : ?>

                      <option value="<?= $option['id'] ?>"><?= $option['prodi'] ?></option>

                  <?php
                    endif;
                  endforeach;
                  ?>
                </select>
              </div>

              <div class="form-group">
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
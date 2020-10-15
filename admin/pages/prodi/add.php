<?php
$action = base_url('admin/pages/prodi/actions.php');
$back = "prodi";
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Tambah Program Studi</h2>
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
                <input type="text" class="form-control" name="kode" id="kode" placeholder="Masukkan kode program studi" required>
              </div>

              <div class="form-group">
                <label for="prodi">program studi</label>
                <input type="text" class="form-control" name="prodi" id="prodi" placeholder="Masukkan program studi" required>
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
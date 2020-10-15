<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header bg-primary">
        <h2 class="card-title">Data lokasi</h2>
      </div>
      <div class="card-body p-2">
        <div class="mb-2 border-bottom py-2">
          <a href="<?=base_url()?>/admin/add-lokasi" class="btn btn-flat btn-success">
          <i class="fas fa-plus mr-2"></i>
            Tambah Data
          </a>
        </div>
        <div class="table-responsive-md">
          <table id="" class="table table-bordered table-hover table-list display" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>lokasi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no= 1;
              $query = "SELECT
                            *
                        FROM
                            lokasi_buku
                        ORDER BY
                          id
                        ASC";
              $lists = list_query($query);
              foreach($lists as $list):
              ?>
              <tr>
                <td><?=$no++?></td>
                <td><?=$list['kode']?></td>
                <td><?=$list['lokasi']?></td>
                <td>
                  <a href="edit-lokasi/<?=$list['id']?>" class="btn btn-info mr-1 btn-sm">Ubah</a>
                </td>
              </tr>
              <?php
              endforeach;
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
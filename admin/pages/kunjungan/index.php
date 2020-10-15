<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header bg-primary">
        <h2 class="card-title">Data Kunjungan</h2>
      </div>
      <div class="card-body p-2">
        <div class="mb-2 border-bottom py-2">
          <a href="<?=base_url()?>/admin/add-kategori" class="btn btn-flat btn-success">
          <i class="fas fa-plus mr-2"></i>
            Tambah Data
          </a>
        </div>
        <div class="table-responsive-md">
          <table id="" class="table table-bordered table-hover table-list display" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Waktu Kunjugan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no= 1;
              $query = "SELECT
                            *
                        FROM
                            kunjungan
                        ORDER BY
                          id
                        ASC";
              $lists = list_query($query);
              foreach($lists as $list):
              ?>
              <tr>
                <td><?=$no++?></td>
                <td><?=$list['nim']?></td>
                <td><?=$list['nama']?></td>
                <td><?=date("d F Y, H:i:s", strtotime($list['created_at']))?></td>
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
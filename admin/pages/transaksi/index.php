<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header bg-primary">
        <h2 class="card-title">Data Transaksi</h2>
      </div>
      <div class="card-body p-2">
        <div class="mb-2 border-bottom py-2">
          <a href="<?=base_url()?>/admin/add-transaksi" class="btn btn-flat btn-success">
          <i class="fas fa-plus mr-2"></i>
            Pinjam Buku
          </a>
        </div>
        <div class="table-responsive-md">
          <table id="" class="table table-bordered table-hover table-list display" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Level</th>
                <th>Aktif</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no= 1;
              $query = "SELECT
                            *
                        FROM
                            users
                        ORDER BY
                          id
                        ASC";
              $lists = list_query($query);
              foreach($lists as $list):
              ?>
              <tr>
                <td><?=$no++?></td>
                <td><?=$list['username']?></td>
                <td><?=$list['nama']?></td>
                <td><?=$list['email']?></td>
                <td><?=$list['level']?></td>
                <td>
                  <?php if($list['aktif'] === 'y'):?>
                    <span class="badge badge-success">Aktif</span>
                  <?php else:?>
                    <span class="badge badge-warning">Non-aktif</span>
                  <?php endif;?>
                </td>
                <td>
                  <a href="edit-transaksi/<?=$list['id']?>" class="btn btn-info mr-1 btn-sm">Ubah</a>
                  <a href="#" class="btn btn-success mr-1 btn-sm">Perpanjang</a>
                  <a href="hapus-transaksi/<?=$list['id']?>" class="btn btn-danger btn-sm" onclick="return confirm('anda yaking ingin menghapus data ini!')">Kembalikan</a>
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
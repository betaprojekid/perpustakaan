<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header bg-primary">
        <h2 class="card-title">Data Buku</h2>
      </div>
      <div class="card-body p-2">
        <div class="mb-2 border-bottom py-2">
          <a href="<?=base_url()?>/admin/add-buku" class="btn btn-flat btn-success">
          <i class="fas fa-plus mr-2"></i>
            Tambah Data
          </a>
          <a href="<?=base_url()?>/admin/export-buku" class="btn btn-flat btn-outline-secondary">
          <i class="fas fa-file-excel mr-2"></i>
            Export To Excels
          </a>
        </div>
        <div class="table-responsive-md">
          <table id="" class="table table-bordered table-hover table-list display" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>ISBN</th>
                <th>Lokasi</th>
                <th>Stok</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no= 1;
              $query = "SELECT
                            buku.*,
                            kategori.kategori,
                            lokasi_buku.lokasi
                        FROM
                            buku
                        JOIN kategori ON kategori.id = buku.kategori_id
                        JOIN lokasi_buku on lokasi_buku.id = buku.lokasi_buku_id
                        ORDER BY
                          buku.id
                        ASC";
              $lists = list_query($query);
              foreach($lists as $list):
              ?>
              <tr>
                <td><?=$no++?></td>
                <td><?=$list['judul']?></td>
                <td><?=$list['pengarang']?></td>
                <td><?=$list['penerbit']?></td>
                <td><?=$list['isbn']?></td>
                <td><?=$list['lokasi']?></td>
                <td><?=$list['jumlah_buku']?></td>
                <td>
                  <a href="edit-buku/<?=$list['id']?>" class="btn btn-info mr-1 btn-sm">Ubah</a>
                  <a href="hapus-buku/<?=$list['id']?>" class="btn btn-danger btn-sm" onclick="return confirm('anda yaking ingin menghapus data ini!')">Hapus</a>
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
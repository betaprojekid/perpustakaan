<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header bg-primary">
        <h2 class="card-title">Data Anggota</h2>
      </div>
      <div class="card-body p-2">
        <div class="mb-2 border-bottom py-2">
          <a href="<?=base_url()?>/admin/add-anggota" class="btn btn-flat btn-success">
          <i class="fas fa-plus mr-2"></i>
            Tambah Data
          </a>
          <a href="<?=base_url()?>/admin/export-anggota" class="btn btn-flat btn-outline-secondary">
          <i class="fas fa-file-excel mr-2"></i>
            Export To Excels
          </a>
        </div>
        <div class="table-responsive">
          <table id="" class="table table-bordered table-hover table-list display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>tanggal Lahir</th>
                <th>Program Studi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no= 1;
              $query = 'SELECT
                            anggota.*,
                            prodi.prodi
                        FROM
                            anggota
                        JOIN prodi ON prodi.id = anggota.prodi_id';
              $lists = list_query($query);
              foreach($lists as $list):
              ?>
              <tr>
                <td><?=$no++?></td>
                <td><?=$list['nim']?></td>
                <td><?=$list['nama_lengkap']?></td>
                <td><?=$list['jk']?></td>
                <td><?=$list['tempat_lahir']?></td>
                <td><?=$list['tgl_lahir']?></td>
                <td><?=$list['prodi']?></td>
                <td>
                  <!-- <a href="view-anggota/<?=$list['id']?>" class="btn bg-gradient-info btn-flat mr-1 btn-sm">View</a> -->
                  <a href="edit-anggota/<?=$list['id']?>" class="btn btn-info mr-1 btn-sm">Ubah</a>
                  <a href="hapus-anggota/<?=$list['id']?>" class="btn btn-danger btn-sm" onclick="return confirm('anda yaking ingin menghapus data ini!')">Hapus</a>
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
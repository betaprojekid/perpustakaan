<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Data Anggota</h2>
        <div class="card-tools">
          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button> -->
            <a href="<?=base_url()?>/admin/add-anggota" class="btn btn-flat btn-primary">Tambah Anggota</a>
        </div>
      </div>
      <div class="card-body p-2">
        <div class="table-responsive">
          <table id="" class="table table-hover table-list" style="width:100%">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Program Studi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no= 1;
              $query = 'SELECT
                            anggota.id,
                            nim,
                            nama_lengkap,
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
                <td><?=$list['prodi']?></td>
                <td>
                  <a href="#" class="btn bg-gradient-info btn-flat mr-1 btn-sm">View</a>
                  <a href="#" class="btn bg-gradient-primary btn-flat mr-1 btn-sm">Edit</a>
                  <a href="#" class="btn bg-gradient-danger btn-flat btn-sm">View</a>
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
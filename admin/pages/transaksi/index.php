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
                <th>Buku</th>
                <th>Peminjam</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Berakhir</th>
                <th>Tanggal Pengembalian</th>
                <th>Status</th>
                <th>Denda</th>
                <th width="235px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no= 1;
              $query = "SELECT
                            transaksi.*,
                            buku.judul,
                            anggota.nama_lengkap
                        FROM
                            transaksi
                        JOIN buku on buku.id = transaksi.buku_id
                        JOIN anggota on anggota.id = transaksi.anggota_id
                        ORDER BY
                          transaksi.id
                        ASC";
              $lists = list_query($query);
              foreach($lists as $list):
              ?>
              <tr>
                <td><?=$no++?></td>
                <td><?=$list['judul']?></td>
                <td><?=$list['nama_lengkap']?></td>
                <td><?=$list['tgl_pinjam']?></td>
                <td><?=$list['tgl_berakhir']?></td>
                <td><?=$list['tgl_kembali']?></td>
                <td>
                  <?php if($list['status'] === 'pinjam'):?>
                    <span class="badge badge-warning">Pinjam</span>
                  <?php else:?>
                    <span class="badge badge-success">Kembali</span>
                  <?php endif;?>
                </td>
                <td>
                  <?=(($list['denda'])??'-')?>
                  <?php
                  // bandingkan tanggal berakhir dengan hari ini
                  // jika telat maka kurangkan tanggal hari ini dgn tgl berakhir
                  // kalikan hasil dengan 500
                  ?>
                </td>
                <td>
                  <a href="edit-transaksi/<?=$list['id']?>" class="btn btn-info mr-1 btn-sm">Ubah</a>
                  <?php
                  $sekarang = date('y-m-d'); 
                  $tgl_berakhir = date('y-m-d', strtotime($list['tgl_berakhir']));
                  if($sekarang <= $tgl_berakhir && $list['status'] === 'pinjam'):
                  ?>
                    <a href="perpanjang-transaksi/<?=$list['id']?>" class="btn btn-success mr-1 btn-sm">Perpanjang</a>
                  <?php
                  endif;
                  
                  if($list['status'] === 'pinjam'): ?>
                  <a href="kembali-transaksi/<?=$list['id']?>" class="btn btn-danger btn-sm">Kembalikan</a>
                  <?php endif;?>
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
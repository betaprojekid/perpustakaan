<?php
// jawabanannya disini
// https://stackoverflow.com/questions/5293189/select-records-from-today-this-week-this-month-php-mysql
$no = 1;
$waktu = 'all';
if(isset($_POST['submit'])){
  $waktu = $_POST['waktu'];

  if($waktu == 'today'){
    $query = "SELECT
                transaksi.*,
                buku.judul,
                anggota.nama_lengkap,
                anggota.nim
              FROM
                transaksi
              JOIN buku ON buku.id = transaksi.buku_id
              JOIN anggota ON anggota.id = transaksi.anggota_id
              WHERE
                status = 'pinjam'
                AND
                DAY(transaksi.created_at)=DAY(NOW())
              ORDER BY
                created_at ASC ";
  }elseif($waktu == 'week'){
    $query = "SELECT
                transaksi.*,
                buku.judul,
                anggota.nama_lengkap,
                anggota.nim
              FROM
                transaksi
              JOIN buku ON buku.id = transaksi.buku_id
              JOIN anggota ON anggota.id = transaksi.anggota_id
              WHERE
                status = 'pinjam'
                AND
                WEEK(transaksi.created_at)=WEEK(NOW())
              ORDER BY
                created_at ASC ";
  }elseif($waktu == 'month'){
    $query = "SELECT
                transaksi.*,
                buku.judul,
                anggota.nama_lengkap,
                anggota.nim
              FROM
                transaksi
              JOIN buku ON buku.id = transaksi.buku_id
              JOIN anggota ON anggota.id = transaksi.anggota_id
              WHERE
                status = 'pinjam'
                AND
                MONTH(transaksi.created_at)=MONTH(NOW())
              ORDER BY
                created_at ASC ";
  }else{
    $query = "SELECT
              transaksi.*,
              buku.judul,
              anggota.nama_lengkap,
              anggota.nim
            FROM
              transaksi
            JOIN buku ON buku.id = transaksi.buku_id
            JOIN anggota ON anggota.id = transaksi.anggota_id
            WHERE
              status = 'pinjam'
            ORDER BY
              created_at ASC";  
  }
}elseif(isset($_POST['reset'])){
  $query = "SELECT
              transaksi.*,
              buku.judul,
              anggota.nama_lengkap,
              anggota.nim
            FROM
              transaksi
            JOIN buku ON buku.id = transaksi.buku_id
            JOIN anggota ON anggota.id = transaksi.anggota_id
            WHERE
              status = 'pinjam'
            ORDER BY
              created_at ASC";
}else{
  $query = "SELECT
              transaksi.*,
              buku.judul,
              anggota.nama_lengkap,
              anggota.nim
            FROM
              transaksi
            JOIN buku ON buku.id = transaksi.buku_id
            JOIN anggota ON anggota.id = transaksi.anggota_id
            WHERE
              status = 'pinjam'
            ORDER BY
              created_at ASC";
}

$lists = list_query($query);
?>

<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header bg-primary">
        <h2 class="card-title">Data Laporan Peminjaman Buku</h2>
      </div>
      <div class="card-body p-2">
        <div class="border-bottom mb-2 py-2">
          <div class="row">
            <div class="col-md-4">
              <form method="POST" action="">
                <div class="input-group mb-3">
                  <select name="waktu" id="waktu" class="form-control">
                    <option value="">Pilih Durasi Waktu</option>
                    <option value="today">Hari ini</option>
                    <option value="week">Minggu ini</option>
                    <option value="month">Bulan ini</option>
                  </select>
                  <div class="input-group-append">
                    <button class="btn btn-primary mr-1" type="submit" name="submit">Submit</button>
                    <button class="btn btn-warning" type="submit" name="reset">Reset</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col">
              <a href="<?= base_url('admin/export/laporan-peminjaman.php?waktu=' . $waktu) ?>" class="btn btn-outline-info">
                <i class="fas fa-file-excel mr-2"></i>
                Export To Excels
              </a>
            </div>
          </div>
        </div>
        <div class="table-responsive-md">
          <table id="" class="table table-bordered table-hover table-list display" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Input Data</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($lists as $list) :
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $list['nim'] ?></td>
                  <td><?= $list['nama_lengkap'] ?></td>
                  <td><?= $list['judul'] ?></td>
                  <td><?= date("d F Y", strtotime($list['tgl_berakhir'])) ?></td>
                  <td><?= date("d F Y", strtotime($list['created_at'])) ?></td>
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
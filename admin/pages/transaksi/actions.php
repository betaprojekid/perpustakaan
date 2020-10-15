<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/config/connection.php';
require $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/helpers/helper.php';

$path = base_url('admin/transaksi');

if (isset($_POST['add'])) {
  // var_dump($_POST);
  // die();
  
  $buku = nodos($_POST['buku']);
  $anggota = nodos($_POST['anggota']);
  $tgl_pinjam = date("Y-m-d");
  $tgl_berakhir = date("Y-m-d", strtotime($tgl_pinjam . ' + 7 days'));

  $data_buku = show_query("SELECT * FROM buku WHERE id = '$buku'");
  if ($data_buku['jumlah_buku'] == 0) {
    echo "
            <script>
                alert('stok buku kosong silahkan cari buku lain');
                document.location.href = '" . $path . "';
            </script>
        ";
    exit;
  }

  mysqli_autocommit($conn, FALSE);

  $query_transaksi = "INSERT INTO
                        transaksi
                      SET
                        buku_id = '$buku',
                        anggota_id = '$anggota',
                        tgl_pinjam = '$tgl_pinjam',
                        tgl_berakhir = '$tgl_berakhir',
                        status = 'pinjam'
                      ";

  $query_stok_buku = "UPDATE
                        buku
                      SET
                        jumlah_buku = jumlah_buku - '1'
                      WHERE
                        id = '$buku'
                      ";

  $sql_transaksi = mysqli_query($conn, $query_transaksi) or die("Error Transaksi: " . mysqli_error($conn));
  $sql_stok_buku = mysqli_query($conn, $query_stok_buku)or die("Error Stok: " . mysqli_error($conn));

  $commit = mysqli_commit($conn);
  
  if ($commit) {
    echo "
            <script>
                alert('data telah berhasil di simpan');
                document.location.href = '" . $path . "';
            </script>
        ";
    exit;
  }
} elseif (isset($_POST['edit'])) {
  // var_dump($_POST);
  // die();
  $id = nodos($_POST['id']);

  $buku = nodos($_POST['buku']);
  $pengguna = nodos($_POST['pengguna']);

  $query = "UPDATE
              users
            SET
              username = '$username',
              nama = '$nama',
              email = '$email',
              password = '$pass',
              level = '$level',
              aktif = '$aktif'
            WHERE
              id = '$id'
            ";

  $sql = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));

  if ($sql) {
    echo "
            <script>
                alert('data telah berhasil di simpan');
                document.location.href = '" . $path . "';
            </script>
        ";
    exit;
  }
} elseif (isset($_GET['act']) && $_GET['act'] === 'delete') {

  $id = $_GET['id'];

  if($id == $_SESSION['user']['id']){
    echo "
        <script>
            alert('Denied, anda tidak dapat menghapus akun anda sendiri');
            document.location.href = '".$path."';
        </script>
    ";
    exit;
}

  // echo 'id ' . $id . ' mau di hapus gak !';
  // die();
  $query = "DELETE
            FROM
              users
            WHERE
              id = '$id'
            ";
  $sql = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));

  if ($sql) {
    echo "
            <script>
                alert('akun telah di hapus');
                document.location.href = '" . $path . "';
            </script>
        ";
    exit;
  }
}

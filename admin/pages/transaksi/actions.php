<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/config/connection.php';
require $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/helpers/helper.php';

$path = base_url('admin/transaksi');
$timestamp = date("Y-m-d H:i:s");

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
                        status = 'pinjam'";

  $query_stok_buku = "UPDATE
                        buku
                      SET
                        jumlah_buku = jumlah_buku - '1',
                        updated_at = '$timestamp'
                      WHERE
                        id = '$buku'";

  $sql_transaksi = mysqli_query($conn, $query_transaksi) or die("Error Transaksi: " . mysqli_error($conn));
  $sql_stok_buku = mysqli_query($conn, $query_stok_buku) or die("Error Stok: " . mysqli_error($conn));

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
}elseif (isset($_GET['act'])) {
  $action = $_GET['act'];
  if ($action == 'perpanjang') {
    $id = $_GET['id'];

    $data = show_query("SELECT tgl_berakhir FROM transaksi WHERE id = '$id'");
    $tgl_berakhir = $data['tgl_berakhir'];
    $tgl_perpanjangan = date("Y-m-d", strtotime($tgl_berakhir . ' + 7 days'));

    $query = "UPDATE 
                transaksi 
              SET 
                tgl_berakhir = '$tgl_perpanjangan', 
                updated_at = '$timestamp'
              WHERE 
                id = $id";
    $sql = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));

    if ($sql) {
      echo "
        <script>
            alert('status peminjaman telah di perpanjang');
            document.location.href = '" . $path . "';
        </script>
        ";
      exit;
    }
  } elseif ($action == 'kembali') {
    $id = $_GET['id'];

    // inisialisasi
    $denda = 0;
    $keterangan = '';

    // echo $id;
    // die();
    $data = show_query("SELECT * FROM transaksi WHERE id = '$id'");
    $sekarang = date('y-m-d');
    $tgl_berakhir = date('y-m-d', strtotime($data['tgl_berakhir']));

    if ($sekarang > $tgl_berakhir) {
      // hitung denda
      $sekarang2  = date_create();
      $tgl_berakhir2 = date_create($data['tgl_berakhir']); // waktu sekarang
      $diff  = date_diff($sekarang2, $tgl_berakhir2);
      $denda_hari = $diff->days;

      $denda = $denda_hari * 500;
      $keterangan = 'terkena denda karena telat ' . $denda_hari . ' hari';

      // echo $denda_hari;
      // exit;
    }

    // update transaksi
    // update stok buku
    $buku = $data['buku_id'];

    mysqli_autocommit($conn, FALSE);

    $query = "UPDATE 
                transaksi 
              SET 
                tgl_kembali = '$sekarang',
                status = 'kembali',
                denda = '$denda',
                keterangan = '$keterangan', 
                updated_at = '$timestamp'
              WHERE 
                id = $id";

    $query_stok_buku = "UPDATE
                        buku
                      SET
                        jumlah_buku = jumlah_buku + 1,
                        updated_at = '$timestamp'
                      WHERE
                        id = '$buku'";

    $sql = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
    $sql_stok_buku = mysqli_query($conn, $query_stok_buku) or die("Error Stok: " . mysqli_error($conn));

    $commit = mysqli_commit($conn);

    if ($commit) {
      echo "
        <script>
            alert('buku telah di kembalikan, terima kasih');
            document.location.href = '" . $path . "';
        </script>
        ";
      exit;
    }
  }
}

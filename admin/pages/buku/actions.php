<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/config/connection.php';
require $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/helpers/helper.php';

$path = base_url('admin/buku');

if (isset($_POST['add'])) {
  // var_dump($_POST);
  // die();

  $kode = nodos($_POST['kode']);
  $isbn = nodos($_POST['isbn']);
  $judul = nodos($_POST['judul']);
  $kategori = nodos($_POST['kategori']);
  $pengarang = nodos($_POST['pengarang']);
  $penerbit = nodos($_POST['penerbit']);
  $tahun = nodos($_POST['tahun']);
  $stok = nodos($_POST['stok']);
  $lokasi = nodos($_POST['lokasi']);

  $query = "INSERT INTO
              buku
            SET
              kategori_id = '$kategori',
              lokasi_buku_id = '$lokasi',
              kode_buku = '$kode',
              judul = '$judul',
              pengarang = '$pengarang',
              penerbit = '$penerbit',
              tahun_terbit = '$tahun',
              isbn = '$isbn',
              jumlah_buku = '$stok'
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
} elseif (isset($_POST['edit'])) {
  // var_dump($_POST);
  // die();
  $id = nodos($_POST['id']);
  $timestamp = date("Y-m-d H:i:s");

  $kode = nodos($_POST['kode']);
  $isbn = nodos($_POST['isbn']);
  $judul = nodos($_POST['judul']);
  $kategori = nodos($_POST['kategori']);
  $pengarang = nodos($_POST['pengarang']);
  $penerbit = nodos($_POST['penerbit']);
  $tahun = nodos($_POST['tahun']);
  $stok = nodos($_POST['stok']);
  $lokasi = nodos($_POST['lokasi']);

  $query = "UPDATE
              buku
            SET
              kategori_id = '$kategori',
              lokasi_buku_id = '$lokasi',
              kode_buku = '$kode',
              judul = '$judul',
              pengarang = '$pengarang',
              penerbit = '$penerbit',
              tahun_terbit = '$tahun',
              isbn = '$isbn',
              jumlah_buku = '$stok',
              updated_at = '$timestamp'
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

  // echo 'id ' . $id . ' mau di hapus gak !';
  // die();
  $query = "DELETE
            FROM
              buku
            WHERE
              id = '$id'
            ";
  $sql = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));

  if ($sql) {
    echo "
            <script>
                alert('data telah di hapus');
                document.location.href = '" . $path . "';
            </script>
        ";
    exit;
  }
}

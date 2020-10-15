<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/config/connection.php';
require $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/helpers/helper.php';

$path = base_url('admin/lokasi');

if (isset($_POST['add'])) {
  // var_dump($_POST);
  // die();

  $kode = nodos($_POST['kode']);
  $lokasi = nodos($_POST['lokasi']);

  $query = "INSERT INTO
              lokasi_buku
            SET
              kode = '$kode',
              lokasi = '$lokasi'
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
  
  $kode = nodos($_POST['kode']);
  $lokasi = nodos($_POST['lokasi']);

  $query = "UPDATE
              kategori
            SET
            kode = '$kode',
              lokasi = '$lokasi'
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
}

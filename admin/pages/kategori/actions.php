<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/config/connection.php';
require $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/helpers/helper.php';

$path = base_url('admin/kategori');

if (isset($_POST['add'])) {
  // var_dump($_POST);
  // die();

  $kategori = nodos($_POST['kategori']);

  $query = "INSERT INTO
              kategori
            SET
              kategori = '$kategori'
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
  
  $kategori = nodos($_POST['kategori']);

  $query = "UPDATE
              kategori
            SET
              kategori = '$kategori'
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

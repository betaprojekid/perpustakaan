<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/config/connection.php';
require $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/helpers/helper.php';

$path = base_url();

if(isset($_POST['simpan'])){
  // print_r($_POST);
  // die;
  $nim = nodos($_POST['nim']);
  $nama = nodos($_POST['nama']);

  $query = "INSERT INTO
              kunjungan
            SET
              nim = '$nim',
              nama = '$nama'";

  $sql = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));

  if ($sql) {
    echo "
            <script>
                alert('Terima kasih telah mengisi form absensi, silahkan lanjut');
                document.location.href = '" . $path . "';
            </script>
        ";
    exit;
  }
}
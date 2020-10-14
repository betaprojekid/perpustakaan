<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/config/connection.php';
require $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/helpers/helper.php';

$path = base_url('admin/anggota');

if(isset($_POST['add'])){
  // var_dump($_POST);
  // die();

  $nim = nodos($_POST['nim']);
  $nama_lengkap = nodos($_POST['nama_lengkap']);
  $tempat_lahir = nodos($_POST['tempat_lahir']);
  $tanggal_lahir = nodos($_POST['tanggal_lahir']);
  $jenis_kelamin = nodos($_POST['jenis_kelamin']);
  $prodi = nodos($_POST['prodi']);

  $query = "INSERT INTO
              anggota
            SET
              prodi_id = '$prodi',
              nim = '$nim',
              nama_lengkap = '$nama_lengkap',
              tempat_lahir = '$tempat_lahir',
              tgl_lahir = '$tanggal_lahir',
              jk = '$jenis_kelamin'
            ";
  
  $sql = mysqli_query($conn, $query)or die("Error: " . mysqli_error($conn));

  if($sql){
    echo "
            <script>
                alert('data telah berhasil di simpan');
                document.location.href = '".$path."';
            </script>
        ";
        exit;
  }

}elseif(isset($_POST['edit'])){
  // var_dump($_POST);
  // die();
  $id = nodos($_POST['id']);
  $nim = nodos($_POST['nim']);
  $nama_lengkap = nodos($_POST['nama_lengkap']);
  $tempat_lahir = nodos($_POST['tempat_lahir']);
  $tanggal_lahir = nodos($_POST['tanggal_lahir']);
  $jenis_kelamin = nodos($_POST['jenis_kelamin']);
  $prodi = nodos($_POST['prodi']);
  $timestamp = date("Y-m-d H:i:s");

  $query = "UPDATE
              anggota
            SET
              prodi_id = '$prodi',
              nim = '$nim',
              nama_lengkap = '$nama_lengkap',
              tempat_lahir = '$tempat_lahir',
              tgl_lahir = '$tanggal_lahir',
              jk = '$jenis_kelamin',
              updated_at = '$timestamp'
            WHERE
              id = '$id'
            ";

  $sql = mysqli_query($conn, $query)or die("Error: " . mysqli_error($conn));

  if($sql){
    echo "
            <script>
                alert('data telah berhasil di simpan');
                document.location.href = '".$path."';
            </script>
        ";
        exit;
  }
}
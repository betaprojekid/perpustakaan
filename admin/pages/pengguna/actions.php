<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/config/connection.php';
require $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/helpers/helper.php';

$path = base_url('admin/pengguna');

if (isset($_POST['add'])) {
  // var_dump($_POST);
  // die();

  $username = nodos($_POST['username']);
  $nama = nodos($_POST['nama']);
  $email = nodos($_POST['email']);
  $password = nodos($_POST['password']);
  $level = nodos($_POST['level']);
  $aktif = nodos($_POST['aktif']);

  $cek_username = show_query("SELECT * FROM users WHERE username = '$username'");
  if ($cek_username) {
    echo "
            <script>
                alert('username telah ada. silahkan menggunakan username lain');
                document.location.href = '" . $path . "';
            </script>
        ";
    exit;
  }

  $cek_email = show_query("SELECT * FROM users WHERE email = '$email'");
  if ($cek_email) {
    echo "
            <script>
                alert('email tlah ada. silahkan menggunakan email lain');
                document.location.href = '" . $path . "';
            </script>
        ";
    exit;
  }

  if (strlen($password) <= 5) {
    echo "
    <script>
        alert('panjang password kurang dari 6 karakter');
        document.location.href = '" . $path . "';
    </script>
    ";
    exit;
  }

  $pass = md5($password);

  $query = "INSERT INTO
              users
            SET
              username = '$username',
              nama = '$nama',
              email = '$email',
              password = '$pass',
              level = '$level',
              aktif = '$aktif'
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

  $username = nodos($_POST['username']);
  $nama = nodos($_POST['nama']);
  $email = nodos($_POST['email']);
  $password = nodos($_POST['password']);
  $level = nodos($_POST['level']);
  $aktif = nodos($_POST['aktif']);

  $cek_username = show_query("SELECT * FROM users WHERE username = '$username' AND id != '$id'");
  if ($cek_username) {
    echo "
            <script>
                alert('username telah ada. silahkan menggunakan username lain');
                document.location.href = '" . $path . "';
            </script>
        ";
    exit;
  }

  $cek_email = show_query("SELECT * FROM users WHERE email = '$email' AND id != '$id'");
  if ($cek_email) {
    echo "
            <script>
                alert('email tlah ada. silahkan menggunakan email lain');
                document.location.href = '" . $path . "';
            </script>
        ";
    exit;
  }

  if (strlen($password) <= 5) {
    echo "
    <script>
        alert('panjang password kurang dari 6 karakter');
        document.location.href = '" . $path . "';
    </script>
    ";
    exit;
  }

  $pass = md5($password);

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

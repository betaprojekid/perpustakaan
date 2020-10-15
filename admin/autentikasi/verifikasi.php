<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/config/connection.php';
require $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/helpers/helper.php';

$path = base_url('login');
$admin = base_url('admin');

if(isset($_POST['login'])){
	
	// print_r($_POST);
	// die;
	
	// login kali ini mengugnakan email dlu
	$username = nodos($_POST['username']);
	$password = nodos($_POST['password']);
  $md5_password = md5($password);

  $cek_username = show_query("SELECT * FROM users WHERE username = '$username'");
  if($cek_username){
    if($md5_password === $cek_username['password']){
      if($cek_username['aktif'] === 'y'){
        $_SESSION['user'] = $cek_username;
        // print_r($_SESSION);
				header("location:" . $admin);
				exit;
      }else{
        echo "<script>
				alert('Akses Ditolak, akun anda belum aktif. silahkah hubungi administrator');
				document.location.href = '".$path."';
			</script>";
			exit;
      }
    }else{
      echo "<script>
				alert('Akses Ditolak, password salah');
				document.location.href = '".$path."';
			</script>";
			exit;
    }

  }else{
    echo "<script>
				alert('Akses Ditolak, pengguna tidak terdaftar');
				document.location.href = '".$path."';
			</script>";
			exit;
  }

	// cek username
	if(mysqli_num_rows($sql) === 1){

		// echo "username adakan";
		// cek pass

		$row = mysqli_fetch_assoc($sql);
		// print_r($row);
		// die;

		if(password_verify($password, $row['password'])){
			// echo "berhasil login";

			// cek status aktif atau tidak
			if($row['active'] === '1'){
				$_SESSION['user'] = $row;
				header("location: dashboard");
				exit;
			}
			else{
				echo "<script>
					alert('Akun anda belum aktif, silahkan melapor ke administrator untuk mengaktifkan akun anda');
					document.location.href = 'login';
				</script>";
				exit;
			}

			

		}
		else{
			echo "<script>
				alert('Akses Ditolak');
				document.location.href = 'login';
			</script>";
			exit;
		}
	}
	else{
		echo "<script>
				alert('Akses Ditolak');
				document.location.href = 'login';
			</script>";
		exit;
	}
}
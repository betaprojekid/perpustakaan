<?php  
// file autentikasi sederhna 
$path = base_url('login');
if(!isset($_SESSION['user'])){
	echo "<script>
				alert('Akses Ditolak ');
				document.location.href = '" . $path . "';
			</script>";
	exit();
}
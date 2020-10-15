<?php
// berisi file untuk logout aja
require $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/helpers/helper.php';
$path = base_url('login');

// print_r($path);
// exit();

session_start();
// cara menghancurkan session
// agar session tidak tertinggal d server 
// dan org lain tidak dapat mengaksesnya
$_SESSION = [];
session_unset();
session_destroy();
header('Location:' . $path);
exit();

// echo "tes tes";
<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';
$error = "File tidak ditemukan";

switch($page){
  // dashboard
  case 'dashboard':
    if(!file_exists("pages/dashboard/index.php"))die($error);
    include "pages/dashboard/index.php";
  break;

  
}
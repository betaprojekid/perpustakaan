<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';
$error = "File tidak ditemukan";

switch ($page) {

    // Modul Anggota
  case 'anggota':
    if (!file_exists("pages/anggota/index.php")) die($error);
    include "pages/anggota/index.php";
    break;

  case 'add-anggota':
    if (!file_exists("pages/anggota/add.php")) die($error);
    include "pages/anggota/add.php";
    break;


    // Modul Buku
  case 'buku':
    if (!file_exists("pages/buku/index.php")) die($error);
    include "pages/buku/index.php";
    break;

    // Modul Transaksi
  case 'transaksi':
    if (!file_exists("pages/transaksi/index.php")) die($error);
    include "pages/transaksi/index.php";
    break;

    // Modul laporan
  case 'laporan':
    if (!file_exists("pages/laporan/index.php")) die($error);
    include "pages/laporan/index.php";
    break;

    // Modul Pengaturan


    // dashboard
  default:
    if (!file_exists("pages/dashboard/index.php")) die($error);
    include "pages/dashboard/index.php";
    break;
}

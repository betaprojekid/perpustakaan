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

  case 'edit-anggota':
    if (!file_exists("pages/anggota/edit.php")) die($error);
    include "pages/anggota/edit.php";
    break;

  case 'hapus-anggota':
    if (!file_exists("pages/anggota/actions.php")) die($error);
    include "pages/anggota/actions.php";
    break;

    // case 'export-anggota':
    //   if (!file_exists("pages/anggota/export.php")) die($error);
    //   include "pages/anggota/export.php";
    //   break;

    // case 'view-anggota':
    //   if(!file_exists("pages/anggota/view.php")) die($error);
    //   include "pages/anggota/view.php";
    // break;

    // Modul Buku
  case 'buku':
    if (!file_exists("pages/buku/index.php")) die($error);
    include "pages/buku/index.php";
    break;

  case 'add-buku':
    if (!file_exists("pages/buku/add.php")) die($error);
    include "pages/buku/add.php";
    break;

  case 'edit-buku':
    if (!file_exists("pages/buku/edit.php")) die($error);
    include "pages/buku/edit.php";
    break;

  case 'hapus-buku':
    if (!file_exists("pages/buku/actions.php")) die($error);
    include "pages/buku/actions.php";
    break;

    // Modul kunjungan
  case 'kunjungan':
    if (!file_exists("pages/kunjungan/index.php")) die($error);
    include "pages/kunjungan/index.php";
    break;

    // Modul Transaksi
  case 'transaksi':
    if (!file_exists("pages/transaksi/index.php")) die($error);
    include "pages/transaksi/index.php";
    break;

  case 'add-transaksi':
    if (!file_exists("pages/transaksi/add.php")) die($error);
    include "pages/transaksi/add.php";
    break;

  case 'edit-transaksi':
    if (!file_exists("pages/transaksi/edit.php")) die($error);
    include "pages/transaksi/edit.php";
    break;

  case 'perpanjang-transaksi':
    if (!file_exists("pages/transaksi/actions.php")) die($error);
    include "pages/transaksi/actions.php";
    break;

  case 'kembali-transaksi':
    if (!file_exists("pages/transaksi/actions.php")) die($error);
    include "pages/transaksi/actions.php";
    break;

    // Modul laporan
    // case 'laporan':
    //   if (!file_exists("pages/laporan/index.php")) die($error);
    //   include "pages/laporan/index.php";
    //   break;
  case 'laporan-kunjungan':
    if (!file_exists("pages/laporan/kunjungan.php")) die($error);
    include "pages/laporan/kunjungan.php";
    break;

  case 'laporan-peminjaman':
    if (!file_exists("pages/laporan/peminjaman.php")) die($error);
    include "pages/laporan/peminjaman.php";
    break;

  case 'laporan-pengembalian':
    if (!file_exists("pages/laporan/pengembalian.php")) die($error);
    include "pages/laporan/pengembalian.php";
    break;

  case 'laporan-sanksi':
    if (!file_exists("pages/laporan/sanksi.php")) die($error);
    include "pages/laporan/sanksi.php";
    break;


    // Modul Pengaturan
    // prodi
  case 'prodi':
    if (!file_exists("pages/prodi/index.php")) die($error);
    include "pages/prodi/index.php";
    break;

  case 'add-prodi':
    if (!file_exists("pages/prodi/add.php")) die($error);
    include "pages/prodi/add.php";
    break;

  case 'edit-prodi':
    if (!file_exists("pages/prodi/edit.php")) die($error);
    include "pages/prodi/edit.php";
    break;

    // kategori
  case 'kategori':
    if (!file_exists("pages/kategori/index.php")) die($error);
    include "pages/kategori/index.php";
    break;

  case 'add-kategori':
    if (!file_exists("pages/kategori/add.php")) die($error);
    include "pages/kategori/add.php";
    break;

  case 'edit-kategori':
    if (!file_exists("pages/kategori/edit.php")) die($error);
    include "pages/kategori/edit.php";
    break;

    // lokasi
  case 'lokasi':
    if (!file_exists("pages/lokasi/index.php")) die($error);
    include "pages/lokasi/index.php";
    break;

  case 'add-lokasi':
    if (!file_exists("pages/lokasi/add.php")) die($error);
    include "pages/lokasi/add.php";
    break;

  case 'edit-lokasi':
    if (!file_exists("pages/lokasi/edit.php")) die($error);
    include "pages/lokasi/edit.php";
    break;

    // pengguna
  case 'pengguna':
    if (!file_exists("pages/pengguna/index.php")) die($error);
    include "pages/pengguna/index.php";
    break;

  case 'add-pengguna':
    if (!file_exists("pages/pengguna/add.php")) die($error);
    include "pages/pengguna/add.php";
    break;

  case 'edit-pengguna':
    if (!file_exists("pages/pengguna/edit.php")) die($error);
    include "pages/pengguna/edit.php";
    break;

  case 'hapus-pengguna':
    if (!file_exists("pages/pengguna/actions.php")) die($error);
    include "pages/pengguna/actions.php";
    break;


    // dashboard
  default:
    if (!file_exists("pages/dashboard/index.php")) die($error);
    include "pages/dashboard/index.php";
    break;
}

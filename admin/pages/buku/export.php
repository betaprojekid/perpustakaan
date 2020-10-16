<?php
require $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/config/connection.php';
require $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/helpers/helper.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$Excel_writer = new Xlsx($spreadsheet);

$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();

$activeSheet->setCellValue('A1', 'Judul');
$activeSheet->setCellValue('B1', 'Kode');
$activeSheet->setCellValue('C1', 'ISBN');
$activeSheet->setCellValue('D1', 'Kategori');
$activeSheet->setCellValue('E1', 'Pengarang');
$activeSheet->setCellValue('F1', 'Penerbit');
$activeSheet->setCellValue('G1', 'Tahun Terbit');
$activeSheet->setCellValue('H1', 'Stok');
$activeSheet->setCellValue('I1', 'Lokasi');

$query = "SELECT
              buku.*,
              kategori.kategori,
              lokasi_buku.lokasi
          FROM
              buku
          JOIN kategori ON kategori.id = buku.kategori_id
          JOIN lokasi_buku on lokasi_buku.id = buku.lokasi_buku_id
          ORDER BY
            buku.id
          ASC";
$sql = mysqli_query($conn, $query)or die("Error: " . mysqli_error($conn));

if(mysqli_num_rows($sql) > 0){
  $i=2;
  while($row = mysqli_fetch_assoc($sql)){
    $activeSheet->setCellValue('A'.$i , $row['judul']);
    $activeSheet->setCellValue('B'.$i , $row['kode_buku']);
    $activeSheet->setCellValue('C'.$i , $row['isbn']);
    $activeSheet->setCellValue('D'.$i , $row['kategori']);
    $activeSheet->setCellValue('E'.$i , $row['pengarang']);
    $activeSheet->setCellValue('F'.$i , $row['penerbit']);
    $activeSheet->setCellValue('G'.$i , $row['tahun_terbit']);
    $activeSheet->setCellValue('H'.$i , $row['jumlah_buku']);
    $activeSheet->setCellValue('I'.$i , $row['lokasi']);
    $i++;
  }
}

$filename = 'buku.xlsx';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='. $filename);
header('Cache-Control: max-age=0');
$Excel_writer->save('php://output');
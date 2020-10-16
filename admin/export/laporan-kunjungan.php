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


$waktu = $_GET['waktu'];

// var_dump($waktu);
// die();

$activeSheet->setCellValue('A1', 'NIM');
$activeSheet->setCellValue('B1', 'Nama Lengkap');
$activeSheet->setCellValue('C1', 'Waktu Kunjungan');

switch ($waktu) {
  case 'today':
    $query = "SELECT * FROM kunjungan WHERE DAY(created_at)=DAY(NOW())";
    $ket = 'harian';
    break;
  case 'week':
    $query = "SELECT * FROM kunjungan WHERE WEEK(created_at)=WEEK(NOW())";
    $ket = 'mingguan';
    break;
  case 'month':
    $query = "SELECT * FROM kunjungan WHERE MONTH(created_at)=MONTH(NOW())";
    $ket = 'bulanan';
    break;
  default:
    $query = "SELECT * FROM kunjungan ORDER BY id ASC";
    $ket = 'seluruh';
    break;
}

$sql = mysqli_query($conn, $query)or die("Error: " . mysqli_error($conn));


if(mysqli_num_rows($sql) > 0){
  $i=2;
  while($row = mysqli_fetch_assoc($sql)){
    $activeSheet->setCellValue('A'.$i , $row['nim']);
    $activeSheet->setCellValue('B'.$i , $row['nama']);
    $activeSheet->setCellValue('C'.$i , $row['created_at']);
    $i++;
  }
}

$filename = 'laporan-kunjungan-' . $ket . '.xlsx';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='. $filename);
header('Cache-Control: max-age=0');
$Excel_writer->save('php://output');
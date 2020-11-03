<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/config/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/helpers/helper.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();


$waktu = $_GET['waktu'];

// var_dump($waktu);
// die();


$activeSheet->setCellValue('A1', 'NIM');
$activeSheet->setCellValue('B1', 'Nama Lengkap');
$activeSheet->setCellValue('C1', 'Waktu Kunjungan');

include "format-laporan.php";
$spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($styleArray);

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
    $activeSheet->setCellValue('C'.$i , date("d-m-Y H:i:s", strtotime($row['created_at'])));
    $i++;
  }
}

$activeSheet->getColumnDimension('A')->setAutoSize(true);
$activeSheet->getColumnDimension('B')->setAutoSize(true);
$activeSheet->getColumnDimension('C')->setAutoSize(true);

$filename = 'laporan-kunjungan-' . $ket . '-' . date('dmYhis') . '.xlsx';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename=' . $filename);
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

$writer = IOFactory::createWriter($spreadsheet, 'Xls');
ob_end_clean();
$writer->save('php://output');
exit;
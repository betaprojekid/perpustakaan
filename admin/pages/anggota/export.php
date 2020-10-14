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

$activeSheet->setCellValue('A1', 'NIM');
$activeSheet->setCellValue('B1', 'Nama Lengkap');
$activeSheet->setCellValue('C1', 'Jenis Kelamin');
$activeSheet->setCellValue('D1', 'Tempat Lahir');
$activeSheet->setCellValue('E1', 'Tanggal Lahir');
$activeSheet->setCellValue('F1', 'Program Studi');

$query = 'SELECT
              anggota.*,
              prodi.prodi
          FROM
              anggota
          JOIN prodi ON prodi.id = anggota.prodi_id';
$sql = mysqli_query($conn, $query)or die("Error: " . mysqli_error($conn));

if(mysqli_num_rows($sql) > 0){
  $i=2;
  while($row = mysqli_fetch_assoc($sql)){
    $activeSheet->setCellValue('A'.$i , $row['nim']);
    $activeSheet->setCellValue('B'.$i , $row['nama_lengkap']);
    $activeSheet->setCellValue('C'.$i , $row['jk']);
    $activeSheet->setCellValue('D'.$i , $row['tempat_lahir']);
    $activeSheet->setCellValue('E'.$i , $row['tgl_lahir']);
    $activeSheet->setCellValue('F'.$i , $row['prodi']);
    $i++;
  }
}

$filename = 'anggota.xlsx';


header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='. $filename);
header('Cache-Control: max-age=0');
$Excel_writer->save('php://output');
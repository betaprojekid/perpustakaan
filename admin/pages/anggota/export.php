<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/config/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/helpers/helper.php';

// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$spreadsheet = new Spreadsheet();
// $Excel_writer = new Xlsx($spreadsheet);

$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();

$activeSheet->setCellValue('A1', 'NIM');
$activeSheet->setCellValue('B1', 'Nama Lengkap');
$activeSheet->setCellValue('C1', 'Jenis Kelamin');
$activeSheet->setCellValue('D1', 'Tempat Lahir');
$activeSheet->setCellValue('E1', 'Tanggal Lahir');
$activeSheet->setCellValue('F1', 'Program Studi');
$activeSheet->setCellValue('G1', 'Tanggal Bergabung');

$styleArray = [
  'font' => [
      'bold' => true,
  ],
  'alignment' => [
      'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
  ],
  'borders' => [
      'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
      ],
  ],
  'fill' => [
      'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
      'rotation' => 90,
      'startColor' => [
          'argb' => 'FFA0A0A0',
      ],
      'endColor' => [
          'argb' => 'FFFFFFFF',
      ],
  ],
];

$spreadsheet->getActiveSheet()->getStyle('A1:G1')->applyFromArray($styleArray);

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
    $activeSheet->setCellValue('G'.$i , date("d-m-Y", strtotime($row['created_at'])));
    $i++;
  }
}

$activeSheet->getColumnDimension('A')->setAutoSize(true);
$activeSheet->getColumnDimension('B')->setAutoSize(true);
$activeSheet->getColumnDimension('C')->setAutoSize(true);
$activeSheet->getColumnDimension('D')->setAutoSize(true);
$activeSheet->getColumnDimension('E')->setAutoSize(true);
$activeSheet->getColumnDimension('F')->setAutoSize(true);
$activeSheet->getColumnDimension('G')->setAutoSize(true);

$filename = 'laporan-anggota-' . date('dmyhis') . '.xlsx';


header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename=' . $filename);
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

$writer = IOFactory::createWriter($spreadsheet, 'Xls');
ob_end_clean();
$writer->save('php://output');
exit;
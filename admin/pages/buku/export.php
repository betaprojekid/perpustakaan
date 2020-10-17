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

$activeSheet->setCellValue('A1', 'Judul');
$activeSheet->setCellValue('B1', 'Kode');
$activeSheet->setCellValue('C1', 'ISBN');
$activeSheet->setCellValue('D1', 'Kategori');
$activeSheet->setCellValue('E1', 'Pengarang');
$activeSheet->setCellValue('F1', 'Penerbit');
$activeSheet->setCellValue('G1', 'Tahun Terbit');
$activeSheet->setCellValue('H1', 'Stok');
$activeSheet->setCellValue('I1', 'Lokasi');

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

$spreadsheet->getActiveSheet()->getStyle('A1:I1')->applyFromArray($styleArray);

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
$sql = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));

if (mysqli_num_rows($sql) > 0) {
  $i = 2;
  while ($row = mysqli_fetch_assoc($sql)) {
    $activeSheet->setCellValue('A' . $i, $row['judul']);
    $activeSheet->setCellValue('B' . $i, $row['kode_buku']);
    $activeSheet->setCellValue('C' . $i, $row['isbn']);
    $activeSheet->setCellValue('D' . $i, $row['kategori']);
    $activeSheet->setCellValue('E' . $i, $row['pengarang']);
    $activeSheet->setCellValue('F' . $i, $row['penerbit']);
    $activeSheet->setCellValue('G' . $i, $row['tahun_terbit']);
    $activeSheet->setCellValue('H' . $i, $row['jumlah_buku']);
    $activeSheet->setCellValue('I' . $i, $row['lokasi']);
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
$activeSheet->getColumnDimension('H')->setAutoSize(true);
$activeSheet->getColumnDimension('I')->setAutoSize(true);


$filename = 'laporan-buku-' . date('dmyhis') . '.xls';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename=' . $filename);
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// $Excel_writer->save('php://output');
// exit();

$writer = IOFactory::createWriter($spreadsheet, 'Xls');
ob_end_clean();
$writer->save('php://output');
exit;

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/config/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/helpers/helper.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();

$activeSheet->setCellValue('A1', 'NIM');
$activeSheet->setCellValue('B1', 'Nama Lengkap');
$activeSheet->setCellValue('C1', 'Judul Buku');
$activeSheet->setCellValue('D1', 'Tanggal Peminjaman');


include "format-laporan.php";
$spreadsheet->getActiveSheet()->getStyle('A1:D1')->applyFromArray($styleArray);

$waktu = $_GET['waktu'];
switch ($waktu) {
  case 'today':
    $query = "SELECT
                transaksi.*,
                buku.judul,
                anggota.nama_lengkap,
                anggota.nim
              FROM
                transaksi
              JOIN buku ON buku.id = transaksi.buku_id
              JOIN anggota ON anggota.id = transaksi.anggota_id
              WHERE
                status = 'pinjam'
                AND
                DAY(transaksi.created_at)=DAY(NOW())
              ORDER BY
                created_at ASC ";
    $ket = 'harian';
    break;
  case 'week':
   $query = "SELECT
                transaksi.*,
                buku.judul,
                anggota.nama_lengkap,
                anggota.nim
              FROM
                transaksi
              JOIN buku ON buku.id = transaksi.buku_id
              JOIN anggota ON anggota.id = transaksi.anggota_id
              WHERE
                status = 'pinjam'
                AND
                WEEK(transaksi.created_at)=WEEK(NOW())
              ORDER BY
                created_at ASC ";
    $ket = 'mingguan';
    break;
  case 'month':
    $query = "SELECT
                transaksi.*,
                buku.judul,
                anggota.nama_lengkap,
                anggota.nim
              FROM
                transaksi
              JOIN buku ON buku.id = transaksi.buku_id
              JOIN anggota ON anggota.id = transaksi.anggota_id
              WHERE
                status = 'pinjam'
                AND
                MONTH(transaksi.created_at)=MONTH(NOW())
              ORDER BY
                created_at ASC ";
    $ket = 'bulanan';
    break;
  default:
  $query = "SELECT
              transaksi.*,
              buku.judul,
              anggota.nama_lengkap,
              anggota.nim
            FROM
              transaksi
            JOIN buku ON buku.id = transaksi.buku_id
            JOIN anggota ON anggota.id = transaksi.anggota_id
            WHERE
              status = 'pinjam'
            ORDER BY
              created_at ASC";
    $ket = 'seluruh';
    break;
}

$sql = mysqli_query($conn, $query)or die("Error: " . mysqli_error($conn));


if(mysqli_num_rows($sql) > 0){
  $i=2;
  while($row = mysqli_fetch_assoc($sql)){
    $activeSheet->setCellValue('A'.$i , $row['nim']);
    $activeSheet->setCellValue('B'.$i , $row['nama_lengkap']);
    $activeSheet->setCellValue('C'.$i , $row['judul']);
    $activeSheet->setCellValue('D'.$i , date("d-m-Y", strtotime($row['tgl_pinjam'])));
    $i++;
  }
}

$activeSheet->getColumnDimension('A')->setAutoSize(true);
$activeSheet->getColumnDimension('B')->setAutoSize(true);
$activeSheet->getColumnDimension('C')->setAutoSize(true);
$activeSheet->getColumnDimension('D')->setAutoSize(true);

$filename = 'laporan-peminjaman-buku-' . $ket . '-' . date('dmYhis') . '.xlsx';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename=' . $filename);
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

$writer = IOFactory::createWriter($spreadsheet, 'Xls');
ob_end_clean();
$writer->save('php://output');
exit;
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
$activeSheet->setCellValue('E1', 'Tanggal Berakhir');
$activeSheet->setCellValue('F1', 'Tanggal Kembali');
$activeSheet->setCellValue('G1', 'Denda');
$activeSheet->setCellValue('H1', 'Keterangan');


include "format-laporan.php";
$spreadsheet->getActiveSheet()->getStyle('A1:E1')->applyFromArray($styleArray);

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
                status = 'kembali'
                AND
                denda > 0 AND
                DAY(transaksi.tgl_kembali=DAY(NOW())
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
                status = 'kembali'
                AND
                denda > 0 AND
                WEEK(transaksi.tgl_kembali)=WEEK(NOW())
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
                status = 'kembali'
                AND
                denda > 0 AND
                MONTH(transaksi.tgl_kembali)=MONTH(NOW())
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
              status = 'kembali' AND
              denda > 0
            ORDER BY
              created_at ASC";
    $ket = 'seluruh';
    break;
}

$sql = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));


if (mysqli_num_rows($sql) > 0) {
  $i = 2;
  while ($row = mysqli_fetch_assoc($sql)) {
    $activeSheet->setCellValue('A' . $i, $row['nim']);
    $activeSheet->setCellValue('B' . $i, $row['nama_lengkap']);
    $activeSheet->setCellValue('C' . $i, $row['judul']);
    $activeSheet->setCellValue('D' . $i, date("d-m-Y", strtotime($row['tgl_pinjam'])));
    $activeSheet->setCellValue('E' . $i, date("d-m-Y", strtotime($row['tgl_berakhir'])));
    $activeSheet->setCellValue('F' . $i, date("d-m-Y", strtotime($row['tgl_kembali'])));
    $activeSheet->setCellValue('G' . $i, $row['denda']);
    $activeSheet->setCellValue('H' . $i, $row['keterangan']);
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

$filename = 'laporan-denda-' . $ket . '-' . date('dmYhis') . '.xlsx';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename=' . $filename);
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

$writer = IOFactory::createWriter($spreadsheet, 'Xls');
ob_end_clean();
$writer->save('php://output');
exit;

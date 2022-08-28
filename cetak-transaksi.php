<?php
include 'koneksi.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Laporan data Transaksi Perpustakaan');
$sheet->setCellValue('B2', 'No');
$sheet->setCellValue('C2', 'Nama Anggota');
$sheet->setCellValue('D2', 'Judul Buku');
$sheet->setCellValue('E2', 'Tanggal Pinjam');
$sheet->setCellValue('F2', 'Tanggal Kembali');
$sheet->setCellValue('G2', 'Tanggal Kembali Asli');
$transaksi = mysqli_query($koneksi, "SELECT anggota.nama, buku.judul, transaksi.* FROM anggota join transaksi ON anggota.id_anggota = transaksi.id_anggota JOIN buku ON buku.id_buku = transaksi.id_buku") or die(mysqli_error($koneksi));
$total = mysqli_num_rows($transaksi);
$baris = 3;
$no = 1;
foreach ($transaksi as $key => $value) {
    $tgl_kembali = ($value['tanggal_kembali'] == null) ? "Belum dikembalikan" : $value['tanggal_kembali'];
    $sheet->setCellValue('B' . $baris, $no);
    $sheet->setCellValue('C' . $baris, $value['nama']);
    $sheet->setCellValue('D' . $baris, $value['judul']);
    $sheet->setCellValue('E' . $baris, $value['tanggal_pinjam']);
    $sheet->setCellValue('F' . $baris, $tgl_kembali);
    $sheet->setCellValue('G' . $baris, $value['tanggal_kembali_asli']);
    $no++;
    $baris++;
}
$footer = $baris + 2;
$sheet->setCellValue('A' . $baris, "Total anggota $total");
$writer = new Xlsx($spreadsheet);
$writer->save('data-anggota.xlsx');
header('location:data-anggota.xlsx');

<?php
include "koneksi.php";
$id_anggota = @$_POST['nama'];
$id_buku = @$_POST['buku'];
$tanggal_pinjam = @$_POST['tanggal_pinjam'];
$tanggal_kembali = @$_POST['tanggal_kembali'];
$tanggal_kembali_asli = @$_POST['tanggal_kembali_asli'];
if (@$_POST['id']) {
    $id = $_POST['id'];
    $query = " UPDATE transaksi SET
        id_anggota = '$id_anggota',
        id_buku = '$id_buku',
        tanggal_pinjam = '$tanggal_pinjam',
        tanggal_kembali = '$tanggal_kembali',
        tanggal_kembali_asli = '$tanggal_kembali_asli'
        WHERE id_transaksi = '$id'";
    mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    // header('location:tampil-transaksi.php?update=sukses');
} elseif (@$_GET['id']) {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '$id'") or die(mysqli_error($koneksi));
    header('location:tampil-buku.php?delete=sukses');
} else {
    $query = "INSERT INTO transaksi (id_anggota, id_buku, tanggal_pinjam, tanggal_kembali_asli) VALUES ('$id_anggota','$id_buku','$tanggal_pinjam','$tanggal_kembali_asli')";
    mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    header('location:tampil-buku.php?tambah=sukses');
}

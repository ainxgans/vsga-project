<?php
include "koneksi.php";
$id_anggota = @$_POST['id_anggota'];
$id_buku = @$_POST['id_buku'];
$tanggal_pinjam = @$_POST['tanggal_pinjam'];
$tanggal_kembali_asli = @$_POST['tanggal_kembali_asli'];
$tanggal_kembali = @$_POST['tanggal_kembali'];
if (@$_POST['id']) {
    $id = $_POST['id'];
    $query = " UPDATE transaksi SET
        id_anggota = '$id_anggota',
        id_buku = '$id_buku',
        tanggal_pinjam = '$tanggal_pinjam',
        tanggal_kembali_asli = '$tanggal_kembali_asli',
        tanggal_kembali = '$tanggal_kembali',
        WHERE id_transaksi = '$id'";
    echo "<pre>";
    var_dump($query);
    echo "</pre>";
    mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    header('location:tampil-buku.php?update=sukses');
} elseif (@$_GET['id']) {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '$id'") or die(mysqli_error($koneksi));
    header('location:tampil-buku.php?delete=sukses');
} else {
    $query = "INSERT INTO transaksi (id_anggota, id_buku, tanggal_pinjam, tanggal_kembali_asli, tanggal_kembali) VALUES ('$id_anggota','$id_buku','$tanggal_pinjam','$tanggal_kembali_asli', '$tanggal_kembali')";
    mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    header('location:tampil-buku.php?tambah=sukses');
}

?>
// if (isset($_POST['submit'])) {
// $id_anggota = @$_POST['nama'];
// $id_buku = @$_POST['buku'];
// $tgl_pinjam = @$_POST['tanggal_pinjam'];
// $tgl_kembali_asli = @$_POST['tanggal_kembali_asli'];
// $query = mysqli_query($koneksi, "INSERT INTO transaksi (id_anggota, id_buku, tanggal_pinjam, tanggal_kembali_asli) VALUES ('$id_anggota','$id_buku','$tgl_pinjam','$tgl_kembali_asli')");
// header("location:tampil-transaksi.php");
// }
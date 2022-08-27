<?php
include 'koneksi.php';
$kode_anggota = @$_POST['kode_anggota'];
$nama = @$_POST['nama'];
$email = @$_POST['email'];
$telp = @$_POST['telp'];
$alamat = @$_POST['alamat'];
$jenis_kelamin = @$_POST['jenis_kelamin'];
if (@$_POST['id']) {
    $id = $_POST['id'];
    // jika ada file yang diupload
    if (@$_FILES['foto']['name']) {
        $tmp_foto = explode(".", $_FILES['foto']['name']);
        $foto = $kode_anggota . '.' . $tmp_foto[1];
        $new_foto = 'image/' . $foto;
        move_uploaded_file($_FILES['foto']['tmp_name'], $new_foto);
    } else {
        $foto = '';
    }
    $query = " UPDATE anggota SET
            kode_anggota = '$kode_anggota',
            nama = '$nama',
            email = '$email',
            telp = '$telp',
            alamat = '$alamat',
            foto = '$foto',
            jenis_kelamin = '$jenis_kelamin'
            WHERE id_anggota = '$id'";
    mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    header('location:tampil-anggota.php?update=sukses');
} elseif (@$_GET['id']) {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota = '$id'") or die(mysqli_error($koneksi));
    header('location:tampil-anggota.php?delete=sukses');
} else {
    if (@$_FILES['foto']['name']) {
        $tmp_foto = explode(".", $_FILES['foto']['name']);
        $foto = $kode_anggota . '.' . $tmp_foto[1];
        $new_foto = 'image/' . $foto;
        move_uploaded_file($_FILES['foto']['tmp_name'], $new_foto);
    } else {
        $foto = '';
    }
    $query = "INSERT INTO anggota (nama,kode_anggota,email,telp,alamat, foto, jenis_kelamin) VALUES ('$nama', '$kode_anggota', '$email', '$telp', '$alamat', '$foto', '$jenis_kelamin')";
    mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    header('location:tampil-anggota.php?tambah=sukses');
}

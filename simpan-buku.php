<?php
    include 'koneksi.php';
    $kode_buku = @$_POST['kode_buku'];
    $judul = @$_POST['judul'];
    $keterangan = @$_POST['keterangan'];
    $pengarang = @$_POST['pengarang'];
    $penerbit = @$_POST['penerbit'];
    $tahun = @$_POST['tahun'];
    if (@$_POST['id']) {
        $id = $_POST['id'];
        $query = " UPDATE buku SET
            judul = '$judul',
            kode_buku = '$kode_buku',
            keterangan = '$keterangan',
            pengarang = '$pengarang',
            penerbit = '$penerbit',
            tahun = '$tahun'
            WHERE id_buku = '$id'";
        mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        header('location:tampil-buku.php?update=sukses');
    }
    elseif (@$_GET['id']) {
        $id = $_GET['id'];
        mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku = '$id'") or die(mysqli_error($koneksi));
        header('location:tampil-buku.php?delete=sukses');
    }else {
        $query = "INSERT INTO buku (judul,kode_buku,keterangan,pengarang,penerbit, tahun) VALUES ('$judul', '$kode_buku', '$keterangan', '$pengarang', '$penerbit', '$tahun')";
        mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        header('location:tampil-buku.php?tambah=sukses');
    }

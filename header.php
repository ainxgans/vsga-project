<?php
session_start();
if (@$_SESSION['sesi'] == null) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <title>SIM Perpus</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a href="index.php" class="navbar-brand">SIM Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link">Beranda <span class="sr-only">(current)</span> </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggler" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Master</a>
                        <div class="dropdown-menu">
                            <a href="tampil-anggota.php" class="dropdown-item">Anggota</a>
                            <a href="tampil-buku.php" class="dropdown-item">Buku</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="tampil-transaksi.php" class="nav-link">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Laporan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php include 'header.php' ?>
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Hello, <?= $_SESSION['sesi']?> </h1>
        <p class="lead">Selamat datang di Sistem Informasi Perpustakaan Kampus</p>
        <hr class="my-4">
        <p>Klik tombol di bawah ini untuk membuat transaksi baru</p>
        <a href="tambah-mahasiswa.php" class="btn btn-primary btn-lg"><i class="bi bi-person-fill"></i> Tambah Anggota</a>
        <a href="tambah-buku.php" class="btn btn-info btn-lg"><i class="bi bi-book-fill"></i> Tambah Buku</a>
        <a href="tambah-transaksi.php" class="btn btn-success btn-lg"><i class="bi bi-journal-text"></i> Tambah Transaksi</a>
    </div>
</div>
<?php include 'footer.php' ?>
<?php include 'header.php' ?>
<div class="container">
    <div class="card card-light">
        <div class="card-body">
            <h1>Data Transaksi </h1>
            <a href="tambah-transaksi.php" class="btn btn-primary">Tambah Data</a>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="cetak-transaksi.php" class="btn btn-success" target="_blank">Print</a>
            </div>
            <br><br>
            <?php
            if (@$_GET['tambah'] == 'sukses') {
                $color = 'success';
                $msg = 'Data Transaksi berhasil di tambah';
            } elseif (@$_GET['update'] == 'sukses') {
                $color = 'info';
                $msg = 'Data Transaksi berhasil diubah';
            } elseif (@$_GET['delete'] == 'sukses') {
                $color = 'danger';
                $msg = 'Data Transaksi berhasil dihapus';
            } else {
                $msg = '';
            }
            include 'koneksi.php';
            $limit = 4;
            if (@$_GET['hal'] == '') {
                $offset = 0;
                $hal = 1;
                $no = 1;
            } else {
                $offset = ($_GET['hal'] - 1) * $limit;
                $hal = $_GET['hal'];
                $no = $offset + 1;
            }
            if (@$_POST['cari']) {
                $cari = $_POST['cari'];
                $buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE
                nama LIKE '%$cari%' OR
                nim LIKE '%$cari%' OR
                email LIKE '%$cari%' OR
                telp LIKE '%$cari%' ORDER BY nama ASC") or die(mysqli_error($koneksi));
            } else {
                $buku = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY nama ASC");
            }
            if ($msg != '') {
            ?>
                <div class="alert alert-<?= $color ?> alert-dismissible fade show" role="alert">
                    <?= $msg ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <table class="table table-sm table-striped">
                <tr>
                    <th>No</th>
                    <th>(ID) Nama</th>
                    <th>(ID) Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Tanggal Kembali Asli</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $transaksi = mysqli_query($koneksi, "select anggota.nama, buku.judul, transaksi.* FROM anggota join transaksi ON anggota.id_anggota = transaksi.id_anggota JOIN buku ON buku.id_buku = transaksi.id_buku") or die(mysqli_error($koneksi));
                $total = mysqli_num_rows($transaksi);
                foreach ($transaksi as $key => $value) {
                    $tgl_kembali = ($value['tanggal_kembali'] == null) ? "Belum dikembalikan" : $value['tanggal_kembali'];
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td>(<?= $value['id_anggota'] ?>) <?= $value['nama'] ?></td>
                        <td>(<?= $value['id_buku'] ?>) <?= $value['judul'] ?></td>
                        <td><?= $value['tanggal_pinjam'] ?></td>
                        <td><?= $tgl_kembali ?></td>
                        <td><?= $value['tanggal_kembali_asli'] ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="tambah-transaksi.php?id_transaksi=<?= $value['id_transaksi'] ?>" class="btn btn-info">Edit</a>
                            </div>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </table>
            <p>Total data : <?= $total ?></p>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    $jml_hal = ceil($total / $limit);
                    for ($i = 1; $i < $jml_hal; $i++) {
                        if ($i != $hal) {
                    ?>
                            <li class="page-item"><a href="tampil.php?hal=<?= $i ?>" class="page-link"><? -$i ?></a></li>
                        <?php
                        } else {
                        ?>
                            <li class="page-item active">
                                <a href="<?= $i ?>" class="page-link"><?= $i ?></a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>
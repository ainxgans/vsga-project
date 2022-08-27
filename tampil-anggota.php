<?php include 'header.php' ?>
<div class="container">
    <div class="card card-light">
        <div class="card-body">
            <h1>Data Anggota</h1>
            <a href="tambah-anggota.php" class="btn btn-primary">Tambah Data</a>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="anggota-print-excel.php" class="btn btn-success" target="_blank">Print</a>
                <a href="anggota-print.php" class="btn btn-info"></a>
            </div>
            <br><br>
            <?php
            if (@$_GET['status'] == 'tambah') {
                $color = 'success';
                $msg = 'Data mahasiswa berhasil di tambah';
            } elseif (@$_GET['status'] == 'update') {
                $color = 'info';
                $msg = 'Data mahasiswa berhasil diubah';
            } elseif (@$_GET['status'] == 'delete') {
                $color = 'danger';
                $msg = 'Data mahasiswa berhasil dihapus';
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
                $anggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE
                nama LIKE '%$cari%' ORDER BY nama ASC") or die(mysqli_error($koneksi));
            } else {
                $anggota = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY nama ASC");
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
            <form class="form-inline" method="POST" action="">
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" placeholder="Masukkan Nama di sini" name="cari">
                </div>
                <button type="submit" class="btn btn-primary mb-2" 1>Cari</button>
            </form>
            <table class="table table-sm table-striped">
                <tr>
                    <th>No</th>
                    <th>Kode Anggota</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Telp</th>
                    <th>Alamat</th>
                    <th>Menu</th>
                </tr>
                <?php
                $total = mysqli_num_rows($anggota);
                include 'fungsi.php';
                foreach ($anggota as $key => $value) {
                    $jk = ($value['jenis_kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan';
                    $foto = ($value['foto'] == '') ? 'no-picture.jpg' : $value['foto'];
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $value['kode_anggota'] ?></td>
                        <td><img src="image/<?= $foto ?>" width="75"> </td>
                        <td><?= $value['nama'] ?></td>
                        <td><?= $jk ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['telp'] ?></td>
                        <td><?= $value['alamat'] ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="anggota-kartu.php?id=<?= $value['id_anggota'] ?>" class="btn btn-warning" target="_blank">Kartu</a>
                                <a href="tambah-anggota.php?id=<?= $value['id_anggota'] ?>" class="btn btn-info">Edit</a>
                                <a href="simpan-anggota.php?id=<?= $value['id_anggota'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Delete</a>
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
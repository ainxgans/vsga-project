<?php
include "header.php";
include "koneksi.php";
$anggota = mysqli_query($koneksi, "SELECT id_anggota, nama FROM anggota ORDER BY nama ASC");
$buku = mysqli_query($koneksi, "SELECT id_buku, kode_buku, judul FROM buku ORDER BY judul ASC");
if (@$_GET['id_transaksi']) {
    $id = $_GET['id_transaksi'];
    $query = mysqli_query($koneksi, "select anggota.nama, buku.judul, transaksi.* FROM anggota join transaksi ON anggota.id_anggota = transaksi.id_anggota JOIN buku ON buku.id_buku = transaksi.id_buku");
    $edit = mysqli_fetch_array($query);
}
?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <?php $judul = (@$_GET['id_transaksi']) ? "Edit Transaksi" : "Tambah Transaksi";
            ?>
            <h1 class="mb-5 font-weight-bold"><?php echo $judul ?></h1>
            <form action="simpan-transaksi.php" method="POST">
                <div class="form-group">
                    <label for="nama">Nama Anggota</label>
                    <select name="nama" class="anggota custom-select">
                        <option hidden selected value="<?= @$edit['id_anggota'] ?>"><?= @$edit['nama'] ?></option>
                        <?php foreach ($anggota as $key => $value) { ?>
                            <option value="<?= $value['id_anggota'] ?>"><?= $value['nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="buku">Judul Buku</label>
                    <select name="buku" class="buku custom-select">
                        <option hidden selected value="<?= @$edit['id_buku'] ?>"><?= @$edit['judul'] ?></option>
                        <?php foreach ($buku as $key => $value) { ?>
                            <option value="<?= $value['id_buku'] ?>"><?= $value['kode_buku'] ?> | <?= $value['judul'] ?></option>
                        <?php } ?>
                    </select>

                </div>
                <div class="from-group">
                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                    <input class="form-control" type="date" name="tanggal_pinjam" value="<?= @$edit['tanggal_pinjam'] ?>">
                </div>
                <div class="form-group">
                    <label for="tanggal_kembali_asli">Tanggal Kembali Asli</label>
                    <input class="form-control" type="date" name="tanggal_kembali_asli" value="<?= @$edit['tanggal_kembali_asli'] ?>">
                </div>
                <?php
                if (@$_GET['id_transaksi']) {
                ?>
                    <div class="form-group">
                        <label for="tanggal_kembali">Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali" class="form-control">
                    </div>
                <?php } ?>
                <input type="hidden" name="id" value="<?= @$_GET['id_transaksi'] ?>">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>

            </form>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
<script>
    $(document).ready(function() {
        $('.anggota').select2({});
        $('.buku').select2({
            placeholder: "Masukkan Nama Buku",
        });

    });
</script>
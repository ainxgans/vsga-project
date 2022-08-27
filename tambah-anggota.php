<?php include 'header.php' ?>
<div class="container">
    <div class="card bg-light">
        <div class="card-body">
            <h1>Tambah Data Anggota</h1>
            <?php
            if (@$_GET['id']) {
                $id = $_GET['id'];
                include 'koneksi.php';
                $query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota= '$id'") or die(mysqli_error($koneksi));
                $anggota = mysqli_fetch_array($query);
            }

            ?>
            <form method="POST" action="simpan-anggota.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="kode_anggota">Kode Anggota</label>
                    <input class="form-control" type="text" name="kode_anggota" value="<?= @$anggota['kode_anggota'] ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input class="form-control" type="text" name="nama" value="<?= @$anggota['nama'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" value="<?= @$anggota['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="telp">Telepon</label>
                    <input class="form-control" type="text" name="telp" value="<?= @$anggota['telp'] ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input class="form-control" type="text" name="alamat" value="<?= @$anggota['alamat'] ?>">
                </div>
                <p>Foto</p>
                <div class="custom-file col-6 mb-2">
                    <input type="file" class="custom-file-input" id="customFile" name="foto">
                    <label class="custom-file-label" for="customFile">Foto</label>
                </div>
                <p>Jenis Kelamin</p>
                <div class="form-inline">

                    <div class="form-check mr-2">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios1" value="L" checked>
                        <label class="form-check-label" for="jenis_kelamin1">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios2" value="P">
                        <label class="form-check-label" for="jenis_kelamin2">
                            Perempuan
                        </label>
                    </div>
                </div>
                <br>
                <input class="form-control" type="hidden" name="id" value="<?= @$anggota['id_anggota'] ?>">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                atau
                <a href="tampil.php">batal</a>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>
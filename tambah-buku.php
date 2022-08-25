<?php include 'header.php' ?>
<div class="container">
    <div class="card bg-light">
        <div class="card-body">
            <h1>Tambah Data Buku</h1>
            <?php
                 if (@$_GET['id'])
                 {
                     $id = $_GET['id'];
                     include 'koneksi.php';
                     $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku= '$id'") or die(mysqli_error($koneksi));
                     $buku = mysqli_fetch_array($query);
                 }
                 
                 ?>
                 <form method="POST" action="simpan-buku.php">
                    <div class="form-group">
                        <label for="kode buku">kode buku</label>
                        <input class="form-control" type="text" name="kode buku" value="<?=@$buku['kode_buku']?>">
                    </div>
                    <div class="form-group">
                        <label for="judul">judul</label>
                        <input class="form-control" type="text" name="judul" value="<?=@$buku['judul']?>">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">keterangan</label>
                        <input class="form-control" type="text" name="keterangan" value="<?=@$buku['keterangan']?>">
                    </div>
                    <div class="form-group">
                        <label for="pengarang">pengarang</label>
                        <input class="form-control" type="text" name="pengarang" value="<?=@$buku['pengarang']?>">
                    </div>
                    <div class="form-group">
                        <label for="penerbit">penerbit</label>
                        <input class="form-control" type="text" name="penerbit" value="<?=@$buku['penerbit']?>">
                    </div>
                    <div class="form-group">
                        <label for="tahun">tahun</label>
                        <input class="form-control" type="number" name="tahun" value="<?=@$buku['tahun']?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="id" value="<?=@$buku['id_buku']?>">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        atau 
                        <a href="tampil-buku.php">batal</a>
                    </div>
                 </form>         
        </div>
    </div>
</div>
<?php include 'footer.php' ?>
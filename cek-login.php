<?php
session_start();
$_SESSION['sesi'] = null;

include 'koneksi.php';
if (@$_POST['submit']) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' AND password = '$password' ");
    $sesi = mysqli_num_rows($query);
    if ($sesi == 1) {
        $admin = mysqli_fetch_array($query);
        $_SESSION['id_admin'] = $admin['id_admin'];
        $_SESSION['sesi'] = $admin['nama_admin'];
        echo "<script>alert('Anda berhasil Log in')'</script>";
        echo "<meta http-equiv='refresh' content='0, url=index.php?user=$sesi'>";
    }else {
        echo "<meta http-equiv='refresh' content='0, url=login.php'>";
        echo "<script>alert('Anda Gagal Log in')'</script>";
    }
}
else {
    include 'login.php';
}

?>
<?php
require "vendor/autoload.php";
include "koneksi.php";
if (@$_GET['id']) {
    $id = @$_GET['id'];
    $sql = "SELECT * FROM anggota WHERE id_anggota = '.$id.'";
    $query = $koneksi->query($sql);
    $anggota = $query->fetch_array();
}
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$html = "
<style>
.kartu {
    border: 3px solid black;
    border-radius: 22px;
    padding: 5px;
}

.container {
    display: flex;
    flex-direction: row;
}

.keterangan {
    align-self: center;
    font-size: 50px;
    margin-left: 100px;
}
</style>

<body>
    <div class='kartu'>
        <center>
            <h1>Kartu Anggota Perpus</h1>
        </center>
        <div class='container'>
            <div><img src='foto/" . $anggota['foto'] . "></div>
            <div class='keterangan'>
                <table>
                    <tr>
                        <td>Kode Anggota</td>
                        <td>" . $anggota['kode_anggota'] . "</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>" . $anggota['nama'] . "</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>" . $anggota['email'] . "</td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>" . $anggota['telp'] . "</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>" . $anggota['alamat'] . "</td>
                    </tr>
                    </table>
            </div>
        </div>
    </div>
</body>
";
$options = $dompdf->getOptions();
$options->setIsRemoteEnabled(ture);
$dompdf->setOptions($options);
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
// $dompdf->setPaper([0, 0, 153.0141733, 242.6456694], 'landscape');
$dompdf->setPaper("A5", 'landscape');

$dompdf->render();
// Output the generated PDF to Browser
$dompdf->stream('Kartu ' . $anggota['nama']);

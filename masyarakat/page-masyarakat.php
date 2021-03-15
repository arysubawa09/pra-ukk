<?php
require __DIR__ . "/../config/koneksi.php";
require __DIR__ . "/../class/userclass.php";

$userclass = new userclass($conn);

$userdata = $userclass->userData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/masyarakat-page.css" type="text/css">
</head>
<body>
    <div class="header"> 
        <div class="nav-user">
            <p>Website Pengaduan Masyarakat</p>  
            <ul>
                <li><a href="../action/logout-masyarakat.php">Logout</a></li>
                <li><p style="font-size:16px; margin-top:-16px">Selamat Datang  <?=$userdata->nama?></p></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <p style="font-size:20px; text-align:center; color:#00801D;">FORM PENGADUAN MASYARAKAT</p>
        <form action="../action/proses-pengaduan-masyarakat.php" method="POST" enctype="multipart/form-data">
            <br>
            <br>
            <p>Laporan Pengaduan</p>
            <br>
            <textarea name="pengaduan"  cols="90" rows="10"></textarea>
            <br>
            <br>
            <p>Tanggal Pengaduan</p>
            <input type="date" name="tanggal-pengaduan" required>
            <br>
            <br>
            <p> Foto(opsional) </p>
            <input type="file" name="gambar" accept = "image/*" >
            <br>
            <br>
            <input class="button" type="submit" value="kirim" name="kirim">
            <input class="button" type="submit" value="batal" name="batal">
        </form>
    </div>
    <br>
</body>
</html>
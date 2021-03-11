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
</head>
<body>
    <div class="header"> 
        <p>Website Pengaduan Masyarakat</p>
        <p>Selamat Datang <?=$userdata->nama?></p>
    </div>
    <p><a href="../action/logout-masyarakat.php">LOGOUT</a></p>
    <div class="content">
        <form action="../action/proses-pengaduan-masyarakat.php" method="POST" enctype="multipart/form-data">
            <p>Laporan Pengaduan</p>
            <textarea name="pengaduan"  cols="60" rows="10"></textarea>
            <br>
            <br>
            <p>Tanggal Pengaduan</p>
            <input type="date" name="tanggal-pengaduan" required>
            <br>
            <br>
            <p> Foto(opsional) </p>
            <br>
        <input type="file" name="gambar" accept = "image/*" >
        <br><br>
        <input type="submit" value="kirim" name="kirim">
        </form>
    </div>
</body>
</html>
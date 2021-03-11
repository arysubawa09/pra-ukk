<?php
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);
    $id_pengaduan = $_GET['id_pengaduan'];
    $datapengaduan = $userclass->PengaduanData($id_pengaduan);
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
        <div class="nav-user">
                <p>Membalas laporan Masyarakat</p>
        </div>
    </div>
    <div class="content">
        <form action="../action/proses-balas-pengaduan.php" method = "POST">
            <p>Laporan</p>
            <p><?=$datapengaduan->isi_laporan?></p>
            <br>
            <p>Tanggal Tanggapan</p>
            <input type="date" name="tgl_tanggapan" required>
            <br>
            <br>
            <p>Tanggapan</p>
            <textarea name="tanggapan" id="" cols="50" rows="10"  ></textarea> 
            <br>
            <br>
            <input type="submit" name="kirim" value="kirim" >
            <button name="kembali"><a href="dashboard-petugas.php">kembali</a></button>
            <input type="hidden" name="id_pengaduan" value="<?= $datapengaduan->id_pengaduan?>">
            <br>
            

        </form>
    </div>
</body>
</html>
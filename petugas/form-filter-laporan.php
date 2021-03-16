<?php
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);
    
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
                <p>Detail laporan Masyarakat</p>
        </div>
    </div>
    <div class="content">
        <form action="generate-laporan.php" method = "GET">
            <p>Bulan</p>
            <select name="bulan" id="">
                <option value="">-pilih bulan-</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">Septeber</option>
                <option value="10">Oktober</option>
                <option value="11">Nopember</option>
                <option value="12">Desember</option>
            </select>
            <br>
            <p>Tahun</p>
            <select name="tahun" id="">
            <option value="">Pilih Tahun</option>
                <?php
                    $thnselesai = date('Y');
                     for($i = $thnselesai - 1; $i <= $thnselesai; $i++ ){

                ?>
                <option value="<?=$i?>"><?=$i?></option>
                <?php }?>
            </select>
            <br>
            <br>
            <p>Status</p>
            <select name="status" id="">
                        <option value="">Pilih Status</option>
                        <option value="'0'">Belum Ditanggapi</option>
                        <option value="'proses'">Proses</option>
                        <option value="'selesai'">Selesai</optio>
            </select>
            <br>
            <br>
            <input type="submit" value="kirim" >
            <button name="kembali"><a href="dashboard-petugas.php">kembali</a></button>
            <br>
            

        </form>
    </div>
</body>
</html>
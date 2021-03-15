<?php
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/masyarakat-daftar.css" type="text/css">
</head>
<body>
    <div class="header">
        <div class="nav-user">
                <p>Website Pengaduan Masyarakat</p>
                <ul>
                    <li><a href="masyarakat/form-daftar-user.php"> Daftar </a></li>
                    <li><a href="../index.php"> Masuk</a></li>
                </ul>
        </div>
    </div>
    <div class="content">
        <p style="font-size:25px; text-align:center; color:#00801D; font-family:sans-serif;">Silahkan Daftar</p>
        <br>
        <form action="../action/proses-daftar-masyarakat.php" method = "POST">
            <div class="text">
                <p>NIK :</p>
                <input type="text" maxlength="16" placeholder="Masukan Nik Anda" name="nik" required>
                <br>    
                <br>
                <p>NAMA :</p>
                <input type="text" placeholder="Masukan Nama Anda" name="nama" required>
                <br>
                <br>
                <p>PASSWORD :</p>
                <input type="password" placeholder="Masukan Password Anda" name="password" required>
                <br>
                <br>
                <p>NO.TELPON :</p>
                <input type="text"  maxlength="13" placeholder="Masukan No.Telpon Anda" name="telpon" required>
                <br>
            </div>
                <input class="button" type="submit" name="daftar" value="daftar" >
                <input class="button" type="submit" name="batal" value="batal" >
                
            <br>
            <br>
            <p style="text-align:center; margin-top:25px;" >Sudah Memiliki Akun? <span><a style="color:#00801D;" href="../index.php">Silahkan Login</a></span></p>
        </form>
        <div class="blok"></div>
    </div>
</body>
</html>
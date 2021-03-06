<?php
    require __DIR__ . "/config/koneksi.php";
    require __DIR__ . "/class/userclass.php";

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
                <p>Website Pengaduan Masyarakat</p>
        </div>
    </div>
    <div class="content">
        <form action="action/proses-login-masyarakat.php" method = "POST">
            <input type="text" placeholder="Masukan Nik Anda" name="nik" required>
            <br>
            <br>
            <input type="password" placeholder="Masukan Password Anda" name="password" required>
            <br>
            <br>
            <input type="submit" name="masuk" value="masuk" >
            <input type="submit" name="batal" value="batal" >

            <br>
            <p>Belum Memiliki Akun? <span><a href="masyarakat/form-daftar-user.php">Silahkan Daftar</a></span></p>

        </form>
    </div>
</body>
</html>
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
    <link rel="stylesheet" href="../css/admin-login.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="nav-user">
                <p>Website Pengaduan Masyarakat</p>
        </div>
    </div>
    <div class="content">
        <p style="text-align:center; font-size:30px; color:#38ACEF">Silahkan Login</p>
        <br>
        <br>
        <form action="../action/proses-login-petugas.php" method = "POST">
            <p >USERNAME :</p>
            <td>
                <input class="text" type="text" placeholder="Masukan Username Anda" name="username" required>
            </td>
            <br>
            <br>
            <p>PASSWORD :</p>
            <td>
                <input class="text" type="password" placeholder="Masukan Password Anda" name="password" required>
            </td>
            <br>
            <td>
                <input class="button" type="submit" name="masuk" value="masuk" >
                <input class="button" type="submit" name="batal" value="batal" >
            </td>
            <br>
            <br>
            <div class="blok"></div>
        </form>
    </div>
</body>
</html>
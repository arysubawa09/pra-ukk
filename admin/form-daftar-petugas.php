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
    <link rel="stylesheet" href="../css/admin-tambah-page.css" type="text/css">
</head>
<body>
    <div class="header">
        <p>PEMBUATAN AKUN PETUGAS</p>
    </div>
    <div class="content">
        <form action="../action/proses-daftar-petugas.php" method = "POST">
            <p>NAMA :</p>
            <input type="text"  placeholder="Masukan Nama " name="nama" required>
            <br>
            <br>
            <p>USERNAME :</p>
            <input type="text" placeholder="Masukan Username" name="username" required>
            <br>
            <br>
            <p>PASSWORD :</p>
            <input type="password" placeholder="Masukan Password " name="password" required>
            <br>
            <br>
            <p>NO.TELPON :</p>
            <input type="text"  maxlength="13" placeholder="Masukan No.Telpon" name="telpon" required>
            <br>
            <br>
            <p>LEVEL :</p>
            <select name="level" >
                <option value="petugas">Petugas</option>
            </select>
            <br>
            <br>
            <input class="button" type="submit" name="daftar" value="daftar" >
            <button class="button" name="kembali"><a style="color:#38ACEF; text-decoration:none;" href="dashboard-admin.php">kembali</a></button>
            
            <br>
            

        </form>
    </div>
</body>
</html>
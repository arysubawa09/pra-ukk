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
                <p>Membuat Akun Petugas</p>
        </div>
    </div>
    <div class="content">
        <form action="../action/proses-daftar-petugas.php" method = "POST">
            <input type="text"  placeholder="Masukan Nama " name="nama" required>
            <br>
            <br>
            <input type="text" placeholder="Masukan Username" name="username" required>
            <br>
            <br>
            <input type="password" placeholder="Masukan Password " name="password" required>
            <br>
            <br>
            <input type="text"  maxlength="13" placeholder="Masukan No.Telpon" name="telpon" required>
            <br>
            <br>
            <select name="level" >
                <option value="petugas">Petugas</option>
            </select>
            <br>
            <br>
            <input type="submit" name="daftar" value="daftar" >
            <button name="kembali"><a href="dashboard-admin.php">kembali</a></button>
            
            <br>
            

        </form>
    </div>
</body>
</html>
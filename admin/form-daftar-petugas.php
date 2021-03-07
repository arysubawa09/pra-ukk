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
</head>
<body>
    <div class="header">
        <div class="nav-user">
                <p>Website Pengaduan Masyarakat</p>
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
            <input type="password" placeholder="Masukan Password Anda" name="password" required>
            <br>
            <br>
            <input type="text"  maxlength="13" placeholder="Masukan No.Telpon Anda" name="telpon" required>
            <br>
            <br>
            <select name="level" >
                <option value="petugas">Petugas</option>
                <option value="admin">Admin</option>
            </select>
            <br>
            <br>
            <input type="submit" name="daftar" value="daftar" >
            <input type="submit" name="batal" value="batal" >
            
            <br>
            <p>Sudah Memiliki Akun? <span><a href="../index.php">Silahkan Login</a></span></p>

        </form>
    </div>
</body>
</html>
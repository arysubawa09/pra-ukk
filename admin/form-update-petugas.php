<?php
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);
    $id_petugas = $_SESSION['id_petugas'];
    $datapetugas = $userclass->datauser($id_petugas);
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
        <form action="../action/proses-update-petugas.php" method = "POST">
            <input type="text"  value="<?=$datapetugas->nama_petugas?>" name="nama" required>
            <br>
            <br>
            <input type="text" value="<?=$datapetugas->username?>" name="username" required>
            <br>
            <br>
            <input type="text" maxleght="13" value="<?=$datapetugas->telpon?>" name="telpon" required>
            <br>
            <br>
            <br>
            <select name="level">
                <option value="petugas">Petugas</option>
                <option value="admin">Admin</option>
            </select>
            <br>
            <br>
            <input type="submit" name="edit" value="edit" >
            <button name="kembali"><a href="dashboard-admin.php">kembali</a></button>
            <input type="hidden" name="id_petugas" value="<?= $datapetugas->id_petugas?>">
            <br>
            

        </form>
    </div>
</body>
</html>
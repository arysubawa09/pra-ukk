<?php
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);
    $id_petugas = $_GET['id_petugas'];
    $datapetugas = $userclass->datauser($id_petugas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin-update.css">
</head>
<body>
    <div class="header">
        <div class="nav-user">
                <p>MENGEDIT AKUN PETUGAS</p>
        </div>
    </div>
    <div class="content">
        <form action="../action/proses-update-petugas.php" method = "POST">
            <p>NAMA :</p>
            <input type="text"  value="<?=$datapetugas->nama_petugas?>" name="nama" required>
            <br>
            <br>
            <p>USERNAME :</p>
            <input type="text" value="<?=$datapetugas->username?>" name="username" required>
            <br>
            <br>
            <p>TELPON :</p>
            <input type="text" maxleght="13" value="<?=$datapetugas->telpon?>" name="telpon" required>
            <br>
            <br>
            <br>
            <p>LEVEL :</p>
            <br>
            <select name="level">
                <option value="petugas">Petugas</option>
                <option value="admin">Admin</option>
            </select>
            <br>
            <br>
            <input class="button" type="submit" name="edit" value="edit" >
            <button class="button" name="kembali"><a style="text-decoration:none; color:#38ACEF;" href="dashboard-admin.php">kembali</a></button>
            <input type="hidden" name="id_petugas" value="<?=$datapetugas->id_petugas?>">
            <br>
            

        </form>
    </div>
</body>
</html>
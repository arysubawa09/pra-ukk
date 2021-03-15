<?php
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);

    $datauser = $userclass->dataPetugas();
    $dataAll = $userclass->dataAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin-dashboard.css">
</head>
<body>
    <div class="header">
        <p style="padding:15px; color:white;">SELAMAT DATANG ADMIN <b><?=$datauser->nama_petugas?></b></p>
        <br>
        <br>
            <ul>
            <li><a href="../action/logout-petugas.php">Logout</a></li>
            <li><a href="dashboard-admin.php">Data Petugas</a></li>
            <li><a href="form-daftar-petugas.php">Membuat Akun Petugas</a></li>
            </ul>
        <br>
        <br>
    </div>
    <div class="tabel">
        <table style="padding:5px; width:80%; text-align:center; height:50vh; margin:auto; color:#38ACEF;" callspan="2" cellpadding="5" border="1" text-align="center">
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>No.Telpon</th>
                <th>Level</th>
                <th>Aksi</th>

                <?php
                    $no = 1;
                    
                    foreach($dataAll as $data){

                        $nama = $data->nama_petugas;
                        $username = $data->username;
                        $telpon = $data->telpon;
                        $level = $data->level;
                    
                ?>

                <tr>
                    <td><?=$no++?></td>
                    <td><?=$nama?></td>
                    <td><?=$username?></td>
                    <td><?=$telpon?></td>
                    <td><?=$level?></td>
                    <td>
                        <a href="form-update-petugas.php?id_petugas=<?=$data->id_petugas?>">Edit</a> 
                        |
                        <a href="../action/proses-delete-petugas.php?id_petugas=<?=$data->id_petugas?>"onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Delete</a>
                    </td>
                </tr>
                <?php }?>
        </table>
    </div>
</body>
</html>
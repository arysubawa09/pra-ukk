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
</head>
<body>
    <p>SELAMAT DATANG ADMIN <b><?=$datauser->nama_petugas?></b></p>
    <br>
    <br>
    <a href="dashboard-admin.php">Data Petugas</a>
    <a href="form-daftar-petugas.php">Membuat Akun Petugas</a>
    <br>
    <br>
    <table callspan="2" cellpadding="5" border="1" text-align="center">
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
</body>
</html>
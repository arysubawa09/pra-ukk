<?php
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);
    $datatanggapan = $userclass->viewTanggapan();
    $datauser = $userclass->dataPetugas();
    $id_pengaduan = $userclass->id_pengaduan();

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
    <p>SELAMAT DATANG PETUGAS <b><?=$datauser->nama_petugas?></b></p>
    <div class="sidebar">
        <ul>
            <li><a href="dashboard-petugas.php"> Data Pengaduan</a></li>
            <li><a href="view-data-terkirim.php">Data Terkirim</a></li>
            <li><a href="generate-laporan.php">Generate Laporan</a></li>
        </ul>
    </div>
    <div class="konten">
            <table callspan ="2" cellpadding = "5" border="2" text-align = "center">
                <th>No</th>
                <th>id laporan</th>
                <th>Tanggal Tanggapan</th>
                <th>Tanggapan</th>
                <th>id_petugas</th>
                <th>Status</th>
                <th>Aksi</th>
            
                <?php
                    $no = 1;
                    foreach($datatanggapan as $data){
                        $laporan= $data->id_pengaduan;
                        $tgl_tanggapan = $data->tgl_tanggapan;
                        $tanggapan = $data->tanggapan;
                        $petugas = $data->id_petugas;
                        $status = $data->status;
                ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$laporan = $id_pengaduan?></td>                      
                        <td><?=$tgl_tanggapan?></td>
                        <td><?=$tanggapan?></td>
                        <td><?=$petugas?></td>
                        <td><?=$status?></td>                        
                        <td>
                            <a href="../action/proses-update-status-selesai.php?id_pengaduan=<?=$data->id_pengaduan?>">Selesai</a>
                        </td>
                    </tr>

                <?php }?>
            </table>

    </div>
</body>
</html>
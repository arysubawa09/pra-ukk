<?php
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);
    $datapengaduan = $userclass->dataPengaduan();
    $datauser = $userclass->dataPetugas();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/petugas-dashboard.css" type="text/css">
</head>
<body>
    <div class="header">
    <p style="color:white; padding:15px;">SELAMAT DATANG PETUGAS <b><?=$datauser->nama_petugas?></b></p>
        <ul>
            <li><a href="../action/logout-petugas.php">Logout</a></li>
            <li><a href="dashboard-petugas.php"> Data Pengaduan</a></li>
            <li><a href="view-data-terkirim.php">Data Terkirim</a></li>
            <li><a href="form-filter-laporan.php">Generate Laporan</a></li>
        </ul>
    </div>
    <br><br>
    <div class="konten">
        <center>
            <?php if($datapengaduan != false){ ?>
                <table callspan ="2" cellpadding = "5" border="2" text-align = "center">
                    <th>No</th>
                    <th>Nik</th>
                    <th style="width:50%;">Isi Laporan</th>
                    <th style="width:10%;">Tanggal Pengaduan</th>
                    <th>Bukti Laporan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                
                    <?php
                        $no = 1;
                        foreach($datapengaduan as $data){
                            $nik = $data->nik;
                            $isi_laporan = $data->isi_laporan;
                            $tgl_laporan = $data->tgl_pengaduan;
                            $bukti = $data->nama_file;
                            $status = $data->status;
                    ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$nik?></td>                      
                            <td><?=$isi_laporan?></td>
                            <td><?=$tgl_laporan = date('d / m / Y')?></td>
                            <td><img style="width:40%" src="../masyarakat/bukti-laporan/<?=$bukti?>" alt=""></td>
                            <td><?=$status?></td>
                            <td>
                            <?php
                                if($status == '0'):
                            ?>       
                                <a style="text-decoration:none; color:green;" href="form-balas-pengaduan.php?id_pengaduan=<?=$data->id_pengaduan ?>">Proses</a>
                                |
                            <?php endif?>
                                <a style="text-decoration:none; color:red;" href="../action/proses-delete-pengaduan.php?id_pengaduan=<?=$data->id_pengaduan?>">Delete</a>
                            </td>
                        </tr>

                    <?php }?>
                </table>
            <?php }else{
                echo "data kosong";
            } ?>
        </center>
    </div>
</body>
</html>
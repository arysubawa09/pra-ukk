<?php
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);
    $datapengaduan = $userclass->datalaporan();

   

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
    <div class="konten">
            <table callspan ="2" cellpadding = "5" border="2" text-align = "center">
                <th>No</th>
                <th>Nik</th>
                <th>Isi Laporan</th>
                <th>Tanggal Pengaduan</th>
                <th>Bukti Laporan</th>
                <th>Status</th>
               
            
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
                        <td><?=$tgl_laporan?></td>
                        <td><img style="width:200px" src="../masyarakat/bukti-laporan/<?=$bukti?>" alt=""></td>
                        <td><?=$status?></td>
                       
                    </tr>

                <?php }?>
            </table>

    </div>
</body>
</html> 

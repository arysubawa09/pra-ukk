<?php
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);
    $id_pengaduan = $_GET['id_pengaduan'];
    $datapengaduan = $userclass->datalaporan($id_pengaduan);

   

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
                <th>Tanggal Pengaduan</th>
                <th>Isi Laporan</th>
                <th>Tanggapan</th>
                <th>Tanggapan</th>
               
            
                <?php
                    $no = 1;
                    foreach($datapengaduan as $data){
                        $nik = $data->nik;
                        $isi_laporan = $data->isi_laporan;
                        $tgl_laporan = $data->tgl_pengaduan;
                        $tanggapan = $data->tanggapan;
                        $tanggapan1 = $data->datalaporan($id_pengaduan);
                ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$nik?></td>                      
                        <td><?=$tgl_laporan = date('d / m / Y')?></td>
                        <td><?=$isi_laporan?></td>
                        <td><?=$tanggapan?></td>
                        <td><?=$tanggapan1?></td>
   
                       
                    </tr>

                <?php }?>
            </table>

    </div>
</body>
</html> 

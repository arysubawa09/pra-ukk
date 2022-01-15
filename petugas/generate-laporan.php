<?php
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);
    $bulan = isset($_GET['bulan'])?$_GET['bulan']:null;
    $tahun = isset($_GET['tahun'])?$_GET['tahun']:null;
    $status = isset($_GET['status'])?$_GET['status']:null;

    $datapengaduan = $userclass->datalaporan($bulan, $status,$tahun);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Laporan</title>
</head>
<body>
    <div class="konten">
        <?php
            if($datapengaduan != false){
        ?>
          <center>
                <table callspan ="2" cellpadding = "5" border="2" text-align= "center">
                <th>No</th>
                <th>Nik</th>
                <th>Tanggal Pengaduan</th>
                <th>Isi Laporan</th>
                <th>Tanggapan</th>
                <th>Status</th>
               
                <?php
                        $no = 1;
                        foreach($datapengaduan as $data){
                            $nik = $data->nik;
                            $isi_laporan = $data->isi_laporan;
                            $tgl_laporan = $data->tgl_pengaduan;
                            $tanggapan = $data->tanggapan;
                            $status = $data->status;
                ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$nik?></td>                      
                            <td><?=$tgl_laporan = date('d / m / Y')?></td>
                            <td><?=$isi_laporan?></td>
                            <td><?=$tanggapan?></td>  
                            <td><?=$status?></td>      
                        </tr>

                <?php }?>
                </table>
            </center>
            <?php
                }else{
                    echo "<script>alert('Data Kosong');document.location.href='dashboard-petugas.php'</script>";
                }
            ?>
    </div>

    <script>
		window.print();
	</script>
</body>
</html> 

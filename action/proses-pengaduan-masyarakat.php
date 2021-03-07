<?php
    
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);


    if(isset($_POST['kirim'])){
  
        $ukuran = $_FILES['bukti']['size'];
        $isi_laporan = $_POST['pengaduan'];
        $tgl_pengaduan = $_POST['tanggal-pengaduan'];
        $foto = $_FILES['bukti'];
        $nama_file = $_FILES['bukti']['name'];
   

        if($foto == "image/jpeg" || $foto == "image/png"){

            if($ukuran < 10000){

                move_uploaded_file('/bukti-laporan'.$nama_file);

                    $pengaduan = $userclass->addPengaduan($nik,$isi_laporan,$tgl_pengaduan,$foto,$status);

                    if($pengaduan){

                        echo "<script>alert('Laporan Berhasil Terkirim')</script>";
                    }else{
                        
                        //echo "<script>alert('Nik dan Password Invalid')";
                    }

                }
            }
        }
        
?>
<?php
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);


    $tgl_tanggapan = $_POST['tgl_tanggapan'];
    $tanggapan = $_POST['tanggapan'];
    $id_pengaduan = $_POST['id_pengaduan'];
    if(isset($_POST['kirim'])){

        $tanggapan = $userclass->tanggapan($id_pengaduan,$tgl_tanggapan,$tanggapan);

        if($tanggapan){
            echo "<script>alert('Reply Berhasil Terkirim');document.location.href='../petugas/dashboard-petugas.php'</script>";
        }else{
            
            echo "<script>alert('Reply Gagal Terkirim');document.location.href='../petugas/dashboard-petugas.php'</script>";
        }
    }
?>
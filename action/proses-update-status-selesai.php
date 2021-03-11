<?php
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);
    $id_pengaduan = $_GET['id_pengaduan'];
    $updateStatus = $userclass->statusSelesai($id_pengaduan);
    
    if($updateStatus){
       
        echo "<script>alert('Laporan Selesai');document.location.href='../petugas/dashboard-petugas.php'</script>";
    }else{
       
        echo "<script>alert('Laporan Gagal');document.location.href='../petugas/dashboard-petugas.php'</script>";
    }
?>
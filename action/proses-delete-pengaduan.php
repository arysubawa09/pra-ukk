<?php
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);

    $id_pengaduan = $_GET['id_pengaduan'];
    $delData = $userclass->deletePengaduan($id_pengaduan);

    if($delData){
        echo "<script>alert('Delete Data Berhasil');document.location.href='../petugas/dashboard-petugas.php'</script>";
    }else{
        echo "<script>alert('Delete Data Gagal');document.location.href='../petugas/dashboard-petugas.php'</script>";
    }

?>
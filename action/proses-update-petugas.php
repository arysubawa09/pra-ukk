<?php

    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";


    $userclass = new userclass($conn);

    $id_petugas = $_POST['id_petugas'];
    $nama_petugas = $_POST['nama'];
    $username = $_POST['username'];
    $telpon = $_POST['telpon'];
    $level = $_POST['level'];

    if(isset($_POST['edit'])){

        $update = $userclass->updatePetugas($id_petugas, $nama_petugas, $username, $telpon, $level);

        if($update){
            echo "<script>alert('Update Data Berhasil');document.location.href='../admin/dashboard-admin.php'</script>";
        }else{
            echo "<script>alert('Update Data Gagal');document.location.href='../admin/dashboard-admin.php'</script>";
        }
    }

?>
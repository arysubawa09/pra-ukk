<?php
        require __DIR__ . "/../config/koneksi.php";
        require __DIR__ . "/../class/userclass.php";        

        $userclass = new userclass($conn);

        $id_petugas = $_GET['id_petugas'];

        $del = $userclass->deletePetugas($id_petugas);
        
        if($del){
            
            echo "<script>alert('Data Berhasil Dihapus');document.location.href='../admin/dashboard-admin.php'</script>";

        }else{
            echo "<script>alert('Data Gagal Dihapus');document.location.href='../admin/dashboard-admin.php'</script>";
        }
?>
<?php
    
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);

    $nama_petugas = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telpon = $_POST['telpon'];
    $level = $_POST['level'];

    if(isset($_POST['daftar'])){

        $daftar = $userclass->addPetugas($nama_petugas, $username, $password, $telpon, $level);

        if($daftar){

                echo "<script>alert('daftar berhasil');document.location.href='/admin/index.php'</script>"; 
                
        }else{
        
                echo "<script>alert('username sudah terdaftar')</script>";

        }

    }
?>
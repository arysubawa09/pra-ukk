<?php
    
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);

    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $telpon = $_POST['telpon'];

    if(isset($_POST['daftar'])){

        $daftar = $userclass->addUser($nik,$nama,$password,$telpon);

        if($daftar){

            echo "<script>alert('daftar berhasil');document.location.href='../index.php'</script>";
        }else{
              
            echo "<script>alert('nik sudah terdaftar');document.location.href='/../masyarakat/form-daftar-user.php'</script>";
        }

    }
?>
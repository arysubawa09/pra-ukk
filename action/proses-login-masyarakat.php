<?php
    
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);

    $nik = $_POST['nik'];
    $password = $_POST['password'];
    

    if(isset($_POST['masuk'])){

        $ceklogin = $userclass->cekLogin($nik,$password);

        if($ceklogin){

            echo "<script>alert('Login berhasil');document.location.href='../masyarakat/page-masyarakat.php'</script>";
        }else{
              
            echo "<script>alert('nik sudah terdaftar');document.location.href='/../masyarakat/form-daftar-user.php'</script>";
        }

    }
?>
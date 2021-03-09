<?php
    
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    
    $userclass = new userclass($conn);

    $username = $_POST['username'];
    $password = $_POST['password'];
    

    if(isset($_POST['masuk'])){
        
        $ceklogin = $userclass->loginPetugas($username,$password);
        
        if($ceklogin){

        if($_SESSION['level'] == 'admin'){

                $_SESSION['username'] = $username;
                $_SESSION['level'] = 'admin';

                echo "<script>alert('Login Admin berhasil');document.location.href='../admin/dashboard-admin.php'</script>";

        }else if($_SESSION['level'] == 'petugas'){
                
                $_SESSION['username'] = $username;
                $_SESSION['level'] = 'petugas';

                echo "<script>alert('Login Petugas berhasil');document.location.href='../petugas/dashboard-petugas.php'</script>" ;  
        }else{

                echo "<script>alert('username dan password invalid');document.location.href='../admin/index.php'</script>";
            }
            
        }else{

                echo "<script>alert('username dan password invalid');document.location.href='../admin/index.php'</script>";
        }

    }
?>
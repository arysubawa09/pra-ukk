<?php
    
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);

    $username = $_POST['username'];
    $password = $_POST['password'];
    

    if(isset($_POST['masuk'])){
        
        $ceklogin = $userclass->loginAdmin($username,$password);
        
        if($ceklogin){
            $data = $this->conn->fetch(PDO::FETCH_OBJ);
        if($data['level'] == 'admin'){

                $_SESSION['username'] = $username;
                $_SESSION['level'] = 'admin';

                echo "<script>alert('Login Admin berhasil')</script>";

        }else if($data['level'] == 'petugas'){
                
                $_SESSION['username'] = $username;
                $_SESSION['level'] = 'petugas';

                echo "<script>alert('Login Petugas berhasil')</script>" ;  
        }else{

                echo "gagal";
            }
            
        }

    }
?>
<?php

    class userclass{

        private $conn;

        public function __construct($conn){

            $this->conn = $conn;
        }

        public function addUser($nik,$nama,$password,$telpon){
            $ceknik = $this->conn->query("SELECT * FROM masyarakat WHERE nik = '$nik'");
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);

            if($ceknik->rowCount() == 0){

                $result = $this->conn->prepare("INSERT INTO masyarakat(nik,nama,password,telpon) VALUES (:nik,:nama,:password,:telpon)");

                $result->bindParam(':nik',$nik);
                $result->bindParam(':nama',$nama);
                $result->bindParam(':password',$hashpassword);
                $result->bindParam(':telpon',$telpon);

                if($result->execute()){
                    return true;
                } 
            } 
                return false;
        }

        public function cekLogin($nik, $password){
            
            $logincek = $this->conn->query("SELECT * FROM masyarakat WHERE nik = '$nik'");

            if($logincek->rowCount() > 0){

                $user = $logincek->fetch(PDO::FETCH_OBJ);
                
                $passworduser = $user->password;

                if(password_verify($password, $passworduser)){
                    $_SESSION['id_user'] = $user->id_user;
                    return true;
                }
            }
            return false;
        }

        public function addPengaduan($nik, $isi_laporan,$tgl_pengaduan, $foto, $status){
            $status = 0;
            $nikSession = $_SESSION['nik'];
            $tgl = date('y-m-d',strtotime($tgl_laporan));
            $result = $this->conn->prepare("INSERT INTO pengaduan (nik, isi_laporan, tgl_pengaduan, foto, status) VALUES (:nik, :isi_laporan, :tgl_pengaduan,:foto, :status)");

            
            $result->bindParam(':nik', $nikSession);
            $result->bindParam(':isi_laporan', $isi_laporan);
            $result->bindParam(':tgl_pengaduan', $tgl);
            $result->bindParam(':foto', $foto);
            $result->bindParam(':status', $status);

            if($result->execute()){
                return true;
            }
            return var_dump($result);
        }
    }

?>
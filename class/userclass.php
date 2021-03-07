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
                    $_SESSION['nik'] = $user->nik;
                    return true;
                }
            }
            return false;
        }

        public function addPengaduan($isi_laporan,$tgl_pengaduan, $nama_file){
            $tgl = date('Y-m-d',strtotime($tgl_pengaduan));
            $nikuser = $_SESSION['nik'];
            $status = 0;
            
            $result = $this->conn->prepare("INSERT INTO pengaduan(nik,isi_laporan,tgl_pengaduan,nama_file,status)VALUES(:nik,:isi_laporan,:tgl_pengaduan,:nama_file,:status)");

            $result->bindParam(':nik', $nikuser);
            $result->bindParam(':isi_laporan', $isi_laporan);
            $result->bindParam(':tgl_pengaduan', $tgl);
            $result->bindParam(':nama_file', $nama_file);
            $result->bindParam(':status', $status);

            if($result->execute()){
                return 'true';
            }
            return 'false';
        }

        public function loginAdmin($username, $password){
            
        }

        public function addPetugas($nama_petugas, $username, $password, $telpon, $level){
            $level = 'petugas' && 'admin';
            $cekUsername = $this->conn->query("SELECT * FROM petugas WHERE username = '$username'");
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);

            if($cekUsername->rowCount() == 0){

                $result = $this->conn->prepare("INSERT INTO petugas (nama_petugas, username, password, telpon, level) VALUES (:nama_petugas, :username, :password, :telpon, :level)");

                $result->bindParam(':nama_petugas', $nama_petugas);
                $result->bindParam(':username', $username);
                $result->bindParam(':username', $hashpassword);
                $result->bindParam(':telpon', $telpon);
                $result->bindParam(':level', $level);

                if($result->execute()){

                    return true;
                }
                 
            }
            return false;
        }
    }

?>
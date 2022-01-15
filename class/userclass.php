<?php

    class userclass{

        private $conn;

        public function __construct($conn){

            $this->conn = $conn;
        }

        public function userData(){
            $id_user = $_SESSION['id_user']; 
            $result = $this->conn->query("SELECT * FROM masyarakat WHERE id_user = '$id_user'");

            if($result->rowCount() > 0){
                $user = $result->fetch(PDO::FETCH_OBJ);

                return $user;
            }
                return false;
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

        public function datauser($id_petugas){
            $data = $this->conn->query("SELECT * FROM petugas WHERE id_petugas = '$id_petugas' LIMIT 1");

            $data = $data->fetch(PDO::FETCH_OBJ);

            return $data;

        }

        public function LoginPetugas($username, $password){
            $ceklogin = $this->conn->query("SELECT * FROM petugas WHERE username = '$username'");

            if($ceklogin->rowCount() > 0){

                $user = $ceklogin->fetch(PDO::FETCH_OBJ);
                
                $passworduser = $user->password;

                if(password_verify($password, $passworduser)){
                    $_SESSION['level'] = $user->level;
                    $_SESSION['id_petugas'] = $user->id_petugas;

                    return true;
                }
                    return false;
            }
        }

        public function addPetugas($nama_petugas, $username, $password, $telpon, $level){
            $cekUsername = $this->conn->query("SELECT * FROM petugas WHERE username = '$username'");
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);

            if($cekUsername->rowCount() == 0){

                $result = $this->conn->prepare("INSERT INTO petugas (nama_petugas, username, password, telpon, level) VALUES (:nama_petugas, :username, :password, :telpon, :level)");

                $result->bindParam(':nama_petugas', $nama_petugas);
                $result->bindParam(':username', $username);
                $result->bindParam(':password', $hashpassword);
                $result->bindParam(':telpon', $telpon);
                $result->bindParam(':level', $level);

                if($result->execute()){

                    return 'true';
                }
                 
            }
            return 'false';
        }

        public function dataPetugas(){
            $id_petugas = $_SESSION['id_petugas'];
            $user = $this->conn->query("SELECT * FROM petugas WHERE id_petugas = '$id_petugas' LIMIT 1 ");

            if($user->rowCount() > 0 ){

                $datauser = $user->fetch(PDO::FETCH_OBJ);
                
                return $datauser;
            }

            return false;
        }

        public function dataAll(){
            $result = $this->conn->query("call`ambil_petugas`()");

            if($result->rowCount() > 0){

                while($rows = $result->fetch(PDO::FETCH_OBJ))
                    $data[] = $rows;

                    return $data;
            }
                    return false;

        }

        public function deletePetugas($id_petugas){
            $del = $this->conn->prepare("DELETE FROM petugas WHERE id_petugas = :id_petugas");

            $del->bindParam(':id_petugas', $id_petugas);

            if($del->execute()){

                return true;
            }
                return false;
        }


        public function updatePetugas($id_petugas, $nama_petugas, $username, $telpon, $level){
            $result = $this->conn->prepare("UPDATE petugas SET nama_petugas = :nama_petugas , username = :username , telpon = :telpon, level = :level WHERE id_petugas = :id_petugas");

            $result->bindParam(':id_petugas', $id_petugas);
            $result->bindParam(':nama_petugas', $nama_petugas);
            $result->bindParam(':username', $username);
            $result->bindParam(':telpon', $telpon);
            $result->bindParam(':level', $level);

            if($result->execute()){

                return true;
            }

                return false;
        }

        public function dataPengaduan(){
            $result = $this->conn->query("SELECT * FROM pengaduan  ORDER BY id_pengaduan DESC");
            if($result->rowCount() > 0){

                while($rows = $result->fetch(PDO::FETCH_OBJ))

                    $data[] = $rows;

                    return $data;
            }
                    return false;
        }

        public function deletePengaduan($id_pengaduan){
            $delete = $this->conn->prepare("DELETE FROM pengaduan WHERE id_pengaduan = :id_pengaduan");

            $delete->bindParam(':id_pengaduan', $id_pengaduan);

            if($delete->execute()){
                return true;
            }
                return false;
        }

        public function PengaduanData($id_pengaduan){
            $result = $this->conn->query("SELECT * FROM pengaduan WHERE id_pengaduan = '$id_pengaduan' ");

            if($result->rowCount() > 0){
                $data = $result->fetch(PDO::FETCH_OBJ);

                return $data;
            }
                return false;
        }

        public function tanggapan($id_pengaduan, $tgl_tanggapan, $tanggapan){
            $tglTanggapan = date('Y-m-d',strtotime($tgl_tanggapan));
            $id_petugas = $_SESSION['id_petugas'];
            $status = 'proses';

            $result = $this->conn->prepare("UPDATE pengaduan SET status = :status WHERE id_pengaduan = :id_pengaduan");

            $result->bindParam(':status', $status);
            $result->bindParam(':id_pengaduan', $id_pengaduan);

            if($result->execute()){
            
                $result = $this->conn->prepare("INSERT INTO tanggapan(id_pengaduan, tgl_tanggapan, tanggapan, id_petugas )
                VALUES(:id_pengaduan, :tgl_tanggapan, :tanggapan, :id_petugas)");

                $result->bindParam(':id_pengaduan', $id_pengaduan);
                $result->bindParam(':tgl_tanggapan', $tglTanggapan);
                $result->bindParam(':tanggapan', $tanggapan);
                $result->bindParam(':id_petugas', $id_petugas);
            

                if($result->execute()){
                    
                    return true;
                }
                    return false;

            }
        }

        public function viewTanggapan(){
            $result = $this->conn->query("SELECT pengaduan.* , tanggapan.* FROM pengaduan INNER JOIN tanggapan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan WHERE status = 'proses' ORDER BY id_tanggapan DESC");

            if($result->rowCount() > 0){

                while($rows = $result->fetch(PDO::FETCH_OBJ))
                    $data[] = $rows;

                    return $data;
            }
                    return false;
        }

        public function statusSelesai($id_pengaduan){
            $status = 'selesai';
            $result = $this->conn->prepare("UPDATE pengaduan SET status = :status WHERE id_pengaduan = :id_pengaduan");

            $result->bindParam(':status', $status);
            $result->bindParam(':id_pengaduan', $id_pengaduan);

            if($result->execute()){

                return 'true';
            }
                return 'false';
        }

        public function datalaporan($bulan = null, $status =  null, $tahun = null){
            if($bulan == null && $status == null && $tahun == null){
                $where = "";
            }else if($bulan != null &&  $status == null && $tahun != null){
                $where = "WHERE YEAR(pengaduan.tgl_pengaduan) = $tahun AND MONTH(pengaduan.tgl_pengaduan) = $bulan ";
            }else if($bulan == null && $status != null && $tahun == null){
                $where = "WHERE pengaduan.status = $status";
            }else{
                $where = "WHERE pengaduan.status = $status AND YEAR(pengaduan.tgl_pengaduan) = $tahun AND MONTH(pengaduan.tgl_pengaduan) = $bulan";
            }
            
            $result = $this->conn->query("SELECT pengaduan.* ,tanggapan.* FROM tanggapan INNER JOIN pengaduan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan $where  ORDER BY id_tanggapan DESC");

            if($result->rowCount() > 0){

                while($rows = $result->fetch(PDO::FETCH_OBJ))

                    $data[] = $rows;

                    return $data;
            }
                    return false;
        
        }

        public function id_pengaduan(){
            $result = $this->conn->query("SELECT * FROM tanggapan");

            if($result->rowCount() > 0){
                return true;
            }

            return false;
        }
    }

?>
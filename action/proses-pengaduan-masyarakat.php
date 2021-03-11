<?php
    
    require __DIR__ . "/../config/koneksi.php";
    require __DIR__ . "/../class/userclass.php";

    $userclass = new userclass($conn);


    $isi_laporan = $_POST['pengaduan'];
    $tgl_pengaduan = $_POST['tanggal-pengaduan'];
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../masyarakat/bukti-laporan/';
    

    if(isset($_POST['kirim'])){

        move_uploaded_file($source, $folder.$nama_file);

        $pengaduan = $userclass->addPengaduan($isi_laporan,$tgl_pengaduan,$nama_file);

        if($pengaduan){
                echo "<script>alert('Laporan Berhasil Terkirim');document.location.href='../masyarakat/page-masyarakat.php'</script>";
        }
        else{
                echo "<script>alert('Laporan Gagal Terkirim');document.location.href='../masyarakat/page-masyarakat.php'</script>";
        }

    }
  
?>
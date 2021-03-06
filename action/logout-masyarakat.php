<?php
    require __DIR__ . "/../config/koneksi.php";

    session_destroy();
    header("location:../index.php");
?>
<?php
require __DIR__ . "/../config/koneksi.php";
require __DIR__ . "/../class/userclass.php";

$userclass = new userclass($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Website Pengaduan Masyarakat</p>
    <p><a href="../action/logout-masyarakat.php">LOGOUT</a></p>
</body>
</html>
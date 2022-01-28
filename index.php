<?php
//buat sesi untuk mengizinkan dahulu agar bisa masuk ke halaman utama
session_start();
//koneksi kan database
include_once 'database.php';

//jika tombol login belum di tekan
if(!isset($_SESSION["login"])){
    //maka paksa user tetap berada ke halaman login
	header("Location: login.php");
	exit;
}
// untuk menampilkan username pada halaman utama
$query = mysqli_query($conn, "SELECT * FROM users_blog");
while($row = mysqli_fetch_assoc($query)){
 $user = $row['username'];  
}
?>

<html>
<head>
<title>Halaman Utama</title>    
</head>
    
<body>
<!--    Tampilkan user-->
    <p>Selamat datang <?php echo $user; ?></p>
</body>
</html>
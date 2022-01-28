<?php
//buat sesi untuk mengizinkan dahulu agar bisa masuk ke halaman utama
session_start();
//koneksi kan database
include_once 'database.php';

//cek jika user menekan tombol login
  if(isset($_POST["login"])){
	 $username = mysqli_real_escape_string($conn, $_POST["username"]); 
	 $password = mysqli_real_escape_string($conn, $_POST["password"]); 
      
	  // variabel $result untuk menyiapkan data username pada user ketika user benar memasukkan username
	  $result = mysqli_query($conn, "SELECT * FROM users_blog WHERE username = '$username'");
	  
	  //jika username benar ataupun data dari database ada
	  if(mysqli_num_rows($result) === 1){
          //ambil data dari database pada variabel $result
		  $row = mysqli_fetch_assoc($result);
          //cek jika password valid
		  if(password_verify($password, $row["password"])){
               // maka set session  
			  $_SESSION["login"]=true;
              // dan pindahkan user ke halaman utama
			  header("Location: index.php");	
//              selain user salah memasukkan password
		  }else{
              //Maka lemparkan kesalahan berikut
			  echo "<script>
			  alert('Maaf login anda salah!');
			document.location.href='login.php';
			  </script>";
			  
		  }
          //jika tidak ada username dan password yang benar (kedua nya salah)
	  }if(mysqli_num_rows($result) === 0){
//          maka lemparkan kesalahan berikut
		  echo "<script>
			  alert('Maaf login anda salah!');
			document.location.href='login.php';
			  </script>";
	  }
	  
  }
?>

<html>
<head>
<title>Login</title>    
</head>
    
<body>   
<!--    Buat form-->
<form method="post">
<!--    Buat label dan inputan username-->
    <label for="username">Username :</label>
    <input type="text" id="username" name="username" autocomplete="off" required>
    <br>
<!--    Buat label password dan inputan password-->
    <label for="password">Password :</label>
    <input type="password" id="password" name="password" autocomplete="off" required>
    <br>
    <!--    Berikan petunjuk jika user belum registrasi-->
    <a href="registrasi.php">Belum Registrasi? Registrasi!</a>
    <br>
<!--    Buat tombol kirim-->
    <button type="submit" name="login">Login!</button>
</form>
</body>
</html>
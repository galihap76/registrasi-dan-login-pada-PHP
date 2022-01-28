<?php
//koneksi kan database
include_once 'database.php';

//cek jika user sudah menekan tombol registrasi
if(isset($_POST["registrasi"])){
    //maka user baru berhasil di tambahkan
	  if(registrasi($_POST)>0){	 
		echo "
		<script>
		alert('User baru berhasil di tambahkan, silakan login terlebih dahulu!');
		document.location.href='login.php';
		</script>
		";
          //selain user belum mendaftar
	  }else{
          //maka user gagal di tambahkan
		 echo "
		<script>
		alert('User baru gagal di tambahkan!');
		document.location.href='registrasi.php';
		</script>
		";
	  }
  }

?>

<html>
<head>
<title>Registrasi</title>    
</head>
    
<body>   
<!--    Buat form-->
<form method="post">
<!--    Buat label dan inputan username-->
    <label for="username">Username :</label>
    <input type="text" id="username" name="username" autocomplete="off" maxlength="16" required>
    <br>
<!--    Buat label password dan inputan password-->
    <label for="password">Password :</label>
    <input type="password" id="password" name="password" autocomplete="off" required>
    <br>
<!--    Buat konfirmasi password-->
     <label for="password2">Konfirmasi Password : </label>
    <input type="password" id="password2" name="password2" autocomplete="off" required>
        <br>
<!--    Buat tombol apakah user pria-->
    <label for="pria">Pria</label>
    <input type="radio" id="pria" name="jenis_kelamin" value="pria" required>
<!--    Buat tombol apakah user perempuan-->
    <label for="perempuan">Perempuan</label>
    <input type="radio" id="perempuan" name="jenis_kelamin" value="perempuan" required>
    <br>
<!--    Berikan petunjuk jika user sudah punya akun untuk login-->
    <a href="login.php">Sudah Pernah Login? Login!</a>
    <br>
<!--    Buat tombol kirim-->
    <button type="submit" name="registrasi">Kirim!</button>
</form>
</body>
</html>
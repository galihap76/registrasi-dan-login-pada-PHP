<?php
//koneksi kan database
$conn = mysqli_connect("localhost", "root", "", "blog");

//registrasi 
function registrasi($data){
    //fungsi global agar mengambil objek $conn agar menangkap variabel global ($conn)
	global $conn;
	 //ambil data dari form registrasi
	$username = stripslashes(mysqli_real_escape_string($conn, $data["username"]));
	$jenis_kelamin = $data["jenis_kelamin"];
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	
	//cek username sudah ada atau belum dalam database
	$result = mysqli_query($conn, "SELECT username FROM users_blog WHERE username = '$username'");
	
    //jika pengambilan data dari database dalam fungsi mysqli_fetch_assoc itu sudah ada di database
	if(mysqli_fetch_assoc($result)){
//        maka berikan pesan berikut
		echo "
		   <script>
		   alert('Username sudah terdaftar!');
		   </script>
		";
		return false;
	}
	
	//cek jika konfirmasi password tidak sesuai
	if($password!==$password2){
//        maka lemparkan pesan kesalahan berikut
		echo "<script>
		 alert('Konfirmasi password tidak sesuai!');
		</script>";
		return false;
	}
	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);	
	//tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO users_blog VALUES('', '$username', '$password', '$jenis_kelamin')");   
     //kembalikan data yang terpengaruh dan tambahkan ke database	
	return mysqli_affected_rows($conn);
}
?>
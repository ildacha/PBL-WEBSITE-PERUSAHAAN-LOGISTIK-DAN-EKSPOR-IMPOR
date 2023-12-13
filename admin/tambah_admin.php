<?php
	require('koneksi.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];

	$tambah_data 		= "INSERT INTO admin
					      (username, password, nama, email)
					      VALUE ('$username','$password', '$nama', '$email')";
	$query  	 		= mysqli_query($koneksi, $tambah_data);
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
?>
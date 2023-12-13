<?php
	require('koneksi.php');
	$id	= $_GET["id_berita"];
	$hapus_data 		= "DELETE FROM berita WHERE id_berita='$id'";
	$query  			= mysqli_query($koneksi, $hapus_data);
	echo "<meta http-equiv='refresh' content='0;url=news.php'>";
?>
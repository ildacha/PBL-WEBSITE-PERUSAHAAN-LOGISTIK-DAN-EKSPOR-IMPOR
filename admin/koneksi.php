<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "websiteperusahaan"; // Nama Database

// Melakukan koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Gagal koneksi: " . mysqli_connect_error());
}

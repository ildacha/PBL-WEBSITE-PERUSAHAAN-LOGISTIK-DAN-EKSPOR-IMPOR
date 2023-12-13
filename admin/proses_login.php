<?php
session_start();
include 'koneksi.php';

$user = $_POST['username'];
$pass = $_POST['password'];

$data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$user' && password='$pass'");
$row = mysqli_fetch_array($data);

if ($row) {
    echo "Login Berhasil";
    $_SESSION['username'] = $row['username'];
    $_SESSION['nama'] = $row['nama'];

    header("Location: index.php");
    exit();
} else {
    echo '<script>alert("Username atau Password salah");window.location.href="login.php";</script>';
    exit();
}
?>

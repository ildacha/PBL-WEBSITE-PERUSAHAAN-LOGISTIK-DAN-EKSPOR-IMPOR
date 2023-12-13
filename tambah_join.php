<?php
require('admin/koneksi.php');

// Memeriksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve additional form inputs
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $pengalaman = $_POST['pengalaman'];
    $jurusan = $_POST['jurusan'];

    // Retrieve file information
    $gambar = $_FILES['cv']['name'];
    $ukuran_file = $_FILES['cv']['size'];
    $tmp_file = $_FILES['cv']['tmp_name'];
    $uploadDir = 'admin/img/';
    $path = $uploadDir . $gambar;

    // Define the allowed file extensions
    $ekstensi_diperbolehkan = array('jpg', 'jpeg', 'png', 'pdf');

    // Get the file extension
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));

    if (in_array($ekstensi, $ekstensi_diperbolehkan) && $ukuran_file <= 1000000) {
        if (move_uploaded_file($tmp_file, $path)) {
            // Prepare and execute the SQL query
            $query = "INSERT INTO lamaran (nama_lengkap, email, pendidikan_terakhir, pengalaman, jurusan, cv) VALUES ('$nama_lengkap', '$email', '$pendidikan_terakhir', '$pengalaman', '$jurusan', '$gambar')";
            $sql = mysqli_query($koneksi, $query);

            if ($sql) {
                header("location: index.php");
                exit;
            } else {
                echo "Terjadi Kesalahan saat menyimpan data.";
                echo "<br><a href='index.php'>Kembali</a>";
            }
        } else {
            echo "Terjadi kesalahan dalam mengupload gambar.";
        }
    } else {
        echo "Format file gambar tidak diperbolehkan atau ukuran file terlalu besar.";
    }
}

mysqli_close($koneksi);
?>

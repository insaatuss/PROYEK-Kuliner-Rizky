<?php

require_once ("config/connection.php");

require_once("config/session_check.php");


if ($sessionStatus == false) {
    header("Location: index.php");
}

// Status tidak error
$error = 0;

// Memvalidasi inputan
if ( isset($_POST['email']) ) $email = $_POST['email'];
else $error = 1;

if ( isset($_POST['password']) ) $password = $_POST['password'];
else $error = 1;

if ( isset($_POST['re-password']) ) $repassword = $_POST['re-password'];
else $error = 1;

// Mengatasi jika terjadi error pada inputan
if ( $error == 1 )  {
    echo "Terjadi kesalahan pada proses input data <a href='registration.php>Kembali</a>'";
    exit();
}

// Pengecekan Password dan konfirmasi password
if ( $password != $repassword ) {
    echo "Password tidak sama, ulangi mengisi form pendaftaran! <a href='registration.php>Kembali</a>";
    exit();
}
else {
    $password = hash ("sha256", $password);    
}

// Menyiapkan Query MySQL untuk dieksekusi
$query = "INSERT INTO admin
    (email, password)
    VALUES
    ('{$email}', '{$password}');
";

// Mengeksekusi MySQL Query
$insert = mysqli_query($mysqli, $query);



// Menangani ketika ada error pada saat eksekusi query
if ( $insert == false ) {
    echo "Error dalam menambahkan data. <a href ='index.php'>Kembali</a>";
}
else {
    header("Location: data-admin.php");
}

?>
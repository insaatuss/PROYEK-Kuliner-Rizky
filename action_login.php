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


// Mengatasi jika terdapat error pada data inputan
if ( $error == 1 )  {
    echo "Terjadi kesalahan pada data inputan <a href='pages-login.php>Kembali</a>'";
    exit();
}

// Hashing Password
$password = hash ("sha256", $password);    

// Menyiapkan Query MySQL untuk dieksekusi
$query = "SELECT * FROM admin WHERE email = '{$email}'";

// Mengeksekusi MySQL Query
$result = mysqli_query($mysqli, $query);

$data = mysqli_fetch_assoc($result); 

if ( is_null($data) ) {
    echo "Email tidak terdaftar <a href ='pages-login.php'>Kembali</a>";
    exit();
}
else if ( $data['password'] != $password ) {
    echo "Password salah <a href ='pages-login.php'>Kembali</a>";
    exit();
}

else {
    // Memulai fungsi SESSION
    session_start();

    $_SESSION["status"] = true;
    $_SESSION["nama"] = $data["nama"];
    $_SESSION["email"] = $data["email"];

    header("Location: tables-data.php");
}


?>
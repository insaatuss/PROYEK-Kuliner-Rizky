<?php

require_once("config/connection.php");

require_once("config/session_check.php");


if ($sessionStatus == false) {
    header("Location: index.php");
}

// Mendapatkan data Kode Barang
if ( isset($_GET["id"]) ) $admin = $_GET["id"];
else {
    echo " Kode Barang tidak ditemmukan! <a href='data-admin.php'>Kembali</a>";
    exit();
}


// Query Get Data Barang
$query = "DELETE FROM admin WHERE email = '{$admin}'";

// var_dump($query);
// die();

// Eksekusi Query
$result = mysqli_query($mysqli, $query);

if ( ! $result ) {
    echo "Gagal menghapus data!";
}

header("Location: data-admin.php");

?>
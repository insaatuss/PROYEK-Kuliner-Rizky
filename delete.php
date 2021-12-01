<?php

require_once("config/connection.php");

require_once("config/session_check.php");


if ($sessionStatus == false) {
    header("Location: index.php");
}

// Mendapatkan data Kode Barang
if ( isset($_GET["id"]) ) $id = $_GET["id"];
else {
    echo " Kode Barang tidak ditemmukan! <a href='index.php'>Kembali</a>";
    exit();
}


// Query Get Data Barang
$query = "DELETE FROM produk WHERE id_produk = '{$id}'";

// var_dump($query);
// die();

// Eksekusi Query
$result = mysqli_query($mysqli, $query);

if ( ! $result ) {
    echo "Gagal menghapus data!";
}

header("Location: tables-data.php");

?>
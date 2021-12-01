<?php

require_once("config/connection.php");

require_once("config/session_check.php");

if ($sessionStatus == false) {
    header("Location: index.php");
}
// Menapatkan Data Kode barang
if ( isset($_GET["id"]) ) $id = $_GET["id"];
else {
    echo "Kode Barang Tidak Ditemukan <a href='index.php'>Kembali</a>";
    exit();
}

// Query Get Data Barang
$query = "SELECT * FROM produk WHERE id_produk = '{$id}'";

// Eksekusi Query
$result = mysqli_query($mysqli, $query);

// Fetching Data
foreach ( $result as $produk) {
    $gambar_produk = $produk["gambar"];
}

if ( !is_null($gambar_produk) && !empty($gambar_produk) ) {
    $remove = unlink($gambar_produk);

    if ( $remove ) {

        // Menyiapkan Query MySQL untuk Dieksekusi
        $query = 
        " UPDATE produk SET 
        gambar = NULL
        WHERE id_produk = '{$id}' ";

        // Mengeksekusi Query MySQL
        $insert = mysqli_query($mysqli, $query);
    }

}

header("Location: form_edit.php?id={$id}");

?>
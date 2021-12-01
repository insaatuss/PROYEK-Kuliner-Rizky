<?php

require_once ("config/connection.php");
require_once("config/session_check.php");

if ($sessionStatus == false) {
    header("Location: index.php");
}

// Status tidak error
$error = 0;

// Memvalidasi inputan


if ( isset($_POST['nama']) ){ 
    $nama_produk = $_POST['nama'];
}
else{
    echo "error dari nama produk";
    exit(); 
    $error = 1;}

if ( isset($_POST['harga']) ){ 
    $harga_produk = $_POST['harga'];
}
else{
    echo "error dari harga produk";
    exit(); 
    $error = 1;}

if ( isset($_POST['deskripsi']) ){ 
    $deskripsi_produk = $_POST['deskripsi'];
}
else{
    echo "error dari deskripsi produk";
    exit(); 
    $error = 1;}

if ( isset($_POST['kategori']) ){ 
    $kategori = $_POST['kategori'];
}
else{
    echo "error dari kategori produk";
    exit(); 
    $error = 1;}


// Mengatasi jika terjadi error pada input
if ( $error == 1 )  {
    echo "Terjadi kesalahan pada proses input data";
    exit();
}

// Mengambil data file upload
$files = $_FILES['gambar'];
$path = "penyimpanan/";

// Menangani file upload
if ( !empty($files['name']) ) {
    $filepath = $path.$files["name"];
    $upload = move_uploaded_file($files["tmp_name"], $filepath);
}
else {
    $filepath = "";
    $upload = false;
}

// Menangani error saat mengupload
if ( $upload = false) {
    $produk['gambar'] = "penyimpanan/default.jpg";
}

// Menyiapkan Query MySQL untuk dieksekusi
$query = "
    INSERT INTO produk
    (nama_produk, harga_produk, deskripsi_produk, gambar_produk,kategori)
    VALUES
    ('{$nama_produk}','{$harga_produk}','{$deskripsi_produk}','{$filepath}','{$kategori}');";

// Mengeksekusi MySQL Query
$insert = mysqli_query($mysqli, $query);

// Menangani ketika ada error pada saat eksekusi query
if ( $insert == false ) {
    echo "Error dalam menambahkan data. <a href ='index.php'>Kembali</a>";
}
else {
    header("Location: tables-data.php");
}

?>
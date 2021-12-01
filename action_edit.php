<?php

require_once("config/connection.php");

require_once("config/session_check.php");


if ($sessionStatus == false) {
    header("Location: index.php");
}

// Mendapatkan data Kode Barang
if ( isset($_POST["id_produk"]) ) $id = $_POST["id_produk"];
else {
    echo "Kode Barang tidak Ditemukan! <a href='index.php'></a>";
    exit();
}

// Query Get Data Barang
$query = "SELECT * FROM produk WHERE id_produk = '{$id}'";

// Eksekusi Query
$result = mysqli_query($mysqli, $query);
// var_dump($result);

// Fetching Data
foreach ( $result as $produk ) {
    $gambarLama = $produk["gambar_produk"];
    $nama = $produk["nama_produk"];
    $harga = $produk["harga_produk"];
    $kategori = $produk["kategori"];
    $deskripsi = $produk["deskripsi_produk"];
}

if ( isset($_POST['nama']) ){ 
    $nama = $_POST['nama'];
}
else{
    echo "error dari nama produk";
    exit(); 
    $error = 1;}

if ( isset($_POST['deskripsi']) ){ 
    $deskripsi = $_POST['deskripsi'];
}
else{
    echo "error dari deskripsi produk";
    exit(); 
    $error = 1;}

if ( isset($_POST['harga']) ){ 
    $harga = $_POST['harga'];
}
else{
    echo "error dari harga produk";
    exit(); 
    $error = 1;}

if ( isset($_POST['kategori']) ){ 
    $kategori = $_POST['kategori'];
}
else{
    echo "error dari kategori produk";
    exit(); 
    $error = 1;}
    


// Mengambil Data File Upload
$files = $_FILES['gambar_produk'];
$path = "penyimpanan/";

// Menangani File Uplload
if ( !empty($files['name']) ) {
    $filepath = $path . $files["name"];
    
    $upload = move_uploaded_file($files["tmp_name"], $filepath);
    
    if (file_exists($gambarLama) ) {
        unlink($gambarLama);
    }
    
}
else {
    $filepath = $gambarLama;
    $upload = false;
}



// Mengangani error saat mengupload
if ( $gambarLama != true && $filepath != $gambarLama ) {
    exit("Gagal Mengupload File <a href='form_edit.php?id={$id}'>Kembali</a>");
}
// Menyiapkan Query MySQL untuk diekseekusi
$query = "UPDATE produk SET
        nama_produk = '{$nama}',
        harga_produk = '{$harga}',
        deskripsi_produk = '{$deskripsi}',
        kategori = '{$kategori}',
        gambar_produk = '{$filepath}'
    WHERE id_produk = '{$id}';";

// Mengeksekusi MySQL Query
$insert = mysqli_query($mysqli,$query);

// Menangani ketika ada error ketika eksekusi query
if ( $insert == false ) {
    echo "Error dalam mengubah data. <a href='index.php'>Kembali</a>";
}
else {
    header("Location: tables-data.php");
}


?>
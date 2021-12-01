<?php

require_once ("config/connection.php");
require_once("config/session_check.php");

if ($sessionStatus == false) {
    header("Location: index.php");
}

// Status tidak error
$error = 0;

// Memvalidasi inputan


if ( isset($_POST['deskripsi']) ){ 
    $deskripsi = $_POST['deskripsi'];
}
else{
    echo "error dari deskripsi";
    exit(); 
    $error = 1;}

if ( isset($_POST['keywords']) ){ 
    $keywords = $_POST['keywords'];
}
else{
    echo "error dari keywords ";
    exit(); 
    $error = 1;}

if ( isset($_POST['author']) ){ 
    $author = $_POST['author'];
}
else{
    echo "error dari author";
    exit(); 
    $error = 1;}

if ( isset($_POST['robots_index']) ){ 
    $robots_index = $_POST['robots_index'];
}
else{
    echo "error dari robots_index ";
    exit(); 
    $error = 1;}

if ( isset($_POST['robots_follow']) ){ 
    $robots_follow = $_POST['robots_follow'];
}
else{
    echo "error dari robots_follow ";
    exit(); 
    $error = 1;}


// Mengatasi jika terjadi error pada input
if ( $error == 1 )  {
    echo "Terjadi kesalahan pada proses input data";
    exit();
}

$select = "SELECT * FROM seo";
$data = mysqli_query($mysqli, $select);
$data = mysqli_fetch_assoc($data);

if ( !is_null($data)) {
    
    $update = " UPDATE seo SET deskripsi = '{$deskripsi}', keywords = '{$keywords}', author = '{$author}', robots_index = '{$robots_index}', robots_follow = '{$robots_follow}'  ";
    
    $query = mysqli_query ($mysqli, $update);
    
}
else {
    $insert = "INSERT INTO seo VALUES ('{$deskripsi}', '{$keywords}', '{$author}', '{$robots_index}', '{$robots_follow}') ";

    $query = mysqli_query ($mysqli, $insert);
}



// Menangani ketika ada error pada saat eksekusi query
if ( $query == false ) {
    print_r(mysqli_error($mysqli));
    echo "Error dalam menambahkan data. <a href ='seo.php'>Kembali</a>";
}
else {
    header("Location: seo.php");
}

?>
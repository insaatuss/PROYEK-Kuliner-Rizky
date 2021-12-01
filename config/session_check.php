<?php

// Start session
session_start();

// Mengecek dan mendapatkan SESSION status
if ( isset($_SESSION["status"]) ) $sessionStatus = $_SESSION["status"];
else $sessionStatus = false;

// Mengecek dan mendapatkan data nama
if ( isset($_SESSION["nama"]) ) $sessionName = $_SESSION["nama"];
else $sessionName = "";

// Mengecek dan mendapatkan data email
if ( isset($_SESSION["email"]) ) $sessionEmail = $_SESSION["email"];
else $sessionEmail = "";


?>
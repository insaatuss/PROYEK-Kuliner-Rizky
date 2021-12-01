<?php

// Start session
session_start();

// Menghapus semua session yang telah didefinisikan
session_destroy();

// Mengarahkan menuju halaman login
header ("Location: pages-login.php");

?>
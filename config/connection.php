<?php

$mysqli = new mysqli ( "jongkreatif.com", "u5250287_kulinerrizki","kulinerrizki1234", "u5250287_kulinerrizki");

// Check connection
if ($mysqli -> connect_errno) {
    echo "Gagal menyambungkan ke MySQL: " > $mysqli -> connect_error;
    exit();
}

?>
<?php

/* Declare fungsi koneksi ke database */

$uname = 'root'; //nama username database
$pwd = ''; //Password database
$dbname = 'colosus'; //nama Database

/* Initialisasi database */
$db = new PDO('mysql:host=localhost;dbname='.$dbname, $uname, $pwd);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
?>

<?php
/* index di sini berfungsi sebagai penengah templates files 
 * ambil semua file penting
 */
session_start();
include '../core/config.php';
include '../core/class.php';
include 'header.php';


include '../core/function.php';
include 'content.php';
include 'footer.php';

?>

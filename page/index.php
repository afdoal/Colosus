<?php
/* index di sini berfungsi sebagai penengah templates files 
 * ambil semua file penting
 */
session_start();
if(empty($_SESSION[uname])){
      /* Redirect ke halaman home */ 
           header('location:../');
    }
include '../core/config.php';
include '../core/class.php';
include 'header.php';


include '../core/function.php';
include 'content.php';
include 'footer.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Colosus Point Of Sales - Version 2.0</title>
<?php
/* include semua javascript */
include '../js/library.php';
/* include semua css */
include '../css/library.php'
?>
</head>
    <body>
        <div class="head">
            <div class="main">
                <div id="logo">
                    <img src="../image/logo.png" width="190px">
                </div>
                
                <div id="keterangan">
                    Selamat datang, <br><b><big><?php echo strtoupper($_SESSION[namauser]);?></big></b>    
                </div>
                <img src="../image/home.png" id="menu" height="90px" width="90px"/><img src="../image/off.png" id="menu" height="90px" width="90px" /> <img src="../image/browse.png" id="browse" height="64" width="255" />
            </div>
        </div>
        <div class="container">
            <div class="content">
                <div class="categories" id="categories">
                    <ul>
                    <?php echo $menu::Menu(); ?>
                    </ul>
                </div>
           
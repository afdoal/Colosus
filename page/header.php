<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Expires" content="Tue, 01 Jan 2000 12:12:12 GMT">
<meta http-equiv="Pragma" content="no-cache">
<title><?php if(isset($_GET[module])){echo $_GET[module].' - ';}?>Colosus Point Of Sales - Version 2.0</title>
<?php
/* include semua javascript */
include 'js/library.php';
/* include semua css */
include '../css/library.php'
?>
</head>
    <body>
        <div class="head">
            <div class="main">
                <div class="clock">
                    <div id="Date"></div>
                        <ul id="uljam">
                         <li id="hours"></li>
                         <li id="point">:</li>
                         <li id="min"></li>
                         <li id="point">:</li>
                         <li id="sec"></li>
                        </ul>
                </div>
                <div id="logo">
                    <img src="../image/logo.png" width="188px">
                   
                </div>
                 
                <div id="keterangan">
                    <table cellpadding="3" cellspacing="0">
                        <tr>
                        <td><img src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png" height="50px"></td>
                        <td>Selamat datang, <br><b><big><?php echo strtoupper($_SESSION[namauser]);?></big></b></td>
                        </tr>
                    </table>
                        
                </div>
                <a href="index.php"><img src="../image/home.png" id="menu" height="90px" width="90px"/></a>
                <?php if($_SESSION[uname]=='admin'){ echo ' <a href="?module=modul"><img src="../image/modul.png" id="menu" height="90px" width="90px" /></a>'; } ?>
                <a href="logout.php"><img src="../image/off.png" id="menu" height="90px" width="90px" /></a>
                
                <img src="../image/browse.png" id="browse" width="220" />
                
            </div>
        </div>
        <div class="container">
            <div class="content">
                <div class="categories" id="categories">
                    <ul>
                    <?php echo $menu::Menu(); ?>
                    </ul>
                </div>
            </div>
        </div> 
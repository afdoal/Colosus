<?php

/** include connection **/
include 'conn.php';

/* mulai lakukan query */
        $id = $_REQUEST['idModul'];
        $namamodul = $_REQUEST['namaModul'];
        $link = $_REQUEST['link'];
        $publish = $_REQUEST['publish'];
        $level = $_REQUEST['levelUser'];
        
        if(is_numeric($level)){
            $levelusr = ",idLevelUser='$level'";
        } else {
        $levelusr = "";
            }
    
        
?>
<?php


    if(isset($_GET[module])){
    
       if($_SESSION[uname]=='admin'){
        include '../modul/'.$_GET[module].'/index.php';
       
        
       }else{
           
           if(cekLevel($_SESSION[uname],$_GET[module])){
               include '../modul/'.$_GET[module].'/index.php';
           }else{
               echo "Anda tidak mempunyai hak akses ini";
           }
       }
    
    } else {
    
    ?>
            
            <div>
                <div style="width:500px;margin:170px auto;">
                    <center>
                        <b ><span style="font-size:20px;">WELCOME TO</span></b><br>
                        <img src="../image/logo.png">
                    </center>
                </div>
                    
                    
            </div>
    <?php
    
}

?>
<?php
session_start();
   
    
    
     /* jika kolom password + username tidak kosong maka lakukan cek login */
    if(isset($_POST[username])<>''){
        
        include 'core/config.php';
        
        /* cek ke database */
        $pass=md5($_POST[password]);
        
        $query = "SELECT idUser,namaUser,levelUser,uname FROM user u, leveluser lu WHERE u.idLevelUser = lu.idLevelUser and uname='$_POST[username]' AND pass='$pass'";

        $statement = $db->query($query);
        
        if ( $statement->rowCount() > 0 ) {
            
            /* User ada, buat session dan redirect ke home page */
            
            $data = $statement->fetch(PDO::FETCH_ASSOC);
            
            session_register("idUser");
            session_register("namauser");
            session_register("passuser");
            session_register("leveluser");
            session_register("uname");

            $_SESSION[namauser] = $data[namaUser];
            $_SESSION[iduser] = $data[idUser];
            $_SESSION[leveluser]= $data[levelUser];
            $_SESSION[uname]	= $data[uname];
            
            
           /* Redirect ke halaman home */ 
           header('location: http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'page/index.php');
            
           
            } else {
                
               
            
            
            }

    }

    if(empty($_SESSION[uname])){
        
        include 'login.html';
        
    } else {
        
       /* Redirect ke halaman home */ 
           header('location: http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'page/index.php');
    }
?>

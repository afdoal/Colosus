<?php
global $db;




class Header{
    
    /* fungsi untuk menampilkan menu */
    static function Menu(){
        global $db;
        /* Declare Menu di atas berdasarkan modul */
        if ($_SESSION[leveluser]=='admin'){
            
            $sql="select namaModul,link from modul order by urutan ";
            
            }else{
                
            $sql="select * from modul m, leveluser lu where m.idLevelUser = lu.idLevelUser and levelUser='$_SESSION[leveluser]' and publish='Y' order by urutan";

            }
            
            $statement = $db->query($sql);
            //$menu = array();
            while($data_menu = $statement->fetch(PDO::FETCH_ASSOC)) {
                $menu .= "<li style='float:left;margin-right:3px;'><a href='$data_menu[link]'> $data_menu[namaModul] </a></li>";
            }
            //$menu .= "</div>";
            return $menu;
    }
}

/* declare class header */
$menu = new Header(); 


class Database{
    /* fungsi insert ke database */
    
    static function insert($table,$field,$value){
        
        $sql = "INSERT INTO ".$table." (".$field.") VALUES (".$value.")";
        $query = $db->prepare($sql);
        if($query->exec){
            return 1;
        } else {
            return 0;
        }
    }
    
    /* fungsi update */
    
    static function update($table,$value,$condition){
        
        $sql = "UPDATE ".$table." SET ".$value." WHERE ".$condition." ";
        $query = $db->prepare($sql);
        if($query->exec){
            return 1;
        } else {
            return 0;
        }
    }
}

/* declare class dbase */
$dbase = new Database();

function cekLevel($username,$modul){
        global $db;
        $sql = "SELECT * from user as u, modul as m, leveluser as l WHERE u.uname='$username' AND m.link = '?module=$modul' AND u.idLevelUser = l.idLevelUser AND l.idLevelUser = m.idLevelUser LIMIT 1";
        $prepare = $db->query($sql);
        $return = $prepare->fetchColumn();
        
        if($return>0){
            return true;
        }else{
            return false;
        }
        
}

?>
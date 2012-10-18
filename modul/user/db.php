<?php 

include 'conn.php';

/* fungsi hapus */
if($_REQUEST[act]=='hapus'){
            
            $id = $_REQUEST['idUser'];
            $sql = "delete from user where idUser='$id'";
            $hasil =$db->exec($sql);

           if ($hasil){
            echo json_encode(array('success'=>true));
            } else {
            echo json_encode(array('msg'=>'Some errors occured.'));
            }
        }
    


if(isset($_GET[act])){
    
    if($_GET[act]=='list'){
       
        $syntax = "select * from leveluser";  
        $lihatlist = $db->query($syntax);
        $hasil = array();  
        while($baris = $lihatlist->fetch(PDO::FETCH_ASSOC)){  
                array_push($hasil, $baris);  
        }  
  
        echo json_encode($hasil);
    }
    
    
    }else{
    
        /** Retrieve data ke dalam table dari database.. **/
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    $offset = ($page-1)*$rows;
	
    $result = array();
	
    $rs = $db->query("select count(*) from user");
    $row = $rs->fetch(PDO::FETCH_NUM);
    $result["total"] = $row[0];
	
    $rs = $db->query("select * from user as u, leveluser as l where u.idLevelUser = l.idLevelUser limit $offset,$rows");
	
    $rows = array();
    while($row = $rs->fetch(PDO::FETCH_OBJ)){
	array_push($rows, $row);
    }
    $result["rows"] = $rows;
	
    echo json_encode($result);
    
}
?>
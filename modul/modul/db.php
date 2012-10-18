<?php 

include 'conn.php';

/* declare semua variabel */
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

/* fungsi hapus */
if($_REQUEST[act]=='hapus'){
            
            
            $sql = "delete from modul where idModul='$id'";
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
    
     if($_GET[act]=='new'){
       
        
        $sql = "insert into modul(namaModul,link,publish,idLevelUser) values('$namamodul','$link','$publish','$level')";
        $query = $db->exec($sql);
        if ($query){
	echo json_encode(array('success'=>true));
        } else {
	echo json_encode(array('msg'=>'Some errors occured.'));
        }
        
        
    }
    
    if($_GET[act]=='update'){
        
        

        /* mulai lakukan query */
        $sql = "update modul set namaModul='$namamodul',link='$link', publish='$publish' $levelusr where idModul='$id'";
        
        $hasil = $db->exec($sql);

        if ($hasil){
	echo json_encode(array('success'=>true));
        } else {
	echo json_encode(array('msg'=>'Some errors occured. :'.$level));
        }
        
        
        
    }
    
    
    }else{
    
        /** Retrieve data ke dalam table dari database.. **/
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
    $offset = ($page-1)*$rows;
	
    $result = array();
	
    $rs = $db->query("select count(*) from modul");
    $row = $rs->fetch(PDO::FETCH_NUM);
    $result["total"] = $row[0];
	
    $rs = $db->query("select * from modul as m, leveluser as l where m.idLevelUser = l.idLevelUser limit $offset,$rows");
	
    $rows = array();
    while($row = $rs->fetch(PDO::FETCH_OBJ)){
	array_push($rows, $row);
    }
    $result["rows"] = $rows;
	
    echo json_encode($result);
    
}
?>
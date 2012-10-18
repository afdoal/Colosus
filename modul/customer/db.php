<?php 

/* Declare fungsi koneksi ke database */

$uname = 'root'; //nama username database
$pwd = ''; //Password database
$dbname = 'colosus'; //nama Database

/* Initialisasi database */
$db = new PDO('mysql:host=localhost;dbname='.$dbname, $uname, $pwd);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

/* declare semua variabel */
$id = $_REQUEST['idCustomer'];
$namaCustomer = $_POST['namaCustomer'];
$area = $_POST['area'];
$alamat = $_POST['alamat'];	
$telepon = $_POST['telpCustomer'];    
$email = $_POST['email'];

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
    
   /** ambil list regional **/
    if($_GET[act]=='region'){
       
        $syntax = "select * from regional";  
        $lihatlist = $db->query($syntax);
        $hasil = array();  
        while($baris = $lihatlist->fetch(PDO::FETCH_ASSOC)){  
                array_push($hasil, $baris);  
        }  
  
        echo json_encode($hasil);
    }
    
    /** store data baru **/
     if($_GET[act]=='new'){
         
        /** cek user apakah customer ada dulu **/
         
        $query1 = "SELECT email, telpCustomer FROM customer WHERE email='$email' OR telpCustomer='$telepon'";
        $cek = $db->query($query1);  
       
        /* jika tidak ada */
        if($cek->rowCount() < 1){
            
            /* generate id customer */
            $ambilID = $db->prepare("select max(idCustomer)+1 from customer")->query();
            $ambilID2 = $db->prepare("select max(indexs)+1 from customer")->query();
            $ID = $ambilID->fetch(PDO::FETCH_ASSOC);
            $ID2 = $ambilID2->fetch(PDO::FETCH_ASSOC);
            
            
            if($ID[0]=='')
		$id_customer = '1';
            else
		$id_customer = $ID[0];
            
            if($ID2[0]=='')
		$id_customer2 = '1';
            else
		$id_customer2 = $ID2[0];	
           
            $tgl = date("Y-m-d");
    
            /* masukan data */
            $sql = "insert into customer(idCustomer,indexs,NoIDCust,last_update,namaCustomer,area,alamat,telepon,email) values('$id_customer','$id_customer2','KB$id_customer2','$namaCustomer','$area','$alamat','$telepon','$email')";
            $query = $db->exec($sql);
            if ($query){
            echo json_encode(array('success'=>true));
            } else {
            echo json_encode(array('msg'=>'Some errors occured.'));
            }
            
        /* jika ada */    
        }else{
            echo json_encode(array('msg'=>'Maaf customer sudah terdaftar'));
        }
    }
    
    if($_GET[act]=='update'){
        
        

        /* mulai lakukan query */
        $sql = "update customer set namaCustomer='$namaCustomer',email='$email', area='$area', telpCustomer='$telepon' where idCustomer='$id'";
        
        $hasil = $db->exec($sql);

        if ($hasil){
	echo json_encode(array('success'=>true));
        } else {
	echo json_encode(array('msg'=>'Some errors occured. :'.$level));
        }
        
        
        
    }
    
    if($_GET[act]=='mobil'){
        
     $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
    $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'idCustomer';  
    $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc'; 
    
    $idCustomer = $_POST['idCust'];
    $session = $_POST['session'];
    
    $offset = ($page-1)*$rows;
	
    $result = array();
    
    if(isset($session)){
    $where = "session = '$session'";    
    }else{
    $where = "idCustomer = '$idCustomer'";
    }
    $rs = $db->query("select count(*) from customer_car where ". $where);
    $row = $rs->fetch(PDO::FETCH_NUM);
    $result["total"] = $row[0];
	
    $rs = $db->query("select * from customer_car where ". $where ." order by $sort $order limit $offset,$rows");
	
    $rows = array();
    while($row = $rs->fetch(PDO::FETCH_OBJ)){
	array_push($rows, $row);
    }
    $result["rows"] = $rows;
	
    echo json_encode($result);
    
    }
    
    
    }else{
    
        /** Retrieve data ke dalam table dari database.. **/
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
    $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'namaCustomer';  
    $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc'; 
    
    
    
    
    $offset = ($page-1)*$rows;
	
    $result = array();
    
    $where = "namaCustomer like '$namaCustomer%' and alamatCustomer like '$alamat%'
    and telpCustomer like '$telepon%' and email like '$email%' and area like '$area%'";

    $rs = $db->query("select count(*) from customer where ". $where);
    $row = $rs->fetch(PDO::FETCH_NUM);
    $result["total"] = $row[0];
	
    $rs = $db->query("select * from customer where ". $where ." order by $sort $order limit $offset,$rows");
	
    $rows = array();
    while($row = $rs->fetch(PDO::FETCH_OBJ)){
	array_push($rows, $row);
    }
    $result["rows"] = $rows;
	
    echo json_encode($result);
    
}
?>
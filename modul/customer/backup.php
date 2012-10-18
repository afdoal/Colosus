$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
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
        
        
        
        
$sql = "select * from user as u, leveluser as l where u.idLevelUser = l.idLevelUser";  
$query = $db->query($sql);
$result = array();  
while($row = $query->fetch(PDO::FETCH_ASSOC)){  
    array_push($result, $row);  
}  
  
echo json_encode($result);
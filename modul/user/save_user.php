<?php

/** include connection **/
include 'conn.php';

/* mulai lakukan query */
        $uname = $_REQUEST['namaUser'];
        $email = $_REQUEST['email'];
        $password = md5($_REQUEST['password']);
        $level = $_REQUEST['levelUser'];
        $username = $_REQUEST['uname'];

        $sql = "insert into user(uname,namaUser,email,pass,idLevelUser) values('$username','$uname','$email','$password','$level')";
        $result = $db->exec($sql);
        if ($result){
	echo json_encode(array('success'=>true));
        } else {
	echo json_encode(array('msg'=>'Some errors occured.'));
        }
?>
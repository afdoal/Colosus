<?php

/* include koneksi ke database */
include 'conn.php';

/* query data */
        $id = $_REQUEST['idUser'];
        $uname = $_REQUEST['namaUser'];
        $email = $_REQUEST['email'];
        $password = md5($_REQUEST['password']);
        $level = $_REQUEST['levelUser'];
        $username = $_REQUEST['uname'];
        $state = is_numeric($level);


        /* jika password kosong maka jangan dimasukan ke query */
        if($password==''){
        $katasandi = ",pass='$password'";
        }else{
        $katasandi = "";    
        }
        
        /* jika leveluser bukan angka maka jangan di masukan ke query */
        if($state){
            $levelusr = ",idLevelUser='$level'";
        } else {
            $levelusr = "";
        }
        
        /* mulai lakukan query */
        $sql = "update user set namaUser='$uname',uname='$username' $katasandi,email='$email' $levelusr where idUser='$id'";
        
        $hasil = $db->exec($sql);

        if ($hasil){
	echo json_encode(array('success'=>true));
        } else {
	echo json_encode(array('msg'=>'Some errors occured. :'.$level));
        }

?>
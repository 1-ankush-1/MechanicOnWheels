<?php
include ('connect.php');

    $lat= $_POST['lats'];
    $long=$_POST['langs'];
    $m_id =$_POST['m_id'];
    $name = $_POST['m_name'];
    $addr = $_POST['addr'];
    $img = $_POST['img'];
    $phn = $_POST['m_phn'];
    $pass=$_POST['m_pass'];
    $sql = "INSERT INTO mechanic(m_id,m_name,img,m_phn,latitude,longitude,addr,m_pass) VALUES($m_id,'$name','file_get_contents($img)',$phn,$lat,$long,'$addr','$pass')";
    $rs = mysqli_query($con,$sql);
    if($rs){
        echo"record inserted";
    }
?>
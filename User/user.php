<?php
session_start();                                    
include("../Service/connect.php");
#$con = mysqli_connect('localhost','root','','wheels');
if(isset($_POST['register'])) {
$u_id = $_POST['u_id'];
$name= $_POST['name'];
$DrivLic = $_POST['licen'];
$phn = $_POST['phn'];
$passw = $_POST['passw'];
$name = $_POST['name'];
$vtype = $_POST['vtype'];
$vname = $_POST['vname'];
$error = ""; 

try {
$sql = "INSERT INTO user(u_id,d_licence,ph_no,u_pass,name,v_type,v_name) VALUES($u_id,'$DrivLic',$phn,'$passw','$name','$vtype','$vname')";
$rs = mysqli_query($con,$sql);

//Testing purpose
// $sql1 = "INSERT INTO vehicle(u_id, v_type,v_name) VALUES (302,'djas','kas13')";
// $rs1 = "mysqli_query($con,$sql1)";
    // if($rs){
    //     header("location:login.php");
    // }
    // else{
    //     header("location:index.php");  
    // }

} catch (Exception $e) {
    if(str_contains($e->getMessage(), 'd_licence')){                //checking if error message contain d_licence in it
    $error="Driving Licence Already Exist";                         //than print this
    }   
    else{
        $error="ID Already Exist";                            //else print this
    }
}
finally{
    if(empty($error)){                                              //if string is empty than credentials are valid and open login page
        header("location:login.php");           
    }
    else{
    header("location:index.php");                                   //if it get any string refresh the page and print error message
    $_SESSION["error"] = $error;
    } 
}
}
else{
    echo"failed";
}

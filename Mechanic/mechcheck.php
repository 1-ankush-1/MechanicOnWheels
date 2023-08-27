<?php
session_start();                                    //started session 
include("../Service/connect.php");                            //calling connect file
$error = "username/password incorrect";         //giving error msg
$id = $_GET['m_id'];
$pass = $_GET['m_pass'];
$sql = "SELECT m_id,m_pass FROM mechanic WHERE m_id='$id'";
$rs = mysqli_query($con, $sql);          //it return result statement
while ($row = mysqli_fetch_assoc($rs)) {
    $value1 = $row["m_id"];
    $value2 = $row["m_pass"];
}

if ($id != null and $id == $value1 and $pass == $value2) {                    //comparing string
    //strcmp($pass,$val)
    // <!-- <script type="text/javascript"> -->
    // <!-- // window.location = 'ExtraPage.html?val=$value';           -->
    // <!-- // </script>  -->

    header("location: ../index.php?m_id=$id");
} else {
    $_SESSION["error"] = $error;                        //storing the msg in session error
    header("location: mechLogin.php");
}

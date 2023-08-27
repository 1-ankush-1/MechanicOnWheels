<!-- problem is going to another page if id is not there -->
<?php
session_start();                                    //started session 
include("../Service/connect.php");                            //calling connect file
$error = "username/password incorrect";         //giving error msg
$id = $_GET['u_id'];
$pass = $_GET['pass'];
$sql = "SELECT u_id,u_pass FROM user WHERE u_id='$id'";
$rs = mysqli_query($con, $sql);          //it return result statement
while ($row = mysqli_fetch_assoc($rs)) {
    $value1 = $row["u_id"];
    $value2 = $row["u_pass"];
}

if ($id != null and $id == $value1 and $pass == $value2) {                    //comparing string
    //strcmp($pass,$val)
    // <!-- <script type="text/javascript"> -->
    // <!-- // window.location = 'ExtraPage.html?val=$value';           -->
    // <!-- // </script>  -->
    $_SESSION["pass"] = $pass;
    $_SESSION["id"] = $id;
    header("location:complaint.php?u_id=$id");
} else {
    $_SESSION["error"] = $error;                        //storing the msg in session error
    header("location: login.php");
}
?>
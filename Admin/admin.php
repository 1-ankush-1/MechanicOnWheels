<?php
include ('connect.php');

// if(isset($_GET['admin'])){
    $id = $_GET['id'];
    $pass = $_GET['pass'];
    $sql = "SELECT a_id,a_pass FROM admin WHERE a_id='$id'";
    $rs = mysqli_query($con,$sql);          //it return result statement
    while($row = mysqli_fetch_assoc($rs)){
    $value1 = $row["a_id"];
    $value2 = $row["a_pass"];
    }
    if($id != null and $id == $value1 and $pass == $value2){                    //comparing string
        //strcmp($pass,$val)
        // <!-- <script type="text/javascript"> -->
        // <!-- // window.location = 'ExtraPage.html?val=$value';           -->
        // <!-- // </script>  -->
        // <!-- header("location:complaint.php?u_id=$id"); -->
        header("Location:detail.html");
    }
// }
else{
    header("Location:admin.html");
}
?>
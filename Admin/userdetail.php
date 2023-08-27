<?php
include "connect.php";
        $sql = "SELECT u_id,d_licence,ph_no,u_pass,name FROM user";
        $rs = mysqli_query($con,$sql);          //it return result statement
?>
<hmtl>
<head>
    <title>Users</title> 
    <link rel="stylesheet" href="css/Table.css">
</head>
<body>
    <?php  
        echo "<table id='customers'";
        echo "<tr><th>userid</th><th>driving licence</th><th>phone no</th><th>password</th><th>name</th></tr>";
        while($row = mysqli_fetch_assoc($rs))
        {
            echo "<tr><td>$row[u_id]</td><td>$row[d_licence]</td><td>$row[ph_no]</td><td>$row[u_pass]</td><td>$row[name]</td></tr>";
        }
        echo"</table>";
    ?>
</body>
</hmtl>
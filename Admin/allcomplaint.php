<?php
include "connect.php";

$sql = "SELECT name,complain.c_no,user.v_type,user.v_name,v_no,v_description,charge,rating,f_descrption,DateTime FROM complain,feedback,user where feedback.c_no = complain.c_no and complain.u_id = user.u_id";
$rs = mysqli_query($con,$sql);
                                                      //it return result statemen
?>
<hmtl>
<head>
  <title>Complaints</title>
  <link rel="stylesheet" href="css/Table.css">
</head>
<body>

    <?php echo"<table id='customers'>";
            echo"<tr>
            <th>user</th>
            <th>Complain no</th>
            <th>vehicle type</th>
            <th>vechicle name</th>
            <th>vechicle number</th>
            <th>description</th>
            <th>charge</th>
            <th>rating</th>
            <th>feedback</th>
            <th>Time</th>
            </tr>";
          while($row = mysqli_fetch_assoc($rs))
            {
            echo"<tr>
                <td>$row[name]</td>
                <td>$row[c_no]</td>
                <td> $row[v_type]</td>
                <td>$row[v_name]</td>
                <td> $row[v_no]</td>
                <td>$row[v_description]</td>
                <td> $row[charge]</td>
                <td> $row[rating]</td>
                <td> $row[f_descrption]</td>
                <td>$row[DateTime]</td>
            </tr>";
        }
        echo"</table>";
        ?>

</body>
</hmtl>

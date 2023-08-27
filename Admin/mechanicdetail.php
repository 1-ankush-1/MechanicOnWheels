<?php
include "connect.php";

$sql = "SELECT m_id,m_name,img,m_phn,addr FROM mechanic";
$rs = mysqli_query($con, $sql);          //it return result statement
?>

<hmtl>

    <head>
        <title>detail</title>
        <link rel="stylesheet" href="css/Table.css">
    </head>

    <body>
        <?php
        echo "<table id='customers'>";
        echo "<tr>
                    <th>id</th>
                    <th>mechanic name</th>
                    <th>image</th>
                    <th>phone no</th>
                    <th>address</th>
                    </tr>";
        while ($row = mysqli_fetch_assoc($rs)) {
            echo "<tr>
                        <td>$row[m_id]</td>
                        <td>$row[m_name]</td>
                        <td><img src=data:image/jpeg;base64,'.base64_encode($row[img]).'/></td>
                        <td> $row[m_phn]</td>
                        <td>$row[addr]</td>
                    </tr>";
        }
        echo "</table>";
        ?>
    </body>
</hmtl>
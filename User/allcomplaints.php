<?php
session_start();
if (!$_SESSION['pass']) {
    header("location: login.php");
}
include("../Service/connect.php");  //calling connect file
$u_id = $_SESSION['id'];
?>
<html>

<head>
    <link rel="stylesheet" href="css/allcomplaints.css" />
</head>

<body>
    <div class="homeHead">
        <div class="logo">
            <img src="css/logo.png">
        </div>
        <div class="right">
            <a href="./complaint.php?u_id=<?php echo $u_id; ?>" class="btn">New Complaint</a>
            <a href="./logout.php" class="btn">Logout</a>
        </div>
    </div>
    <?php
    $sql = "SELECT * FROM complain WHERE u_id='$u_id' ORDER BY DateTime DESC";
    $rs = mysqli_query($con, $sql);
    if (mysqli_num_rows($rs) > 0) {  ?>
        <table class="showtable">
            <thead>
                <tr>
                    <th>Vechicle Type</th>
                    <th>Vechicle Number</th>
                    <th>Problem Description</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($rs)) {
                    echo "<tr>
                    <td>$row[v_type]</td>
                    <td>$row[v_no]</td>
                    <td>$row[v_description] </td>
                    <td>$row[DateTime] </td>
                </tr>";
                } ?>
            </tbody>
        </table>
    <?php } else { ?> <h1>No Complain Found <h1> <?php } ?>

</body>

</html>
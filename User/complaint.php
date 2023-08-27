<?php
error_reporting(E_ERROR | E_PARSE);     //hide the warnings on page
session_start();
if (!$_SESSION['pass']) {
    header("location: login.php");
}
include("../Service/connect.php");
$uid = $_SESSION['id'];
?>

<html>

<head>
    <title>Complain</title>
    <link rel="stylesheet" href="css/complaint.css">
</head>

<body>
    <div class="homeHead">
        <div class="logo">
            <img src="css/logo.png">
        </div>
        <div class="right">
            <a href="./allcomplaints.php?u_id=<?php echo $uid; ?>" class="btn">MyComplaints</a>
            <a href="./logout.php" class="btn">Logout</a>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="comp-form">
                <h1 id="si">Complaint<span class="animate">📝</span></h1>
                <form action="complaint.php" method="post" class="contentForm">
                    <input type="hidden" id="uid" name="uid" value="<?php echo $uid; ?>">
                    <label name="c_n">Complain Number</label>
                    <input type="text" name="c_n" pattern="^[0-9]*$" required>
                    <label name="vtype">Vechicle Type</label>
                    <select id="vtype" name="vtype" list="vtype" placeholder="choose" required>
                        <option value="Bike">Bike</option>
                        <option value="Car">Car</option>
                        <option value="Truck">Truck</option>
                    </select>
                    <label name="vname">Vechicle Name</label>
                    <input type="text" name="vname" required>
                    <label name="v_n">Vechicle Number</label>
                    <input type="text" name="v_n" pattern=".{10}" required>
                    <label name="descr">Desription</label>
                    <input type="text" name="descr">
                    <div class="submit">
                        <button type="submit" name="complain" class="btn">Register</button>
                    </div>
                    <!-- <input type="submit" name="complain" > -->

                    <!-- backend code-->
                    <?php
                    #$con = mysqli_connect('localhost','root','','wheels');
                    if (isset($_POST['complain'])) {
                        try {
                            $u_d = $_POST['uid'];
                            $complno = $_POST['c_n'];
                            $VT = $_POST['vtype'];
                            $VN = $_POST['vname'];
                            $vechno = $_POST['v_n'];
                            $descr = $_POST['descr'];

                            $sql = "INSERT INTO complain(c_no,u_id,v_type,v_name,v_no,v_description) VALUES($complno,$u_d,'$VT','$VN','$vechno','$descr')";
                            $rs = mysqli_query($con, $sql);
                            if ($rs) {
                                header("location:getnear.php?c_no=$complno");
                            }
                        } catch (Exception $e) {
                            echo "<span style='color:red;'>Enter valid id</span>";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
session_start();
if (!$_SESSION['pass']) {
    header("location: login.php");
}
include("../Service/connect.php");
?>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Feedback</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
        <?php include 'css/istyle.css'; ?>
    </style>
    <script src='main.js'></script>
</head>

<body>
    <div class="homeHead">
        <div class="right">
            <a href="./logout.php" class="btn">Logout</a>
        </div>
    </div>
    <div class="login-form">
        <h1 id="si">Feedback</h1>
        <form method="post" action="#" class="contentForm">
            <div class="spcbtwinp">
                <label for="rate">Rating</label>
                <input type="text" name="rate">
            </div>
            <div class="spcbtwinp">
                <label for="charge">Charge</label>
                <input type="text" name="charge">
            </div>
            <div class="spcbtwinp">
                <label for="desc">Description</label>
                <input type="text" name="desc">
            </div>
            <button type="submit" name="sent">Sent</button>

            <?php
            if (isset($_POST["sent"])) {
                $c_no = $_GET["c_no"];
                $rate = $_POST["rate"];
                $charge = $_POST["charge"];
                $desc = $_POST["desc"];

                $sql = "INSERT into feedback(c_no,rating,charge,f_descrption) values($c_no,$rate,$charge,'$desc')";
                $rs = mysqli_query($con, $sql);
                if ($rs) {
                    echo "<span style= 'color:green';> 'Thank you for your feedback'</span>";
                } else if (null) {
                    echo "failed";
                }
            }
            ?>

        </form>
    </div>
</body>

</html>
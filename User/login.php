<!-- give logout alert -->
<?php
if (isset($_GET['logged_out']) && $_GET['logged_out'] == 'true') {
    echo '<script>alert("You have successfully logged out.");</script>';
}
?>

<?php                                                 //A session is a way to store information (in variables) to be used across multiple pages.
session_start();                                 //starting session to get the value of error can be used for autentication
?>

<!-- calling css with php -->
<style>
    <?php include 'css/istyle.css'; ?>
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet"> -->
</head>

<body>
    <div class="login-form">
        <h1 id="si">Login<span class="animate">&#x1F9F0;</span></h1>
        <form method="get" action="check.php" class="contentForm">
            <div class="spcbtwinp">
                <label for="u_id">USER ID</label>
                <input type="text" name="u_id" pattern="^[0-9]*$" placeholder="Enter number" required>
            </div>
            <div class="spcbtwinp">
                <label for="pass">PASSWORD</label>
                <input type="password" name="pass" pattern="^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$" placeholder="Trial@1" required>
            </div>
            <?php
            if (isset($_SESSION["error"])) {          //get the error msg of check file
                $error = $_SESSION["error"];
                echo "<span style='color:red;text-align:center;'>$error</span>";         //span is used for styling purpose
            }
            ?>
            <div class="btngroup">
                <button type="submit" name="login" class="btn">Login</button>
                <a href="../index.php" class="btn">Register</a>
            </div>
        </form>
    </div>

</body>

</html>
<?php
unset($_SESSION["error"]);              //unsetting the session so when refresh error is not visible 
?>
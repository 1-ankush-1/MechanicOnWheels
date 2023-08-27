<?php                                            //A session is a way to store information (in variables) to be used across multiple pages.
session_start();                                //starting session to get the value of error
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="User/css/style.css">
</head>

<body>
    <div class="homeHead">
        <div class="logo">
            <img src="css/logo.png">
        </div>

        <div class="right">

            <a href="Admin/admin.html" class="btn">Admin</a>
            <a href="Mechanic/mechLogin.php" class="btn">Mechanic</a>
            <a href="User/login.php" class="btn">User</a>
        </div>
    </div>

    <!-- <img src="css/regis2.jpg">
                <img src="css/regis1.jpg">
                <img src="css/regis3.jpg"> -->

    <div class="backgroundimg">
        <div class="container2">
            <img src="css/regis4.jpg">
        </div>
        <div class="container">
            <h1 id="si">Register</h1>
            <form name="GetDetailOfUser" method="post" action="User/user.php">
                <label name="u_id">User Id</label>
                <input type="text" name="u_id" required>
                <label name="name">Name</label>
                <input type="text" name="name" required>
                <label name="licen">Driving Licence</label>
                <input type="text" name="licen" pattern=".{16}" required>
                <label name="vtype">Vechicle Type</label>
                <select id="vtype" name="vtype" list="vtype" placeholder="choose" required>
                    <option value="Bike">Bike</option>
                    <option value="Car">Car</option>
                    <option value="Truck">Truck</option>
                </select>
                <label name="vname">Vechicle Name</label>
                <input type="text" name="vname" required>
                <label name="phn"> Phone no</label>
                <input type="text" name="phn" pattern="[0-9]{10}" required>
                <label name="passw">password</label>
                <input type="password" name=" passw" pattern="^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$" required>
                <?php
                if (isset($_SESSION["error"])) {          //get the error msg of check file
                    $error = $_SESSION["error"];
                    echo "<span style='color:red;'>$error</span>";         //span is used for styling purpose
                }
                ?>
                <input type="submit" class="btn" name="register">

            </form>
        </div>
    </div>

</body>

</html>
<?php
unset($_SESSION["error"]);              //unsetting the session so when refresh error is not visible 
?>
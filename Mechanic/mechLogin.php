<?php                                            //A session is a way to store information (in variables) to be used across multiple pages.
session_start();                                //starting session to get the value of error
?>
<style>
    <?php include 'css/istyle.css'; ?>
</style>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='css/istyle.css'> -->
</head>

<body>
    <div class="login-form">
        <h1 id="si">Mechanic<span class="animate">&#x1F9F0;</span></h1>
        <form method="get" action="mechcheck.php" class="contentForm">
            <div class="spcbtwinp">
                <label for="m_id">ID</label>
                <input type="text" name="m_id" placeholder="Enter Id">
            </div>
            <div class="spcbtwinp">
                <label for="m_pass">PASSWORD</label>
                <input type="text" name="m_pass" placeholder="Ladd1@1">
            </div>
            <?php
            if (isset($_SESSION["error"])) {          //get the error msg of check file
                $error = $_SESSION["error"];
                echo "<span style='color:red;text-align:center;'>$error</span>";         //span is used for styling purpose
            }
            ?>
            <!-- <label for="login">hyy</label> -->
            <button type="submit" name="login" class="btn">Login</button>
        </form>
    </div>

</body>

</html>
<?php
unset($_SESSION["error"]);              //unsetting the session so when refresh error is not visible 
?>
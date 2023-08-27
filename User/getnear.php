<?php
session_start();
if (!$_SESSION['pass']) {
  header("location: login.php");
}
$backg = "car1.svg";                      //storing image in variable to pass in css 
?>

<!DOCTYPE html>
<html lan="en">

<head>
    <title>FindMechanic</title>
    <style>
        html {
            height: 100%;
        }

        body {
            background-color: #222222;
            background-repeat: no-repeat;
            background-image: url('<?php echo $backg; ?>');
            position: relative;
            /*position of parent is fixed*/
        }

        /* Button resets and style */
        button {
            margin: 15px auto;
            font-family: "Montserrat";
            font-size: 20px;
            color: #ffffff;
            cursor: pointer;
            border-radius: 100px;
            padding: 15px 20px;
            border: 0px solid #000;
            position: absolute;
            /*here position is absolute and changing it by top right left bottom */
            top: 600px;
            right: 420px;

        }

        /* Initiate Auto-Pulse animations */
        button.pulse-button {
            animation: borderPulse 1000ms infinite ease-out, colorShift 10000ms infinite ease-in;
        }

        /* Initiate color change for pulse-on-hover */
        button.pulse-button-hover {
            animation: colorShift 10000ms infinite ease-in;
        }

        /* Continue animation and add shine on hover */
        /* button:hover,
            button:focus {
                animation: borderPulse 1000ms infinite ease-out, colorShift 10000ms infinite ease-in, hoverShine 200ms;
            } */

        /* Declate color shifting animation */
        @keyframes colorShift {

            0%,
            100% {
                background: #0045e6;
            }

            33% {
                background: #fb3e3e;
            }

            66% {
                background: #0dcc00;
            }
        }

        /* Declare border pulse animation */
        @keyframes borderPulse {
            0% {
                box-shadow: inset 0px 0px 0px 5px rgba(255, 255, 255, .4), 0px 0px 0px 0px rgba(255, 255, 255, 1);
            }

            100% {
                box-shadow: inset 0px 0px 0px 3px rgba(117, 117, 255, .2), 0px 0px 0px 10px rgba(255, 255, 255, 0);
            }
        }


        @media (min-width: 500px) and (max-width: 1300px) {
            button {
                top: 450px;
                right: 100px;
            }
        }
    </style>
</head>
<!-- getting location in html5 -->

<body onload="getLocation()"> <!-- on form load it will call the getlocation function -->
    <form action="getnear.php" method="post">
        <input type="hidden" name="cmp_no" id="cmp_no" value="<?php echo $_GET['c_no'] ?>">
        <input type="hidden" name="lats" id="lats">
        <input type="hidden" name="langs" id="langs">
        <button type="submit" name="subm" id="subm" class="pulse-button">Find Near</button>

        <!-- php -->
        <?php
        // if (isset($_POST['subm'])) {
        if (array_key_exists('subm', $_POST)) {
            $l1 = $_POST['lats'];
            $l2 = $_POST['langs'];
            $l3 = $_POST['cmp_no'];
            header("location:near.php?lat=$l1&lang=$l2&c_no=$l3");           //sending lat and long to near.php
        }
        ?>

    </form>
    <!-- javascript -->
    <script type="text/javascript">
        function getLocation() {
            if (navigator.geolocation) { //navigator is object of geolocation
                // to get current location
                navigator.geolocation.getCurrentPosition(showPosition); //using method getcurrentposition         
            }
        }

        function showPosition(position) {
            document.getElementById("lats").value = position.coords.latitude; //get position coords object method latitude and store in lats lasts long
            document.getElementById("langs").value = position.coords.longitude;
        }
    </script>
</body>

</html>
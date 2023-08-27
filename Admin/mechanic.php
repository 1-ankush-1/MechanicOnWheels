<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mechanic</title>
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>


<body >
    <div >
        <div class="logo">
            <img src="css/logo.png">
        </div>
    </div>

    <div class="container">
        <h1 id="si">Mechanic Registration</h1>
        <form name="Mechanic" method="post" action="mechanicfill.php">
            <label for="m_name">Name</label>
            <input type="text" name="m_name">
            <label for="m_id">Mechanic ID</label>
            <input type="text" name="m_id">
            <label for="m_pass">Password</label>
            <input type="text" name="m_pass">
            <label for="addr">Address</label>
            <input type="text" name="addr">
            <label for="img">image</label>
            <input type="file" accept="img/*" name="img"><br>
            <label for="m_phn">Phone no</label>
            <input type="text" name="m_phn">
            <label for="lats">latitude</label>
            <input type="text" name="lats" id="lats" value="">
            <label for="langs">longitude</label>
            <input type="text" name="langs" id="langs">
            <input type="submit" class="btn" name="mechanic" id="mechanic">
            <!-- 
            // if(array_key_exists('mechanic', $_POST)) {
            //     $l1 = $_POST['lats'];
            //     $l2 = $_POST['langs'];
            //     header("location:mechanicfill.php?lat=$l1&lang=$l2");           //sending lat and long to near.php
            // }
             -->
        </form>
    </div>

    <!-- javascript
    <script type="text/javascript">
        function getLocation()
        {
            if(navigator.geolocation){
                // to get current location
                navigator.geolocation.getCurrentPosition(showPosition);             
            }
        }
        function showPosition(position)
        {
            document.getElementById("lats").value=position.coords.latitude;
            document.getElementById("langs").value=position.coords.longitude;
        }
    </script> -->

</body>
</html>

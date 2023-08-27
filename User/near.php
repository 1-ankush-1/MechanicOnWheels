<?php
error_reporting(E_ERROR | E_PARSE);     //hide the warnings on page
session_start();
if (!$_SESSION['pass']) {
  header("location: login.php");
}
include("../Service/connect.php");

$lat =  $_GET['lat'];
$lang = $_GET['lang'];
$c_no = $_GET['c_no'];
$rs = null;

if (!$lat || !$lang || !$c_no) {
  if (!$c_no) {
    header("location: complaint.php");
  } else {
    header("location: getnear.php?c_no=$c_no");
  }
} else {
  //insert in location database
  $sql = "INSERT into location(c_no,latitude,longitude) values($c_no,$lat,$lang)";
  $rs = mysqli_query($con, $sql);

  //get machanic detail in 25km radius
  $sql = "SELECT m_name,m_phn,addr , CAST(SQRT( POWER(69.1 * ($lat - latitude), 2) +
POWER(69.1 * (longitude - $lang) * COS(latitude / 57.3), 2))*1.60934 AS DECIMAL(10,2))
 AS distance
FROM mechanic HAVING distance < 25 ORDER BY distance";

  // execute query
  $rs = mysqli_query($con, $sql);
}

//Testing pupose
// if($rs){
//   echo "inserted";
// }
// else{
//   echo "not inserted";
// }

// Testing purpose - query to get near adress 
// $sql = " SELECT m_name,m_phn,addr , (3956 * 2 * ASIN(SQRT( POWER(SIN(( $lat - latitude) *  pi()/180 / 2), 2) +COS( $lat * pi()/180) * COS(latitude * pi()/180) * POWER(SIN(( $lang - longitude) * pi()/180 / 2), 2) ))) as distance  
// from mechanic  
// having  distance <= 25 
// order by distance";

?>

<!-- html -->
<html>

<head>
  <title>Mechanics</title>
  <link rel="stylesheet" href="css/allcomplaints.css" />
</head>
<!-- php -->
<!-- html it will execute if it has record and loop till the no of records-->

<body>
  <div class="homeHead">
    <div class="logo">
      <img src="css/logo.png" />
    </div>
    <div class="right">
      <a href="./complaint.php" class="btn">New Complaint</a>
      <a href="./logout.php" class="btn">Logout</a>
    </div>
  </div>

  <?php if ($rs != null && mysqli_num_rows($rs) > 0) {              //if no of rows greater than zero
    echo "<table class='showtable'>";
    echo "
      <thead>
      <tr>
            <th>Name</th>
            <th>phone</ph>
            <th>Address</th>
            <th>Distance(in KM)</th>
          </tr>
          </thead>";
    // output data of each row
    while ($row = mysqli_fetch_assoc($rs)) {
      echo "<tbody>
            <tr>
              <td>$row[m_name]</td>           
              <td>$row[m_phn]</td>  
              <td>$row[addr] </td>
              <td>$row[distance] Km</td>
            </tr></tbody>";
    }
    echo "</table>";
  } else {
  ?>
    <!-- html -->
    <table class='showtable'>
      <thead>
        <tr>
          <th>Details</th>
          <th>Contact Us</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo "no mechanic is near" ?></td>
          <td><?php echo "+919100203103" ?></td>
        </tr>
      </tbody>
    </table>
  <?php
  }
  ?>
  <form action="#" method="post">
    <button type="submit" name="feed" class="feed">Feedback</button>
    <!-- php -->
    <?php
    if (isset($_POST['feed'])) {
      header("location:feedback.php?c_no=$c_no");
    }
    ?>
  </form>

</body>

</html>
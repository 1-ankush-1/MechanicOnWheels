<?php 
// Database configuration 
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "wheels"; 
 
// Create database connection 
$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 

// Check connection 
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>
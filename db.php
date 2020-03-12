<?php
$servername = "remotemysql.com:3306";
$username = "amEitkqjL3";
$password = "ZIRikuGHnT";
$database = "amEitkqjL3";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>

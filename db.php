<?php
$servername = "remotemysql.com";
$username = "amEitkqjL3";
$password = "ZIRikuGHnT";
$database = "amEitkqjL3"
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>This is a page</h1>
  </body>
</html>

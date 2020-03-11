
<?php

$servername = "http://remotemysql.com:3306";
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

//phpinfo();
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="style/stylesheet.css">
  </head>
  <body>
      <a href="#"><div class="logo-wrap">
          <span class="ex"></span><span class="track">Track</span>
      </div></a>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
  <a href="db.php">Database</a> <br><br>

  <?php
      echo "Hello World";
   ?>

  </body>
</html>

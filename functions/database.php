<?php

require('dbDetails.php');

$conn = mysqli_connect($hostname, $dbUserName, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
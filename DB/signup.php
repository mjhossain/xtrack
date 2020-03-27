<?php
$conn = mysqli_connect('localhost','anup','password','simple_signup');
if (!$conn) {
  echo 'Connection Error! ' . mysqli_connect_error();
}
if ($conn->query($sql) != TRUE) { // if the table has not been created do the following
  $table_sql = "CREATE TABLE UserInfo(
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(20) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
}


if (mysqli_query($conn, $table_sql)) {
    // echo "Table created successfully";
} else {
//    echo "Error creating table" . mysqli_error($conn);
}

if (isset($_POST['submit'])) {
$name = $email = $password = '';

if (empty($_POST['full_name'])) {
  echo "Enter your full name";
}else{
  $name = mysqli_real_escape_string($conn,$_POST['full_name']);
}

if (empty($_POST['email'])) {
  echo "Enter your email address";
}else{
  $email = mysqli_real_escape_string($conn,$_POST['email']);
}

if (empty($_POST['password'])) {
  echo "Enter a password";
}else{
  $password = mysqli_real_escape_string($conn,$_POST['password']);
}

$insert_sql = "INSERT INTO UserInfo(fullName,email,password) VALUES('$name','$email','$password')";
if (mysqli_query($conn, $insert_sql)) {
    header('Location: dashboard.php');
} else {
    echo "Query Error! " . mysqli_error($conn);
}
}
 ?>

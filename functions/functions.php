<?php

function safeInput($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
  }


function hashPassword($password) {
  $password = mysqli_real_escape_string($password);
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  return $hashedPassword;
}


function testName($name) {
  $name = safeInput($name);
  if(preg_match('/^[A-Za-z\s]+$/', $name)){
    //echo "Name Test Passed!";
    return $name;
  } else {
    //echo "Name Test Failed!";
    return false;
  }
}

function testUsername($username) {
  $length = strlen($username);
  if(preg_match('/\W/', $username) || $length < 8){
    //echo "Username Test Failed!";
    return $username;
  } else {
    //echo "Username Test Passed!";
    return true;
  }
}

function testPassword($password) {
  if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/', $password)){
    //echo "Username Test Passed!";
    return $password;
  } else {
    //echo "Password Test Failed!";
    return false;
  }
}

function testPhone($phone) {
  $phone = safeInput($phone);
  if(preg_match('/^\d+$/', $phone)){
    //echo "Phone Test Passed!";
    return $phone;
  } else {
    //echo "Phone Test Failed!";
    return false;
  }
}

function testEmail($email) {
  $email = safeInput($email);
  if(preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/', $email)){
    //echo "Email Test Passed!";
    return $email;
  } else {
    //echo "Email Test Failed!";
    return false;
  }
}

function testAddress($address) {
  if(preg_match('/[a-zA-Z0-9]/', $address)){
    //echo "Address Test Passed!";
    return true;
  } else {
    //echo "Address Test Failed!";
    return false;
  }
}

function testState($state) {
  $length = strlen($state);
  if(!preg_match('/[A-Z]/', $state) || $length != 2){
    //echo "State Test Falied!";
    return false;
  } else {
    //echo "State Test Passed!";
    return true;
  }
}

function testZip($zip) {
  $length = strlen($zip);
  if(!preg_match('/[a-zA-Z0-9]/', $zip) || $length != 5){
    //echo "Zip code Test Failed!";
    return false;
  } else {
    //echo "Zip code Test Passed!";
    return true;
  }
}



?>
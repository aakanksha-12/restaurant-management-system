<?php

require '../config/dbconfig.php';

if(!isset($_POST['signupbtn'])){
    die("Invalid Operation!");
}

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


$fullname = $city = $mob = $mail = $gender = $dob = $username = $password = "";

$fullname = $_POST['fullname'];
$city = $_POST['city'];
$mob = $_POST['mobno'];
$mail = $_POST['email'];
$gender = $_POST['gender'];
$dob = $_POST['cdob'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO customer(fullname, city, mobno, email, gender, cdob, username, password) VALUES('$fullname', '$city', '$mob', '$mail', '$gender', '$dob', '$username', '$password')";

if(mysqli_query($conn, $sql)){
    header('Location: ../signin.php');
}
else{
    die("Error Occured : ".mysqli_error($conn));
}



?>
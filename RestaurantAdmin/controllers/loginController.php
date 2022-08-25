<?php

session_start();
require '../config/dbconfig.php';

if(!isset($_POST['signinbtn'])){
    die('Invalid Operation');
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) < 1){
    die('Login Failed...');
}

$_SESSION['adminLoggedIn'] = true;
header('Location: ../index.php');


?>
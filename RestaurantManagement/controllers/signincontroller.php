<?php

session_start();

require '../config/dbconfig.php';

if(!isset($_POST['signinbtn'])){
    die("Invalid Operation!");
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM customer WHERE username='$username' AND password='$password'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    // echo "Login Successfull";

    $row = mysqli_fetch_array($result);

    $_SESSION['isLoggedIn'] = true;
    $_SESSION['user'] = $row;

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";

    header('Location: ../placeOrder.php');

}else{
    echo "Login failed";
}


?>
<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'restaurant';

$conn = mysqli_connect($host, $username, $password, $dbname);



if(!$conn)
    die('Connection Error: '.mysqli_error($conn));

// echo 'Connected';

?>
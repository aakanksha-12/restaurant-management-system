<?php 

session_start();

session_destroy();

echo "logging out...";

header('Location: ../index.php');


?>
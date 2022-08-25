<?php

session_start();

if(!isset($_SESSION['adminLoggedIn'])){
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="./style/bootstrap-slate.css">
    <link rel="stylesheet" href="./style/style.css">

</head>
<body>
    
    <nav class="navbar navbar-expand bg-dark border-bottom">
        <a class="navbar-brand" href="./index.php">Restaurant Admin</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav position-absolute end-0">
              <li class="nav-item">
                <a class="nav-link active px-3" aria-current="page" href="./ordersPending.php">Orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-3" href="addmenu.php">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-3 text-warning" href="./controllers/logoutcontroller.php">Logout</a>
              </li>
          </ul>
        </div>
    </nav>

    <h1 class="text-center mt-5">Welcome Admin</h1>


    <script src="./scripts/default.js"></script>
</body>
</html>
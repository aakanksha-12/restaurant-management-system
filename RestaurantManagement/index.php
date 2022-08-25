<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Managment</title>

    <link rel="stylesheet" href="./styles/bootstrap-slate.css">
    <link rel="stylesheet" href="./styles/default.css">

</head>
<body>
    <nav class="navbar navbar-expand bg-transparent border-none">
        <a class="navbar-brand" href="#">Restaurant Managment</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav position-absolute end-0">

            <?php
                if(isset($_SESSION['isLoggedIn'])){
            ?>
                 <li class="nav-item">
                    <a class="nav-link active border-none px-3" aria-current="page" href="./bookTable.php">Place Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link border-none px-3" href="./myOrders.php">My Orders</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link border-none px-3 text-warning" href="./controllers/logout.php">Logout</a>
                  </li>
            <?php
                }else{
            ?>
                  <li class="nav-item">
                    <a class="nav-link border-none px-3" href="./signup.php">Signup</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link border-none px-3" href="./signin.php">Signin</a>
                  </li>
            <?php
                }
            ?>

          </ul>
        </div>
    </nav>
    <div class="intro">
        <div class="gradient position-absolute"></div>
        <img src="./images/1.jpg" alt="">
    </div>
    <div class="tagline">
        <p class="line1">True test of,</p>
        <p class="line2">Love...</p>
    </div>
    <!-- <div style="width: 100%;height:8rem;"></div>
    <div class="row">
        <div class="col-md-2 col-sm-1"></div>
        <div class="col-md-8 col-sm-10">
            <h1>Content</h1>
        </div>
        <div class="col-md-2 col-sm-1"></div>
    </div> -->
</body>
</html>
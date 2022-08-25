<?php
  session_start();

  require './config/dbconfig.php';
  
  // if(!isset($_SESSION['isLoggedIn'])){
  //   header('Location: signin.php');
  // }

  $sql = "SELECT * from tables";
  $result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    
    
    <link rel="stylesheet" href="./styles/bootstrap-slate.css">
    <link rel="stylesheet" href="./styles/default.css">

    <style>
      td{
        vertical-align: middle;
      }
      p{
        margin:0;
      }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand bg-dark border-bottom">
        <a class="navbar-brand" href="./index.php">Restaurant Managment</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav position-absolute end-0">
              <li class="nav-item">
                <a class="nav-link active px-3" aria-current="page" href="bookTable.php">Place Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-3" href="./myOrders.php">My Orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-3 text-warning" href="./controllers/logout.php">Logout</a>
              </li>
          </ul>
        </div>
    </nav>
    <div class="container pt-5">

            <h3 class="text-center">Select Table</h3>

           <table class="table mt-5">
             <tr>
               <th>Table Name</th>
               <th>Status</th>
               <th>Action</th>
             </tr>
             <?php

                while($row = mysqli_fetch_array($result))
                {
                  // echo "<pre>";
                  // print_r($row);
                  // echo "</pre>";
                  $button = $row['status'] == 'booked' ? "<button class='btn' disabled>Select</button>" : "<button class='btn btn-success' onclick=bookTable(".$row['id'].")>Select</button>";
                  $status = $row['status'] == 'booked' ? "<p class='text-danger'>Booked</p>" : "<p class='text-success'>Available</p>";
                  echo "<tr>";
                    echo "<td>";
                      echo $row['table_name'];
                    echo "</td>";
                    echo "<td>";
                      echo $status;
                    echo "</td>";
                    echo "<td>";
                      echo $button;
                    echo "</td>";
                  echo "</tr>";

                }

             ?>
           </table>
     </div> 
     
     <form action="./placeOrder.php" method="post" id="bookTable">
        <input type="hidden" name="table_id" id="table_id">
     </form>

     <script src="./script/default.js"></script>

</body>
</html>
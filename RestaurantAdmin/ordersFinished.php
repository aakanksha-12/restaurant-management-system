<?php
  require './config/dbconfig.php';

  function getCount($status, $link){
    $sql = "SELECT count(distinct(order_id)) FROM orders WHERE status='$status'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    return $row[0];
  }
  

  $totalPendingOrders = getCount('pending', $conn);
  $totalServedOrders = getCount('served', $conn);
  $totalFinishedOrders = getCount('finished', $conn);

  $sql = "SELECT distinct(order_id) FROM orders WHERE status='finished'";
  $result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finished</title>

    <link rel="stylesheet" href="./style/bootstrap-slate.css">
    <link rel="stylesheet" href="./style/style.css">

</head>
<body>
    
    <nav class="navbar navbar-expand bg-dark border-bottom">
        <a class="navbar-brand" href="./index.php">Restaurant Admin</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav position-absolute end-0">
              <li class="nav-item">
                <a class="nav-link active px-3" aria-current="page" href="#">Orders</a>
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

    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./ordersPending.php">
            Pending
            <span class="badge bg-danger ">
              <?php echo $totalPendingOrders; ?>
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./ordersServed.php">
            Served
            <span class="badge bg-success ">
              <?php echo $totalServedOrders; ?>
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./ordersFinished.php">
            Finished
            <span class="badge bg-warning ">
              <?php echo $totalFinishedOrders; ?>
            </span>
          </a>
        </li>
      </ul>
      
      <div class="main p-2">

        <?php

            while($row = mysqli_fetch_array($result)){
              // echo "<pre>";
              // print_r($row);
              // echo "</pre>";

              echo "<div class='block'>";
                echo "<div class='sub-block'>";
                  echo "<p style='margin:0'>ID: #".$row[0]."</p>";
                // echo "<p>".$row['status']."</p>";
                    echo "<table class='table'>";
                        echo "<tr>";
                            echo "<th>";
                                echo "Item";
                            echo "</th>";
                            echo "<th>";
                                echo "Quantity";
                            echo "</th>";
                            echo "<th>";
                                echo "Price";
                            echo "</th>";
                        echo "</tr>";

                $sql = "SELECT * FROM orders WHERE order_id='$row[0]'";
                $res1 = mysqli_query($conn, $sql);
                $total = 0;
                $order_status = '';

                $tableid = '';

                while($row1 = mysqli_fetch_array($res1)){
                  if($tableid == ''){
                    echo "Table : Table ".$row1['table_id'];
                    $tableid = $row1['table_id'];
                  }
                  
                    echo "<tr>";
                        echo "<td>";
                            echo str_replace("+"," ", $row1['item_name']);
                        echo "</td>";
                        echo "<td>";
                        echo $row1['quantity'];
                        echo "</td>";
                        echo "<td>";
                        echo $row1['price']." Rs.";
                        echo "</td>";
                    echo "</tr>";

                    $total += $row1['price'];

                }  

                echo "<tr class='text-info'>";
                            echo "<td>";
                            echo "</td>";
                            echo "<th class=''>";
                                echo "Total = ";
                            echo "</th>";
                            echo "<th>";
                                echo $total." Rs.";
                            echo "</th>";
                        echo "</tr>";

                    echo "</table>";

                echo "</div>";
                $order_id = $row[0];
                $statusToChange = "delete";
                echo "<div class='button bg-warning' onclick=changeStatus(" .$order_id.",'" .$statusToChange. "') >";
                  echo "Delete";
                echo "</div>";
              echo "</div>";

            }

        ?>

      </div>

      <form action="./controllers/orderStatusController.php" method="post" id="changeStatus">
        <input type="hidden" name="order_id" id="order_id">
        <input type="hidden" name="status" id="status">
        <input type="hidden" name="table_id" id="table_id">
      </form>

    <script src="./scripts/default.js"></script>
</body>
</html>
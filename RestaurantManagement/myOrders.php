
<?php

session_start();
require './config/dbconfig.php';

if(!isset($_SESSION['isLoggedIn'])){
    header('Location: signin.php');
}

$sql = "SELECT distinct(order_id) FROM orders WHERE cust_id=".$_SESSION['user']['cust_id'];
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
    <link rel="stylesheet" href="./styles/myOrders.css">

</head>
<body>
    <nav class="navbar navbar-expand bg-dark border-bottom">
        <a class="navbar-brand" href="./index.php">Restaurant Managment</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav position-absolute end-0">
              <li class="nav-item">
                <a class="nav-link active px-3" aria-current="page" href="./bookTable.php">Place Order</a>
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
    <div class="main p-2">

        <?php

            while($row = mysqli_fetch_array($result)){
                
                echo "<div class='block bg-primary p-1'>";
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

                while($row1 = mysqli_fetch_array($res1)){
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

                    if($row1['status'] == 'pending')
                        $order_status = "<span class='bg-danger text-white status'>Pending</span>";
                    else if($row1['status'] == 'served')
                        $order_status = "<span class='bg-success text-white status'>Served</span>";
                    else if($row1['status'] == 'finished')
                        $order_status = "<span class='bg-warning status text-white'>Finished</span>";

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

                        // echo "<tr class='text-warning'>";
                        //     echo "<td align='center' colspan='3'>";
                        //         echo $order_status;
                        //     echo "</td>";
                        // echo "</tr>";
                        
                    echo "</table>";
                    echo $order_status;
                echo "</div>";
            }

        ?>
    </div>  
</body>
</html>
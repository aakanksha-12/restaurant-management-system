<?php

session_start();

if(!isset($_SESSION['isLoggedIn'])){
  header('Location: signin.php');
}

if(!isset($_POST['table_id'])){
  header('Location: bookTable.php');
}

$table_id = $_POST['table_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./script/default.js"></script>


    <link rel="stylesheet" href="./styles/bootstrap-slate.css">
    <link rel="stylesheet" href="./styles/default.css">

    <script src="https://kit.fontawesome.com/d47ef31cc1.js" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-expand bg-dark border-bottom">
          <a class="navbar-brand" href="./index.php">Restaurant Managment</a>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav position-absolute end-0">
              <li class="nav-item">
                <a class="nav-link active px-3" aria-current="page" href="#">Place Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-3" href="./myOrders">My Orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-3 text-warning" href="./controllers/logout.php">Logout</a>
              </li>
            </ul>
          </div>
      </nav>

    <div class='menu'>
        <div class='starter border-end'>
            <div class="bg-primary py-3 ps-2">
                <h3>
                    Starter
                </h3>
            </div>
        </div>
        <div class='main border-end'>
            <div class="bg-primary py-3 ps-2">
                <h3>
                    Main Course
                </h3>
            </div>
        </div>
        <div class='desert'>
            <div class="bg-primary py-3 ps-2">
                <h3>
                    Desert
                </h3>
            </div>
        </div>
    </div>
    
    <?php

    require('./config/dbconfig.php');

    $sql = "SELECT * FROM menu";

    $res = mysqli_query($conn, $sql);

    $allData = array();

    // echo '<pre>';
    while($row = mysqli_fetch_array($res))
    {
        $temp = array("menu_id"=>$row['menu_id'], "item_name"=>$row['item_name'], "category"=>$row['category'], "price"=>$row['price']);
        array_push($allData, json_encode($temp));
    }
    // echo '</pre>';


    // echo '<pre>';
    //     print_r($allData);
    // echo '</pre>';

    setcookie('allData', implode("--", $allData));
    // echo implode("--", $allData);
    echo "<script>displayData()</script>";

    ?>

    <div class="billing border-top border-bottom row">
      <div class="col-7 border-end pt-2 ps-3" style="height:100%;overflow: auto;">
        <table cellspacing="5" style="width: 100%;" border="1">
          <thead class="">
            <tr class="border">
              <th class="text-center text-info py-2">Item Name</th>
              <th class="text-center text-info">Quantity</th>
              <th class="text-center text-info">Price</th>
              <th class="text-center text-info">Change Quantity</th>
            </tr>
          </thead>
          <tbody id="finalorders">

          </tbody>
        </table>
      </div>
      <div class="col-5 pt-3 finalamt">
        <h3 class="text-info">
          Final Amount : <span class="text-danger" id="amt">Rs. 0 </span>
        </h3>
        <button class="btn btn-warning mt-4" onclick="placeOrder()">Place Order</button>
      </div>
    </div>

    <form action="./controllers/placeOrderController.php" id="bill" method="post">
      <input name="order" type="hidden" id="finalorder">
      <input name="order_id" type="hidden" id="orderid">
      <input type="hidden" name="table_id" value=<?php echo $table_id; ?>>
    </form>

</body>
</html>
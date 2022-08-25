<?php
session_start();

require '../config/dbconfig.php';

if(!isset($_POST['order'])){
    die('Invalid Operation');
}

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<pre>";
print_r($_POST);
echo "</pre>";

$order_id = $_POST['order_id'];
$table_id = $_POST['table_id'];
$orders = $_POST['order'];

$orders = json_decode($orders, true);

for($i = 0; $i < count($orders); $i++){
    $order = $orders[$i];
    echo "<pre>";
    print_r($order);
    echo "</pre>";

    $sql = "INSERT INTO orders(order_id, cust_id, table_id, item_id, item_name, quantity, price) 
            VALUES('$order_id','".$_SESSION['user']['cust_id']."', '$table_id','".$order['item']['menu_id']."', '".$order['item']['item_name']."', '".$order['quantity']."', '".$order['price']."')";

    mysqli_query($conn, $sql);

}

$sql = "UPDATE tables SET status='booked' WHERE id=$table_id";

mysqli_query($conn, $sql);

echo "<script>alert('Order Placed...!')</script>";

header('Location: ../myOrders.php');

?>
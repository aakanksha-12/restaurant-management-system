<?php

require '../config/dbconfig.php';

if(!isset($_POST['order_id'])){
    die('Invalid Operation');
}

echo "<pre>";
print_r($_POST);
echo "</pre>";

$order_id = $_POST['order_id'];
$status = $_POST['status'];

if($status == 'served' || $status == 'finished'){
    $sql = "UPDATE orders SET status='$status' WHERE order_id='$order_id'";
    $result = mysqli_query($conn, $sql);
    $res = 0;
    if($status == 'finished'){
        $tableid = $_POST['table_id'];
        $sql = "UPDATE tables SET status='available' WHERE id='$tableid'";
        $res = mysqli_query($conn, $sql);
    }

    if($result > 0){
        header('Location: ../ordersPending.php');
    }else{
        echo $result."<br>".$res."<br>";
        echo "Error Occured: ".mysqli_error($conn);
    }

}else{
    $sql = "DELETE FROM orders WHERE order_id='$order_id'";
    $result = mysqli_query($conn, $sql);

    if($result > 0){
        header('Location: ../ordersPending.php');
    }else{
        echo "Error Occured: ".mysqli_error($conn);
    }

}

?>
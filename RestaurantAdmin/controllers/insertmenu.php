
<?php

require '../config/dbconfig.php';
 
 if (isset($_POST['insertdata'])){

     $item_name= $_POST['item_name'];
     $category= $_POST['category'];
     $price=$_POST['price'];

     $query="INSERT INTO menu(item_name,category,price)  VALUES ('$item_name','$category','$price')";
     $query_run= mysqli_query($conn,$query);

     if($query_run)
     {
        echo "<script>alert('Wow! Registration Successfull.')</script>";
         header('Location: ../addmenu.php');
     }
     else{
         echo '<script>alert("Data not saved");</script>';
     }
 }

?>

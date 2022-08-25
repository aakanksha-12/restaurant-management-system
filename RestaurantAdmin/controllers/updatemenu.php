
<?php

require '../config/dbconfig.php';
 
 if (isset($_POST['updatedata'])){

    $id= $_POST['update_id'];

     $item_name= $_POST['item_name'];
     $category= $_POST['category'];
     $price=$_POST['price'];

     $query="UPDATE menu SET item_name='$item_name', category='$category', price='$price' WHERE menu_id='$id' ";
     $query_run= mysqli_query($conn,$query);

     if($query_run)
     {
        echo "<script>alert('Data Updated.')</script>";
         header('Location: ../addmenu.php');
     }
     else{
         echo "<script>alert('Data not updated');</script>";
     }
 }

?>

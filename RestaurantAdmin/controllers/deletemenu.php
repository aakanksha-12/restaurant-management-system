<?php

require '../config/dbconfig.php';

if(isset($_POST['deletedata']))
{
    $id=$_POST['delete_id'];

    $query ="DELETE FROM menu WHERE menu_id='$id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        echo '<script>alert("Data Deleted");</script>';
        header("Location: ../addmenu.php");
    }
    else{
        echo '<script>alert("Data Not Deleted");</script>';
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu Items</title>
    <link rel="stylesheet" href="./style/bootstrap-slate.css">

</head>
<body>

    <nav class="navbar navbar-expand bg-dark border-bottom">
        <a class="navbar-brand" href="./index.php">Restaurant Admin</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav position-absolute end-0">
              <li class="nav-item">
                <a class="nav-link active px-3" aria-current="page" href="./ordersPending.php">Orders</a>
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


<!-- Modal -->
<div class="modal fade" id="additem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Menu Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

            <form action="./controllers/insertmenu.php" method="POST">
            <div class="modal-body">
                    
                    <div class="form-group">
                        <label> Menu Name </label>
                        <input type="text" name="item_name"  class="form-control" placeholder="Add Item Name" required>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-select" type="text" name="category" required>
                        <option value="">Please Select.</option>
                        <option value="starter">Starter</option>
                        <option value="Main Course">Main Course</option>
                        <option value="Dessert">Dessert</option>
                        </select>
                        <div class="invalid-feedback">
                        Please select a valid state.
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <label >Price</label>
                    <input type="number" name="price" class="form-control" placeholder="Enter price">
                    </div>
                        
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="insertdata"  class="btn btn-primary">Save </button>
            </div>
            </form>
    </div>
  </div>
</div>


<!--########################################################################################################################################################################################-->
  
<!-- Edit model -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Menu Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

            <form action="./controllers/updatemenu.php" method="POST">
            <div class="modal-body">

                <input type="hidden" name="update_id" id="update_id">

                    
                    <div class="form-group">
                        <label> Menu Name </label>
                        <input type="text" name="item_name" id="item_name" class="form-control" placeholder="Add Item Name" required>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-select" name="category" id="category" required>
                        <option value="">Please Select.</option>
                        <option value="starter">Starter</option>
                        <option value="Main Course">Main Course</option>
                        <option value="Dessert">Dessert</option>
                        </select>
                        <div class="invalid-feedback">
                        Please select a valid state.
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <label >Price</label>
                    <input type="text" name="price" id="price" class="form-control" placeholder="Enter price">
                    </div>
                        
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="updatedata"  class="btn btn-primary">Save </button>
            </div>
            </form>
    </div>
  </div>
</div>
<!--#######################################################################################################################################-->



<!--########################################################################################################################################################################################-->
  
<!-- Delete model -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Menu Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

            <form action="./controllers/deletemenu.php" method="POST">
            <div class="modal-body">

                <input type="hidden" name="delete_id" id="delete_id">

                <h4>Do you want to delete this data?</h4>
        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" name="deletedata"  class="btn btn-primary">Yes!!Delete it</button>
            </div>
            </form>
    </div>
  </div>
</div>
<!--#######################################################################################################################################-->


 <!--Container-->
<div class="container">
    <div class="jumbotron">
        <div class="card">
            <h2>Menu Items</h2>
        </div>
            <div class=card>
                <div class=card-body>
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#additem">
                     Add Item
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                        <?php
                          $connection = mysqli_connect("localhost","root","");
                          $db = mysqli_select_db($connection,'restaurant');

                          $query = "SELECT * FROM menu";
                          $query_run = mysqli_query($connection,$query);
                        ?>

                        <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
        <?php
         if($query_run)
         {
             foreach($query_run as $row)
             {
        ?>
                        <tbody>
                            <tr>
                                <td> <?php echo $row['menu_id']; ?></td>
                                <td> <?php echo $row['item_name']; ?></td>
                                <td> <?php echo $row['category']; ?></td>
                                <td> <?php echo $row['price']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-success editbtn">EDIT</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger deletebtn">DELETE</button>
                                </td>
                            </tr>
                        </tbody>
            <?php
             }
            }
            else
            {
                    echo "No Record Found";
            }
            ?>
                        </table>

                </div>
            </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>

<script>
        $(document).ready(function() {
            $('.editbtn').on('click',function(){

                    $('#editmodal').modal('show');

                    $tr = $(this).closest('tr');

                    var data=$tr.children("td").map(function(){

                        return $(this).text();

                    }).get();

                    console.log(data);

                    $('#update_id').val(data[0]);
                    $('#item_name').val(data[1]);
                    $('#category').val(data[2]);
                    $('#price').val(data[3]);

        });
    });

</script>


<!--###############DELETE###################333-->
<script>
        $(document).ready(function() {
            $('.deletebtn').on('click',function(){

                    $('#deletemodal').modal('show');

                            $tr = $(this).closest('tr');

                            var data=$tr.children("td").map(function(){

                                return $(this).text();

                            }).get();

                            console.log(data);

                            $('#delete_id').val(data[0]);


        });
    });

</script>

</body>
</html>
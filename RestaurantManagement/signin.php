<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    
    
    <link rel="stylesheet" href="./styles/bootstrap-slate.css">
    <link rel="stylesheet" href="./styles/default.css">

</head>
<body>
    <nav class="navbar navbar-expand bg-dark border-bottom">
        <a class="navbar-brand" href="./index.php">Restaurant Managment</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav position-absolute end-0">
            <li class="nav-item">
              <a class="nav-link px-3" href="./signup.php">Signup</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3" href="#">Signin</a>
            </li>
          </ul>
        </div>
    </nav>
    <div class="container">
        <form action="./controllers/signincontroller.php" method="POST" class="col-6 offset-3" style="margin-top: 10%;">
                <p class="text-center pb-5" style="font-size: 1.6rem; ">Login</p>
                <div class="form-group py-1">
                    <input type="text" class="form-control" placeholder="Username" name="username" value="" required>
                </div>
                <div class="form-group py-1">
                 <input type="password" class="form-control" placeholder="Password" name="password" value="" required>
             </div>
             <div class="form-group py-1">
                 <button name="signinbtn" class="btn btn-primary form-control">Login</button> 
             </div>
             <p class="text-center">Don't have an account? <a href="./signup.php">Register Here</a></h2>
        </form>        
     </div>  
</body>
</html>
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
              <a class="nav-link px-3" href="#">Signup</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3" href="./signin.php">Signin</a>
            </li>
          </ul>
        </div>
    </nav>
    <div class="container">
        <form action="./controllers/signupcontroller.php" method="POST" class="col-6 offset-3">
            <p class="text-center pt-3" style="font-size: 1.6rem;">Create Account</p>
            <div class="form-group py-1">
                <input type="text" class="form-control" placeholder="Full Name" name="fullname" required>
            </div>

            <div class="form-group py-1">
                <input type="text" class="form-control" placeholder="City" name="city" required>
            </div>

            <div class="form-group py-1">
                <input type="number" class="form-control" placeholder="Mobile Number" name="mobno" required>
            </div>

            <div class="form-group py-1">
                <input type="email" class="form-control" placeholder="Email Id" name="email" required>
            </div>

            <div class="row py-1">
                <div class="col-md-6 col-sm-12">
                    <div class="radio form-group">
                        <label>Gender : </label> <br>
                        <input type="radio" class="" name="gender" value="Male"> Male  <input type="radio" class="" name="gender" value="Female"> Female 
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="select-group form-group py-1">
                        <label>Date of birth : </label>
                        <input type="date" class="form-control" name="cdob">
                    </div>
                </div>
            </div>
            <div class="form-group py-1">
                <input type="text" class="form-control" placeholder="Username" name="username" required>
            </div>
            <div class="form-group py-1">
             <input type="password" class="form-control" placeholder="Password" name="password" required>
         </div>
         <div class="form-group py-2">
             <button name="signupbtn" class="btn btn-primary form-control">Register</button> 
         </div>
         <p class="text-center">Have an account? <a href="./signin.php">Login Here</a></h2>
        </form>        
     </div>  
</body>
</html>
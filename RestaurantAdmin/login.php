<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="./style/bootstrap-slate.css">
    <link rel="stylesheet" href="./style/style.css">

</head>
<body>
    
<div class="container">
        <form action="./controllers/loginController.php" method="POST" class="col-6 offset-3" style="margin-top: 10%;">
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
        </form>        
     </div>  


</body>
</html>
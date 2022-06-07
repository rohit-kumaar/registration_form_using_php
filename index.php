<?php 

if (isset($_POST['login'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];

   if (empty($email) || empty($password)) {
       $errorMsg = "Please fill the blank space";
   }else{
       if (is_dir("users/$email")) {
          $readTheFile = fopen("users/$email/details.txt","r");
          fgets($readTheFile);
          $getPassword = trim(fgets($readTheFile));
          if ($password = $getPassword) {
            session_start();
            $_SESSION['sessionEmail']=$email;
             header("location:welcome.php");
          }else{
            $errorMsg = "Please enter a valid password";
          }
       }
   }
}




?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
      <h1>Login</h1>

      <form method="post">

      <div class="form-group">
          <label >Email</label>
          <input type="email" name="email" class="form-control">
      </div>

      <div class="form-group">
          <label >password</label>
          <input type="password" name="password" class="form-control">
      </div>


      <div >
          <input type="checkbox" name="checkbox" >
          Remember me
      </div>

      <div class="form-group">
        <input type="submit" class="btn btn-dark" name="login" value="Login">
        <a href="regd.php">New User</a>
      </div>







      </form>


  </div>
      
      
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
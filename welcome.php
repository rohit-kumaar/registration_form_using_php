<?php 
session_start();
$sessionEmail=$_SESSION['sessionEmail'];
if(empty($sessionEmail)){
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
      defer
    ></script>
</head>
<body>
<nav class="navbar bg-dark text-white">
  <div class="container-fluid">
    <h3 class="navbar-brand">Welcome</h3>
    <form class="d-flex" role="search">
     <h4>Email : <?= $sessionEmail;?> </h4>
    </form>
  </div>
</nav>

<!-- $sessionEmail.jpg image is same name as email  -->
<img src="users/<?= "$sessionEmail/$sessionEmail.jpg";?>" class="rounded-circle" alt="..."><br/>
</body>
</html>
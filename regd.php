<?php 
if(isset($_POST['submit'])){
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
   
    $tmp=$_FILES['file']['tmp_name'];
    $fname=$_FILES['file']['name'];
    $extension=pathinfo($fname,PATHINFO_EXTENSION);

    $isEmpty = empty( $firstName) || empty( $lastName) || empty( $email) || empty( $phone) ||empty( $password) || empty($tmp);
    
    
    if( $isEmpty){
        $errorMsg="Please fill blank fields";
    }
    else {

      $isExtension = $extension=="jpg" || $extension=="png" || $extension=="gif" || $extension=="jpeg";
      
      if ($isExtension) {

        if(is_dir("users/$email")){
               $errorMsg="Email already registered";
          }else{
            mkdir("users/$email");

            if(move_uploaded_file($tmp,"users/$email/$email".".jpg")){
            file_put_contents("users/$email/details.txt","First name : $firstName\nLast name : $lastName\nEmail : $email\nPhone number : $phone\nPassword : $password");
            session_start();
            $_SESSION['session']=$email;
            header("location:welcome.php?uid=$email");
            }else {
              $errorMsg="Uploading error";
          }
          }
      } else {
        $errorMsg="Only upload JPG or PNG file extension";
      }
      
      
      
       
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

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
    <script src="app.js" defer></script>

    <title>Form Validation</title>
  </head>

  <body>
    <!-- ALERT MESSAGE -->
    <?php
               if(isset($errorMsg))
               {
                 ?>

    <div
      id="success"
      class="alert alert-warning alert-dismissible "
      role="alert"
    >
      <strong> <?= $errorMsg; ?></strong>
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
      ></button>
    </div>

    <?php 
               }
               ?>

    <div class="container ">
      <h1 class="text-center">Registration Form</h1>

      <!-- FORM -->
      <form method="post" enctype="multipart/form-data">
        <div class="container">
          <div class="row">
            <div class="col-md-6 mt-5">
              <label for="userName" class="form-label"><b>First Name</b></label>
              <input
                type="text"
                class="form-control"
                id="firstName"
                name="firstName"
                placeholder="Enter Your Name"
              />
              <div class="invalid-feedback">
                Please provide a valid 5-10 charactor long Username
              </div>
              <div class="valid-feedback">Looks good!</div>
            </div>

            <div class="col-md-6 mt-5">
              <label for="lastName" class="form-label"><b>Last Name</b></label>
              <input
                type="text"
                class="form-control"
                id="lastName"
                name="lastName"
                placeholder="Enter Your Last Name"
              />
              <div class="invalid-feedback">
                Please provide a valid 5-10 charactor long Lastname
              </div>
              <div class="valid-feedback">Looks good!</div>
            </div>
          </div>

          <div class="mt-3">
            <label for="email" class="form-label"><b>Email address</b></label>
            <input
              type="email"
              class="form-control"
              id="email"
              name="email"
              placeholder="Enter Your Email"
            />
            <div class="invalid-feedback">
              Please provide a valid email address
            </div>
            <div class="valid-feedback">Looks good!</div>
          </div>

          <div class="mt-3">
            <label for="phone" class="form-label"
              ><b>Enter your phone number</b></label
            >
            <input
              type="phone"
              class="form-control"
              id="phone"
              name="phone"
              placeholder="Enter your number"
            />
            <div class="invalid-feedback">
              Please provide a valid phone number
            </div>
            <div class="valid-feedback">Looks good!</div>
          </div>

          <div class="mt-3">
            <label for="password" class="form-label"
              ><b>Enter your password</b></label
            >
            <input
              type="password"
              class="form-control"
              id="password"
              name="password"
              placeholder="Enter your password"
            />
            <div class="invalid-feedback">Please provide a strong password</div>
            <div class="valid-feedback">Looks good!</div>
          </div>

          <div class="mt-3">
            <input type="file" name="file" class="form-control" aria-label="file example" required>
            <div class="invalid-feedback">Example invalid form file feedback</div>
          </div>

          <input type="submit" name="submit" value="Submit"  class="btn btn-primary mt-3">

         
        </div>
      </form>
    </div>
  </body>
</html>

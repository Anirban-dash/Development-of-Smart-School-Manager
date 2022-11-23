<?php
session_start();
if(isset($_SESSION['id'])){
  if($_SESSION['status']=='student'){
    header("location:stud_index.php");
  }
  else{
    header("location:./admin/index.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   <style>
.divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
    </style>
    <title>SSM</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="logo.png"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="login_submit.php" method="post">

         
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid ID" name="userName" required/>
            <label class="form-label" for="form3Example3">Id</label>
          </div>

          
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" name="password" required/>
            <label class="form-label" for="form3Example4">Password</label>
          </div>
          <?php if(isset($_GET['err'])){ ?>
          <p class="text-danger m-2">*invalid id or password</p>
          <?php } ?> 
          <div class="text-center text-lg-start">
            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Login"><br>
           
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
<br>
</body>
</html>
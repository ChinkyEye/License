<!DOCTYPE html>
<?php
  include_once('database.php');
  session_start();
?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online License</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
      message{
        color:red;
        size: 20px;
      }
    </style>
</head>
<body>
  <?php include('abc.php'); ?>
  <?php
        if(isset($_POST['submit'])){
          $citizenno = $_POST['citizenno'];
          $password = $_POST['password'];
          if(empty($citizenno)){
            $error['citizenno'] = "<message>* Citizen no is Required</message>";
          }
          if(empty($password)){
            $error['password'] = "<message>* Password is Required</message>";
          }
          else{
          $sql_query = "SELECT * FROM tbluser WHERE `citizenno` = '$citizenno' && `password` = '$password'";
          $result = $connect->query($sql_query);
          if($result && $result->num_rows > 0){
              $_SESSION['citizen'] = $citizenno;
            while($row = $result->fetch_assoc()){
              if($row['usertype'] == '1'){
                $_SESSION['usertype'] = "1";
                header("location:backend/index.php");
              }
              else{
                header("location:renew.php");
              }
            }
          }
          else{
            $error['failed'] = "<message>Login Failed</message>";
          }
        }
        }
      ?>
<div id="" class="text-center">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <h2>User Login</h2>
        </p>
      </div>
     
      <div class="col-md-8 col-md-offset-2">
            <?php echo isset($error['failed']) ? $error['failed']: ""; ?>
        <form action="" method="POST">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="citizenno" name="citizenno" class="form-control" placeholder="citizenno">
                <?php echo isset($error['citizenno']) ? $error['citizenno']:"";?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                <?php echo isset($error['password']) ? $error['password']: ""; ?>
              </div>
            </div>
          </div>
          <input type="submit" name="submit" class="btn btn-info" value="Login">
        </form>
  
      </div>
    </div>
</div>
<hr>
<br>
<br>
<br>
<?php include('footer.php'); ?>
</body>
</html>
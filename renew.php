<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online License|Dashboard </title>
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
            color: red;
            size: 20px;
        }
    </style>
</head>
<body><?php                            
include('database.php');
session_start();
?>
<header class="main_menu">
    <div class="sub_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-8">
                    <div class="sub_menu_right_content">
                        <a href="#"><i class="flaticon-phone-call"></i>+02 89 365 3652</a> <span>|</span>
                        <a href="#"><i class="flaticon-at"></i>Yatayar@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu_iner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <img src="img/gov.png" alt="logo">Nepal Government </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Form
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="register.php">License Register</a>
                                        <a class="dropdown-item" href="renew.php">License Renew</a>
                                    </div>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="feedback.php">Feedback</a>
                                </li>
                            </ul>
                        </div>             
                        <a class="navbar-brand" href="index.php"> <img src="img/sitam.gif" alt="logo"></a>                            
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_renew">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2><?php
                            if($_SESSION['citizen'] != ""){
                                    echo $_SESSION['citizen'];
                                }
                                else{
                                
                                }
                            ?>
                            </h2>
                        <p> <a href="index.php">Renew Form</a> <span>-</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>
<hr><?php
$citno = $_SESSION['citizen'];
$sql_query = "SELECT * FROM `tblregister` WHERE (`citizenno` = '$citno' AND `approve` = '1')";
$resultss = $connect->query($sql_query);
if($resultss && $resultss->num_rows > 0){
    if (isset($_POST['save'])){
    $license_no=$_POST['license_no'];
    $citizenship_no=$_POST['citizenship_no'];
    $issue_date=$_POST['issue_date'];
    $expiry_date=$_POST['expiry_date'];
    $category=$_POST['category_id'];
    $zone=$_POST['zone'];
    $issue_place=$_POST['issue_place'];

    if(empty($license_no)){
        $error['license_no']="<message>*license no is required</message>";
    }
    elseif(empty($issue_date)){
        $error['issue_date']="<message>*issue date is required</message>";
    }
    elseif(empty($expiry_date)){
        $error['expiry_date']="<message>*expiry date is required</message>";
    }
    elseif(empty($category)){
        $error['category']="<message>*category is required</message>";
    }
    elseif(empty($zone)){
        $error['zone']="<message>*zone no is required</message>";
    }
    elseif(empty($issue_place)){
        $error['issue_place']="<message>*issue place is required</message>";
    }
    else{   
        $sql_query= "INSERT INTO tblrenew(`license_no`,`citizenship_no`,`issue_date`,`expiry_date`,`category`,`zone`,`issue_place`) VALUES ('$license_no','$citizenship_no','$issue_place','$expiry_date','$category','$zone','$issue_place')";
       // var_dump($sql_query); die(); 
        $result = $connect->query($sql_query);
        if($result){
            ?>
            <div class="alert alert-success" style="text-align: center; font-size: 20px;">Successfully Registered!</div>
        <?php }
        else{
             echo "Sorry";
        }
    }
    
}
?><form action="" method="POST">
    <div class="container">
    <div class="form row">
        <?php
                $cit = $_SESSION['citizen'];
                $sql_query = "SELECT *, `tblcategory`.`id` as cid FROM `tblregister` INNER JOIN `tblcategory` ON `tblregister`.`category_id` = `tblcategory`.`id` WHERE `citizenno` = '$cit'";
                $result = $connect->query($sql_query);
                if($result && $result->num_rows > 0){
                  while($mil = $result->fetch_assoc()){
            ?>
        <div class="form-group col-md-6">
            <label for="licenseno">License No.</label>
                <input type="text" class="form-control"name="license_no" id="licenseno" readonly="true" value="<?php echo $mil['license_no']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="category">Category</label>
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="hidden" class="form-control" name="category_id" value="<?php echo $mil['cid']; ?>" readonly="true">
                <input type="text" class="form-control" value="<?php echo $mil['name']; ?>" readonly="true">
        </div>
        <?php 
            }
                } 
            ?>
        <div class="form-group col-md-6">
            <label for="citizenno">Citizenship No</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                <input type="text" class="form-control" name="citizenship_no"id="citizenno" value="<?php echo $_SESSION['citizen']; ?>" readonly="true">
            </div>
        </div>
    </div>

    <div class="form row">
        <div class="form-group col-md-6">
            <label for="licenseid">License Issue Date</label>
                <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                <input type="date" class="form-control" name="issue_date" placeholder="">
                <?php echo isset($error['issue_date']) ? $error['issue_date']:"";?>
        </div>
        <div class="form-group col-md-6">
            <label for="expirydate">License Expiry Date</label>
                <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                <input type="date" class="form-control" name="expiry_date" id="expirydate" placeholder="">
                <?php echo isset($error['expiry_date']) ? $error['expiry_date']:"";?>
        </div>
    </div>

    <div class="form-group">
        <label for="zonefor">Renew Zone:</label>
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <select class="form-control" name="zone"id="zonefor">
                <option value="Mechi">Choose Your zone</option>
                <option value="Mechi">Mechi</option>
                <option value="Koshi">Koshi</option>
                <option value="Sagarmatha">Sagarmatha</option>
                <option value="Janakpur">Janakpur</option>
                <option value="Bagmati">Bagmati</option>
                <option value="Narayani">Narayani</option>
                <option value="Gandaki">Gandaki</option>
                <option value="Lumbini">Lumbini</option>
                <option value="Dhaulagiri">Dhaulagiri</option>
                <option value="Rapti">Rapti</option>
                <option value="Karnali">Karnali</option>
                <option value="Bheri">Bheri</option>
                <option value="Seti">Seti</option>
                <option value="Mahakali">Mahakali</option>
            </select>
            <?php echo isset($error['zone']) ? $error['zone']:"";?>
    </div>
    <div class="form-group">
        <label for="issue">License Renew Place:</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <select class="form-control" name="issue_place"id="issue">
                <option value="Itahari,Sunsari">Itahari,Sunsari</option>
                <option value="Lajimpat,Kathmandu">Lajimpat,Kathmandu</option>
                <option value="Gaighat">Gaighat</option>
            </select>
            <?php echo isset($error['issue_place']) ? $error['issue_place']:"";?>
        </div>
    </div>
    <div class="form-group" style="text-align: center;">
        <button type="submit" class="btn btn-primary" name="save">Submit</button>
    </div>
</div>
</form>
<hr>
<br>
<br>
<br><?php
}
else{
    ?><div class="alert alert-danger" role="alert" style="text-align: center; size: 30px;">
      Wait for approval!!
    </div><?php
}
?><hr>
<br>
<br>
<br><?php include('footer.php'); ?>
</body>
</html>	



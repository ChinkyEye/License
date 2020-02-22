<!DOCTYPE html>
<?php 
include('database.php'); 
?>
<html lang="en">
<head>
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
		if(isset($_POST['save'])){
			$firstname = $_POST['firstname'];
			$middlename = $_POST['middlename'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$contactno = $_POST['contactno'];
			$officeno = $_POST['officeno'];
			$dateofbirth = $_POST['dateofbirth'];
            $age = $_POST['age'];
			$citizenno = $_POST['citizenno'];
			$bloodgroup = $_POST['bloodgroup'];
			$gender = $_POST['gender'];
			$province = $_POST['province'];
			$zone = $_POST['zone'];
			$district = $_POST['district'];
			$category_id = $_POST['category_id'];
			$place = $_POST['place'];

            if(empty($firstname)) {
                $error['firstname'] = "<message>* First name is Required</message>";
            }
             if(empty($lastname)) {
                $error['lastname'] = "<message>* Last name is Required</message>";
            }
             if(empty($contactno)) {
                $error['contactno'] = "<message>* Contact no is Required</message>";
            }
             if(empty($dateofbirth)) {
                $error['dateofbirth'] = "<message>* Date_of_Birth is Required</message>";
            }
             if(empty($age)) {
                $error['age'] = "<message>* age is Required</message>";
            }
             if(empty($citizenno)) {
                $error['citizenno'] = "<message>* Citizen no is Required</message>";
            }
             if(empty($bloodgroup)) {
                $error['bloodgroup'] = "<message>* Blood Group is Required</message>";
            }
             if(empty($province)) {
                $error['province'] = "<message>* Province is Required</message>";
            }
             if(empty($zone)) {
                $error['zone'] = "<message>* Zone is Required</message>";
            }
             if(empty($district)) {
                $error['district'] = "<message>* district is Required</message>";
            }
             if(empty($category_id)) {
                $error['category_id'] = "<message>* category_id is Required</message>";
            }
             if(empty($place)) {
                $error['place'] = "<message>* License issue place is Required</message>";
            }            
            else{
                //get image info
            $news_image = $_FILES['news_image']['name'];
            $image_error = $_FILES['news_image']['error'];
            $image_type = $_FILES['news_image']['type'];
            $image_type = $_FILES['news_image']['size'];

            // common image file extensions
            $allowedExts = array("gif", "jpeg", "jpg", "png");

            // get image file extension
            error_reporting(E_ERROR | E_PARSE);
            $extension = end(explode(".", $_FILES["news_image"]["name"]));

            if($image_error > 0){
            $error['news_image'] = " <span class='label label-danger'>Image Not Uploaded!!</span>";
            }else if(!(($image_type == "image/gif") ||
            ($image_type == "image/jpeg") ||
            ($image_type == "image/jpg") ||
            ($image_type == "image/x-png") ||
            ($image_type == "image/png") ||
            ($image_type == "image/pjpeg")) &&
            !(in_array($extension, $allowedExts))){

            $error['news_image'] = " <span class='label label-danger'>Image type must jpg, jpeg, gif, or png!</span>";
            }

            if( empty($error['news_image'])) {

            // create random image file name
            // $string = '0123456789';
            // $file = preg_replace("/\s+/", "_", $_FILES['news_image']['name']);
            // $function = new functions;
            $news_image = $news_image;

            // upload new image
            $unggah = 'upload/'.$news_image;
            $upload = move_uploaded_file($_FILES['news_image']['tmp_name'], $unggah);

            error_reporting(E_ERROR | E_PARSE);
            copy($news_image, $unggah);


            
            $sql_query = "INSERT INTO tblregister(`firstname`,`middlename`,`lastname`, `email`, `contactno`,`citizenno`, `officeno`,`dateofbirth`,`age`, `bloodgroup`,`gender`,`province`,`zone`,`district`,`category_id`,`place`,`approve`,`image`,`license_no`) VALUES('$firstname','$middlename','$lastname','$email','$contactno','$citizenno','$officeno','$dateofbirth','$age','$bloodgroup','$gender','$province','$zone','$district','$category_id','$place','0','$news_image','$remain=$citizenno-$category_id')";
                
                $result = $connect->query($sql_query);
                if($result){
                      $sql_querys = "INSERT INTO tbluser(`citizenno`,`password`) VALUES('$citizenno','$contactno')";
                      $results = $connect->query($sql_querys);
            ?>
                <div class="alert alert-success" style="text-align: center;">Successfully Registered! You can login and check status using citizenno as Username and contact no as Password"</div>
            <?php } 
                else{
                    echo "Please try again";
                }
        
            }
        }    
    }
	?>
        <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_register">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2></h2>
                            <p> <a>Registration Form</a> <span>-</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end-->
    <hr>

	<form action="" method="POST" enctype="multipart/form-data">
		<div class="container">
		<div class="form row">
        <div class="form-group col-md-4">
            <label for="firstname">First Name <span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
                <?php echo isset($error['firstname']) ? $error['firstname']:"";?>
        </div>
        <div class="form-group col-md-4">
            <label for="middlename">Middle Name</label>
                <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name">
        </div>
        <div class="form-group col-md-4">
            <label for="lastname">Last Name <span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
                <?php echo isset($error['lastname']) ? $error['lastname']:"";?>
        </div>
    	</div>
    	<div class="form row">
        	<div class="form-group col-md-4">
            	<label for="email">Email</label>
                	<input type="email" class="form-control" name="email" id="email" placeholder="@gmail.com">
        	</div>
        <div class="form-group col-md-4">
            <label for="contact">Contact No:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="contactno" id="contact" placeholder="Enter your contact no">
                <?php echo isset($error['contactno']) ? $error['contactno']:"";?>
        </div>
        <div class="form-group col-md-4">
            <label for="office">Office Phone No:</label>
                <input type="text" class="form-control" name="officeno" id="office" placeholder="Enter office no">  
        </div>
    </div>

    <div class="form row">
        <div class="form-group col-md-4">
            <label for="birth">Date Of Birth<span style="color: red;">*</span></label>
                <input type="date" class="form-control" name="dateofbirth" id="birth" placeholder="Date Of Birth">
                <?php echo isset($error['dateofbirth']) ? $error['dateofbirth']:"";?>
        </div>
        <div class="form-group col-md-4">
            <label for="age">Age<span style="color: red;">*</span></label>
                <input type="number" class="form-control" name="age" id="age" placeholder="Enter your age">
                <?php echo isset($error['age']) ? $error['age']:"";?>
        </div>
        <div class="form-group col-md-4">
            <label for="citizenno">Citizen Number<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="citizenno" id="citizenno" placeholder="Enter your citizenno">
                <?php echo isset($error['citizenno']) ? $error['citizenno']:"";?>
        </div>
    </div>
        <label id="exampleRadios0">Gender:<span style="color: red;">*</span></label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="Male" value="Male" checked="true">
                <label class="form-check-label" for="Male">
                    Male
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Female">
                <label class="form-check-label" for="exampleRadios2">
                    Female
                </label>
            </div>
        <div class="form-group">
            <label for="blood">Blood Group:<span style="color: red;">*</span></label>
            <select class="form-control" name="bloodgroup" id="blood">
                <option value="">Choose your BloodGroup</option>
                <option value="A+">A+</option>
                <option value="B+">B+</option>
                <option value="AB+">AB+</option>
                <option value="O+">O+</option>
            </select>
            <?php echo isset($error['bloodgroup']) ? $error['bloodgroup']:"";?>
        </div>
        <div class="form-group">
             <label for="province">Province:<span style="color: red;">*</span></label>
            <select class="form-control"  name="province" id="province">
                <option value="">Your Province No</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            <?php echo isset($error['province']) ? $error['province']:"";?>
        </div>
        <div class="form-group">
            <label for="zone">Zone:<span style="color: red;">*</span></label>
                <select class="form-control" name="zone" id="zone">
                    <option value="">Select Your Zone</option>
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
                <label for="district">District<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="district" id="district" placeholder="Write Your District">
                    <?php echo isset($error['district']) ? $error['district']:"";?>
        </div>
    <div class="form-group">
            <label for="category">Category:<span style="color: red;">*</span></label>
                <select class="form-control" name="category_id" id="category" placeholder="Vehicle types">
                    <option value="">Choose category</option>
                    <?php
                        $sql_query = "SELECT * FROM `tblcategory`";
                        $result = $connect->query($sql_query);
                        if($result && $result->num_rows > 0){
                          while($row = $result->fetch_assoc()){
                    ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php 
                    }
                        } 
                    ?>
                </select>
                <?php echo isset($error['category_id']) ? $error['category_id']:"";?>
    </div>
    <div class="form-group">
        <label for="issue">License Issue Place:<span style="color: red;">*</span></label>
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <select class="form-control" name="place" id="issue">
                <option>Itahari,Sunsari</option>
                <option>Lajimpat,Kathmandu</option>
                <option>Gaighat</option>
            </select>
            <?php echo isset($error['place']) ? $error['place']:"";?>
    </div>
    <div class="form-group">
        <label for="image">Image:<span style="color: red;">*</span></label>
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="file" class="form-control" name="news_image" id="image">
    </div>
    <div class="form-group" style="text-align: center;">
    	<input type="submit" name="save" class="btn btn-primary" value="Register Here">
    </div>
</div>
</form>
<hr>
<br><br>
<br>
<?php include('footer.php'); ?>
</body>
</html>

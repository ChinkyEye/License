<?php 
include('database.php'); 
?>
<!DOCTYPE html>
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
</head>
    <body>
    <?php include('abc.php'); ?>
    <?php
        if(isset($_POST['save'])){
            $message=$_POST['message'];
            $name=$_POST['name'];
            $email=$_POST['email'];
            $subject=$_POST['subject'];
            if($message==""){
                echo "message should not be null";
            }
            elseif ($name=="") {
                echo "name should not be null";
            }
            elseif ($email=="") {
                echo "email should not be null";
            }
            elseif ($subject=="") {
                echo "subject should not be null";
            }
            else{
            $sql_query="INSERT INTO tblfeedback(`message`,`name`,`email`,`subject`) VALUES('$message','$name','$email','$subject')";
            $result=$connect->query($sql_query);
                if($result){
                    echo "<div class='alert alert-success' style='text-align:center; color:'>Successfully Sent</div>";
                } 
                else{
                    echo "<div class='alert alert-success' style='text-align:center; color:'>Error</div>";
                 }      

            }
     
        }
    ?>
    <section class="breadcrumb breadcrumb_feedback">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Feedback</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
    <form action="" method="POST">
       <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder='Enter Message'></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text"
                                    placeholder='Enter your name'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email"
                                    placeholder='Enter email address'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text" placeholder='Enter Subject'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="text-align: center;">
                            <input type="submit" name="save" class="btn btn-primary" value="Send Message">
                        </div>
                </div>
                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Tarara, Itahari.</h3>
                            <p>Koshi, Morang</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>+977 9816321509</h3>
                            <p>Mon to Fri 10am to 5pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>yatayat@gmail.com</h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    </div>
    <hr>
    <br>
    <br>
    <br>

    <!-- footer part start-->
   <?php include('footer.php'); ?>
    <!-- footer part end-->

    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- magnific js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- masonry js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- contact js -->
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/slick.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>

</body>
</html>

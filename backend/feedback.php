<?php
    include_once('../database.php');
    session_start();
?>
<?php
 if($_SESSION['citizen']!= ""  && $_SESSION['usertype']=='1')
 {

 }
 else{
  header("location:lol.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yatatyat Bibhag | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <a href="index.php" class="logo">
          <span class="logo-lg"><b>License Department</b></span>
        </a>
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
        </nav>
      </header>

      <?php include('sidebar.php'); ?>

      <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">User Feedback</h3>
                </div>
              <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                              <th style="width: 10px">S.N</th>
                              <th>Message</th>
                              <th>Name</th>
                              <th>Email_Address</th>
                              <th>Subject</th>
                            </tr>

                        <?php
                        $sql_query = "SELECT * FROM `tblfeedback`";
                        $result = $connect->query($sql_query);
                        if($result && $result->num_rows > 0){
                            while($row = $result->fetch_assoc()){

                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['message'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['subject'];?></td>

                            </tr>
                        <?php

                        }
                        } 
                        ?>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </section>
      </div>

      <footer class="main-footer">
          <strong>Copyright @2019.</strong> Sitam Chhetri,Nishesh Panta,Milan Khimding.
      </footer>
    </div>

   <!-- jQuery 3 -->
   <script src="bower_components/jquery/dist/jquery.min.js"></script>
   <!-- Bootstrap 3.3.7 -->
   <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
   <!-- FastClick -->
   <script src="bower_components/fastclick/lib/fastclick.js"></script>
   <script src="dist/js/adminlte.min.js"></script>
   <!-- Sparkline -->
   <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
   <!-- jvectormap  -->
   <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
   <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
   <!-- SlimScroll -->
   <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
   <!-- ChartJS -->
   <script src="bower_components/chart.js/Chart.js"></script>
   <script src="dist/js/pages/dashboard2.js"></script>
   <script src="dist/js/demo.js"></script>
</body>
</html>

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

  
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <a href="index.php" class="logo">
          <span class="logo-lg"><b>License Registration</b></span>
        </a>
      </header>
      <?php include('sidebar.php'); ?>

      <div class="content-wrapper">
        <section class="content">
          <div class="row">
              <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">User Register</h3>
            </div>
            <?php
              if(isset($_POST['update'])){
                  $user_id = $_POST['user_id'];
                  $approve = $_POST['approve'];
                  $sql_query_update = "UPDATE tblregister SET `approve`='1' WHERE `id`= '$user_id'";
                  
                  $result_update = $connect->query($sql_query_update);
                  if($result_update){
                    echo "<div class='alert alert-success' style='text-align:center'>User approved</div>";
                  }
                  else{
                    echo "<div class='alert alert-danger' style='text-align:center'>Please try again</div>";
                  }
              }
            ?>
              <div class="box-body">
                <div class="row">
                  <?php
                  $user_id = $_GET['user_id'];
                  $sql_query = "SELECT *, `tblregister`.`id` as tblr FROM `tblregister` INNER JOIN `tblcategory` ON `tblregister`.`category_id` = `tblcategory`.`id` WHERE `tblregister`.`id` = '$user_id'";
                  $result = $connect->query($sql_query);
                  // var_dump($result); die();
                if($result && $result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                  ?>
                  <form class="form-horizontal" action="" method="POST">
                        <div class="box-body">
                              <input type="hidden" name="user_id" value="<?php echo $row['tblr'];?>"readonly="true">
                          <div class="form-group">
                            <div class="col-sm-4">
                              <img src="../upload/<?php echo $row['image'];?>" class="img-responsive">
                          </div>
                        </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Fullname</label>

                            <div class="col-sm-10">
                              <input type="email" class="form-control" value="<?php echo $row['firstname'];?> <?php echo $row['middlename'];?> <?php echo $row['lastname'];?>" id="inputEmail3" placeholder="Email" readonly="true">
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <label for="contactno" class="col-sm-2 control-label">Contact No</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="contactno" value="<?php echo $row['contactno']; ?>" placeholder="Password" readonly="true">
                            </div>
                          </div>

                            <div class="form-group">
                            <label for="officeno" class="col-sm-2 control-label">Office No</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="officeno" value="<?php echo $row['officeno']; ?>" placeholder="Password" readonly="true">
                            </div>
                          </div>
                            <div class="form-group">
                            <label for="dateofbirth" class="col-sm-2 control-label">Date Of Birth</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="dateofbirth" value="<?php echo $row['dateofbirth']; ?>" placeholder="Password" readonly="true">
                            </div>
                          </div>

                            <div class="form-group">
                            <label for="age" class="col-sm-2 control-label">Age</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="age" value="<?php echo $row['age']; ?>" placeholder="Password" readonly="true">
                            </div>
                          </div>

                            <div class="form-group">
                            <label for="bloodgroup" class="col-sm-2 control-label">Blood Group</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="bloodgroup" value="<?php echo $row['bloodgroup']; ?>" placeholder="Password" readonly="true">
                            </div>
                          </div>

                            <div class="form-group">
                            <label for="gender" class="col-sm-2 control-label">Gender</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="gender" value="<?php echo $row['gender']; ?>" placeholder="Password" readonly="true">
                            </div>
                          </div>

                            <div class="form-group">
                            <label for="province" class="col-sm-2 control-label">Province</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="province" value="<?php echo $row['province']; ?>" placeholder="Password" readonly="true">
                            </div>
                          </div>
                            <div class="form-group">
                            <label for="zone" class="col-sm-2 control-label">Zone</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="zone" value="<?php echo $row['zone']; ?>" placeholder="Password" readonly="true">
                            </div>
                          </div>

                            <div class="form-group">
                            <label for="district" class="col-sm-2 control-label">District</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="district" value="<?php echo $row['district']; ?>" placeholder="Password" readonly="true">
                            </div>
                          </div>

                            <div class="form-group">
                            <label for="categoryid" class="col-sm-2 control-label">Category</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="categoryid" value="<?php echo $row['name']; ?>" placeholder="category" readonly="true">
                            </div>
                          </div>
                            <div class="form-group">
                            <label for="license" class="col-sm-2 control-label">Issue Place</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="license" value="<?php echo $row['place']; ?>" placeholder="Password" readonly="true">
                            </div>
                          </div>

                            <div class="form-group">
                            <label for="apply" class="col-sm-2 control-label">Apply Date</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="apply" value="<?php echo $row['applydate']; ?>" placeholder="Password" readonly="true">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="approve"> Approve
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                          <button type="submit" class="btn btn-default">Cancel</button>
                          <input type="submit" name="update" class="btn btn-info pull-right" value="Update">
                        </div>
                        <!-- /.box-footer -->
                  </form>
                  <?php
                  }
                  }
                  ?>
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
 <!-- AdminLTE App -->
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
 <!-- dashboard demo (This is only for demo purposes) -->
 <script src="dist/js/pages/dashboard2.js"></script>
 <!-- for demo purposes -->
 <script src="dist/js/demo.js"></script>
</body>
</html>

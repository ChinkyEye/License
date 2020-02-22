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
  <title>Yatayat Bibhag | Dashboard</title>
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
          <span class="logo-lg"><b>License Department</b></span>
        </a>
      </header>
      <?php include('sidebar.php'); ?>


      <div class="content-wrapper">
        <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">User Renew</h3>
        </div>
    <!-- /.box-header -->
        <?php
          if(isset($_POST['update'])){
              $user_id = $_POST['user_id'];
              $approve = $_POST['approve'];
              $sql_query_update = "UPDATE tblrenew SET `status`='1' WHERE `id`= '$user_id'";
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
        $sql_query = "SELECT *, `tblrenew`.`id` as rid FROM `tblrenew` INNER JOIN `tblcategory` ON `tblrenew`.`category` = `tblcategory`.`id`WHERE `tblrenew`.`id` = '$user_id'";
        $result = $connect->query($sql_query);
        if($result && $result->num_rows > 0){
          while($row = $result->fetch_assoc()){
        ?>
        <form class="form-horizontal" action="" method="POST">
              <div class="box-body">
                    <input type="hidden" name="user_id" value="<?php echo $row['rid'];?>"readonly="true">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">License No</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" value="<?php echo $row['license_no'];?>"placeholder="Email" readonly="true">
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="citizenshipno" class="col-sm-2 control-label">Citizenship No</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="citizenshipno" value="<?php echo $row['citizenship_no']; ?>" placeholder="Password" readonly="true">
                  </div>
                </div>

                  <div class="form-group">
                  <label for="issuedate" class="col-sm-2 control-label">Issue Date</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="issuedate" value="<?php echo $row['issue_date']; ?>" placeholder="Password" readonly="true">
                  </div>
                </div>
                  <div class="form-group">
                  <label for="expirydate" class="col-sm-2 control-label">Expiry Date</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="expirydate" value="<?php echo $row['expiry_date']; ?>" placeholder="Password" readonly="true">
                  </div>
                </div>

                  <div class="form-group">
                  <label for="category" class="col-sm-2 control-label">Category</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="category" value="<?php echo $row['name']; ?>" placeholder="" readonly="true">
                  </div>
                </div>

                  <div class="form-group">
                  <label for="zone" class="col-sm-2 control-label">Zone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="zone" value="<?php echo $row['zone']; ?>" placeholder="Password" readonly="true">
                  </div>
                </div>

                  <div class="form-group">
                  <label for="place" class="col-sm-2 control-label">Issue Place</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="place" value="<?php echo $row['issue_place']; ?>" placeholder="Password" readonly="true">
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

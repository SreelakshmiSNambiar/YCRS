<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ycrsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$ycrsaid=$_SESSION['ycrsaid'];
 $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];
 $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];
$mobnum=$_POST['mobnum'];
$email=$_POST['email'];
$ot=$_POST['ot'];
$sql="update tblpage set PageTitle=:pagetitle,PageDescription=:pagedes,Email=:email,MobileNumber=:mobnum,OpenningTime:=:ot where  PageType='contactus'";
$query=$dbh->prepare($sql);
$query->bindParam(':pagetitle',$pagetitle,PDO::PARAM_STR);
$query->bindParam(':pagedes',$pagedes,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':ot',$ot,PDO::PARAM_STR);
$query->execute();
echo '<script>alert("Contact us has been updated")</script>';


  }
  ?>
<!DOCTYPE html>
<html>
<head>
 
  <title>Yoga Classes Registration System | Contact Us</title>
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
 <?php include_once('includes/header.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once('includes/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact Us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Contact Us</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Contact Us</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <?php

$sql="SELECT * from  tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Page Title</label>
                    <input type="text" name="pagetitle" id="pagetitle" required="true" value="<?php  echo $row->PageTitle;?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" id="email" required="true" value="<?php  echo $row->Email;?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile Number</label>
                   <input type="text" name="mobnum" id="mobnum" required="true" value="<?php  echo $row->MobileNumber;?>" class="form-control" maxlength="10" pattern=[0-9]+>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Openning Time</label>
                    <input type="text" name="ot" id="ot" required="true" value="<?php  echo $row->OpenningTime;?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Page Description</label>
                    <textarea class="form-control" id="exampleInputEmail1" name="pagedes"><?php  echo $row->PageDescription;?></textarea>
                  </div>
                </div><?php $cnt=$cnt+1;}} ?> 
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!--/.col (left) -->
  
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include_once('includes/footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html><?php }  ?>

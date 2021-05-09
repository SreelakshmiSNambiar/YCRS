<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ycrsaid']==0)) {
  header('location:logout.php');
  } else{
      if(isset($_POST['submit']))
  {

 $toc=$_POST['toc'];
 $daystime=$_POST['daystime'];
 $desc=$_POST['desc'];
 $ytrainer=$_POST['ytrainer'];
 $tcnum=$_POST['tcnum'];
 $fees=$_POST['fees'];
 $cd=$_POST['classduration'];
$eid=$_GET['editid'];
$sql="update tblclasses set TypeofClasses=:toc,DaysTime=:daystime,Description=:desc,YogaTrainer=:ytrainer,TrainerContactnumber=:tcnum,Fees=:fees,ClassDuration=:cd where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':toc',$toc,PDO::PARAM_STR);
$query->bindParam(':daystime',$daystime,PDO::PARAM_STR);
$query->bindParam(':desc',$desc,PDO::PARAM_STR);
$query->bindParam(':ytrainer',$ytrainer,PDO::PARAM_STR);
$query->bindParam(':tcnum',$tcnum,PDO::PARAM_STR);
$query->bindParam(':fees',$fees,PDO::PARAM_STR);
$query->bindParam(':cd',$cd,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();
    echo '<script>alert("Class detail has been updated")</script>';
    echo "<script>window.location.href ='manage-classes.php'</script>";

  }
  ?>
 
<!DOCTYPE html>
<html>
<head>
 
  <title>Yoga Classes Registration System | Classes</title>
 
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
            <h1>Update Class</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Classes</li>
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
                <h3 class="card-title">Classes</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data">
               <?php
$eid=$_GET['editid'];
$sql="SELECT * from  tblclasses where ID=$eid";
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
                    <label for="exampleInputEmail1">Type of Classes</label>
                     <select class="form-control select2" style="width: 100%;" type="text"  name="toc" required='true'>
                    <option value="<?php  echo $row->TypeofClasses;?>" selected=""><?php  echo $row->TypeofClasses;?></option>
                    <option value="Artist Yoga">Artist Yoga</option>
                    <option value="Traditional Hatha">Traditional Hatha</option>
                    <option value="Yoga Therapy">Yoga Therapy</option>
                    <option value="Yoga Balance">Yoga Balance</option>
                    <option value="Vinyasa yoga">Vinyasa yoga</option>
                    <option value="Iyengar yoga">Iyengar yoga</option>
                     <option value="Kundalini yoga">Kundalini yoga</option>
                    <option value="Ashtanga yoga">Ashtanga yoga</option>
                    <option value="Bikram yoga">Bikram yoga</option>
                    <option value="Yin yoga">Yin yoga</option>
                    <option value="Restorative yoga">Restorative yoga</option>
                    <option value="Prenatal yoga">Prenatal yoga</option>
                    <option value="Anusara yoga">Anusara yoga</option>
                    <option value="Jivamukti yoga">Jivamukti yoga</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Yoga Images</label>
                   <img src="images/<?php echo $row->YogaImages;?>" width="100" height="100" value="<?php  echo $row->YogaImages;?>">
<a href="changeimage.php?editid=<?php echo $row->ID;?>"> &nbsp; Edit Image</a>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Days & Time</label>
                    <textarea class="form-control" name="daystime" id="exampleInputEmail1" name="pagedes"><?php  echo $row->DaysTime;?></textarea>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                   <textarea class="form-control" name="desc" id="exampleInputEmail1" name="pagedes"><?php  echo $row->Description;?></textarea>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Yoga Trainer</label>
                  <input type="text" class="form-control" name="ytrainer" value="<?php  echo $row->YogaTrainer;?>" required='true'>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Trainer Contact Number</label>
                 <input type="text" class="form-control" name="tcnum" value="<?php  echo $row->TrainerContactnumber;?>" required='true' maxlength="10" pattern="[0-9]+">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fees</label>
                 <input type="text" class="form-control" name="fees" value="<?php echo $row->Fees;?>" required='true'>
                  </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Class Duration</label>
                 <input type="text" class="form-control" name="classduration" value="<?php echo $row->ClassDuration;?>" required='true'>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Trainer Profile Pics</label>
                 <img src="images/<?php echo $row->ProfilePics;?>" width="100" height="100" value="<?php  echo $row->ProfilePics;?>">
<a href="changeimage1.php?editid=<?php echo $row->ID;?>"> &nbsp; Edit Image</a>
                  </div>
                </div>

                <!-- /.card-body -->
<?php $cnt=$cnt+1;}} ?>    
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

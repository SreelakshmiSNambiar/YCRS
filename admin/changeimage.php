
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ycrsaid']==0)) {
  header('location:logout.php');
  } else{
      if(isset($_POST['submit']))
  {
  $eid=$_GET['editid'];
$img=$_FILES["image"]["name"];
$extension = substr($img,strlen($img)-4,strlen($img));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Yoga image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$img=md5($img).time().$extension;
 move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$img);
$sql="update tblclasses set YogaImages=:img where ID=:eid";
$query=$dbh->prepare($sql);

$query->bindParam(':img',$img,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();

   $query->execute();

    echo '<script>alert("Yoga Image has been updated")</script>';
    echo "<script>window.location.href ='manage-classes.php'</script>";

  }
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
                    <input value="<?php  echo $row->TypeofClasses;?>" class="form-control" readonly='true'></option>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Old Yoga Images</label>
                   <img src="images/<?php echo $row->YogaImages;?>" width="100" height="100" value="<?php  echo $row->YogaImages;?>">

                  </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">New Yoga Images</label>
                   <input type="file" class="form-control" name="image" value="" required='true'>

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

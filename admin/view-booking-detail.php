<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ycrsaid']==0)) {
  header('location:logout.php');
  } else{
  if(isset($_POST['submit']))
  {
    $bookingid=$_GET['bookingid'];
    $status=$_POST['status'];
   $remark=$_POST['remark'];
$sql= "update tblbooking set Status=:status,Remark=:remark where BookingNumber=:bookingid";
$query=$dbh->prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
$query->bindParam(':bookingid',$bookingid,PDO::PARAM_STR);

 $query->execute();

  echo '<script>alert("Remark has been updated")</script>';
 echo "<script>window.location.href ='all-booking.php'</script>";
}

?>
<!DOCTYPE html>
<html>
<head>

  <title>Yoga Classes Registration System | View Booking Detail</title>
  <!-- Tell the browser to be responsive to screen width -->
  
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
            <h1>View Booking Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">View Booking Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
             <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
              <?php
                  
                  $bookid=$_GET['bookingid'];

$sql="SELECT tblbooking.*, tblclasses.* from tblbooking join  tblclasses on tblbooking.ClassID=tblclasses.ID where tblbooking.BookingNumber=:bookid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':bookid', $bookid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                            <table border="1" class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                              <tr>
  <th colspan="4" style="color: red;font-weight: bold;text-align: center;font-size: 20px"> Booking Number: <?php echo $row->BookingNumber;?></th>
</tr>
<tr>
  <th colspan="4" style="color: blue;font-weight: bold;font-size: 15px"> Booking Detail:</th>
</tr>
<tr>
    <th>Customer Name</th>
    <td><?php  echo $row->FirstName;?> <?php  echo $row->LastName;?></td>
   
  </tr>
  <tr>
   <th>Mobile Number</th>
    <td><?php  echo $row->MobileNumber;?></td>
</tr>
  <tr>
   <th>Email</th>
    <td><?php  echo $row->Email;?></td></tr>
    <tr>
    <th>Address</th>
    <td><?php  echo $row->Address;?></td>
  </tr>
  <tr>
   <th>Booking Date</th>
    <td><?php  echo $row->BookingDate;?></td></tr>
    <tr>
    <th>Address</th>
    <td><?php  echo $row->Address;?></td>
  </tr>
 </table>
 <br />
 <table border="1" class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
    <tr>
  <th colspan="4" style="color: blue;font-weight: bold;font-size: 15px"> Class Detail:</th>
</tr>
<tr>
    <th>Type of Class</th>
    <td><?php  echo $row->TypeofClasses;?></td>

    <th>Yoga Image</th>
    <td><img src="images/<?php echo $row->YogaImages;?>" width="100" height="100" value="<?php  echo $row->YogaImages;?>"></td>
  </tr>
 
 <tr>
    
    <th>Days and Time</th>
    <td><?php  echo $row->DaysTime;?></td>
   
    <th>Yoga Trainer</th>
    <td><?php  echo $row->YogaTrainer;?></td>
  </tr>

    <tr>
    <th>Trainer Contact Number</th>
    <td><?php  echo $row->TrainerContactnumber;?></td>
    <th>Fees</th>
    <td><?php  echo $row->Fees;?></td>
  </tr>
<tr>
    <th>Trainer Pic</th>
    <td><img src="images/<?php echo $row->ProfilePics;?>" width="100" height="100" value="<?php  echo $row->ProfilePics;?>"></td>
    <th>Course Duration</th>
    <td><?php  echo $row->ClassDuration;?></td>
  </tr>
   
    <tr>
    <th>Booking Date</th>
    <td colspan="2"><?php  echo $row->BookingDate;?></td>
  </tr>

  <tr>
 <th>Description</th>
    <td colspan="3"><?php  echo $row->Description;?></td>
  </tr>

</table>
  <br />
  <table border="1" class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
   <tr>
  <th colspan="4" style="color: blue;font-weight: bold;font-size: 15px"> Admin Remarks:</th>
</tr>
  <tr>
    
     <th>Order Final Status</th>

    <td> <?php  $status=$row->Status;
    
if($row->Status=="Approved")
{
  echo "Your Booking has been approved";
}

if($row->Status=="Cancelled")
{
 echo "Your Booking has been cancelled";
}


if($row->Status=="")
{
  echo "Not Response Yet";
}


     ;?></td></tr>
     <tr>
     <th >Admin Remark</th>
    <?php if($row->Status==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row->Status);?>
                  </td>
                  <?php } ?>
  </tr>
  
 
<?php $cnt=$cnt+1;}} ?>

</table> 
<?php 

if ($status==""){
?> 
<p align="center"  style="padding-top: 20px">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">
                                                                              <form method="post" name="submit">

                                
                               
     <tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr> 
   
 
  <tr>
    <th>Status :</th>
    <td>

   <select name="status" class="form-control wd-450" required="true" >
     <option value="Approved" selected="true">Approved</option>
     <option value="Cancelled">Cancelled</option>
   </select></td>
  </tr>
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Update</button>
  
  </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
<?php }  ?>
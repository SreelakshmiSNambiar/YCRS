<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="logout.php" class="nav-link">Logout</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <?php
$sql="SELECT * from tblcontact  where IsRead is null";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
$newenq=$query->rowCount();
?>
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $newenq;?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
              <?php

foreach($results as $row)
{ 

  ?>  <a href="view-enquiry.php?viewid=<?php echo $row->ID;?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/images.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                 <?php echo $row->FirstName;?>  <?php echo $row->LastName;?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
               
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?php echo $row->EnquiryDate;?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
         <?php  } ?>
          
          <a href="unread-enquiry.php" class="dropdown-item dropdown-footer">See New Enquiry</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
         <?php
$sql="SELECT * from tblbooking  where Status is null";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
$newbooking=$query->rowCount();
?>
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php echo $newbooking;?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo $newbooking;?> New Booking</span>
          <div class="dropdown-divider"></div>
         
   
<?php
foreach($results as $row)
{ 

  ?>
          <a href="new-booking.php" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> <?php echo $row->BookingNumber;?>
            <span class="float-right text-muted text-sm">(<?php echo $row->BookingDate;?>)</span>
          </a>
            <?php  } ?>
          <div class="dropdown-divider"></div>
         
          <div class="dropdown-divider"></div>
          <a href="new-booking.php" class="dropdown-item dropdown-footer">See New Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
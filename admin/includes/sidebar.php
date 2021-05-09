  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">YCRS Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/images.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <?php
$aid=$_SESSION['ycrsaid'];
$sql="SELECT AdminName,Email from  tbladmin where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
          <a href="admin-profile.php" class="d-block"><?php  echo $row->AdminName;?></a>
          <p style="color: white"><?php  echo $row->Email;?><?php $cnt=$cnt+1;}} ?></p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin-profile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="change-password.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>
            
          </li>
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Classses
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="classes.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Class</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-classes.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Class</p>
                </a>
              </li>
            
            </ul>
          </li>
      
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Booking
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="new-booking.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Booking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="approved-booking.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved Booking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cancelled-booking.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cancelled Booking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="all-booking.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Booking</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="between-dates-report.php" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="nav-icon fas fa-book"></i>
              <p>
                Enquiry
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="read-enquiry.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read Enquiry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="unread-enquiry.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unread Enquiry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="all-enquiry.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Enquiry</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="search.php" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
              Search
              </p>
            </a>
         
          </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="aboutus.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="contactus.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Us</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
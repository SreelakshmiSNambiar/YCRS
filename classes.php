<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Yoga Classes Registration System | Yoga Classes</title>
	
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header Section -->
<?php include_once('includes/header.php');?>
	<!-- Header Section end -->


	                                                                              
	<!-- Page top Section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<h2>Our classes</h2>
					<p>So, join us. Get more bendy, laser-focus your mind, and breathe like a master with our selection of the best yoga apps.</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Page top Section end -->

	<!-- Classes Section -->
	<section class="classes-page-section spad overflow-hidden">
		<div class="container">
			<div class="row">
				
					


							
<?php
if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        // Formula for pagination
        $no_of_records_per_page = 9;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $ret = "SELECT ID FROM tblclasses";
 $query1 = $dbh -> prepare($ret);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$total_rows=$query1->rowCount();


$total_pages = ceil($total_rows / $no_of_records_per_page);
$sql="SELECT * from tblclasses LIMIT $offset, $no_of_records_per_page";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
	<div class="col-md-4">
							<div class="classes-item-warp">
								<div class="classes-item">
									<div class="ci-img">
										<img src="admin/images/<?php echo $row->YogaImages;?>" alt="">
									</div>
									<div class="ci-text">
										<h4><a href="classes-details.php?viewid=<?php echo $row->ID;?>"><?php echo $row->TypeofClasses;?></a></h4>
									
										<p>Fees: $<?php echo $row->Fees;?></p>
										

									</div>
									<div class="ci-bottom">
										<div class="ci-author">
											<img src="admin/images/<?php echo $row->ProfilePics;?>" alt="">
											<div class="author-text">
												<h6><?php echo $row->YogaTrainer;?></h6>
												<p>Duration: <?php echo $row->ClassDuration;?></p>
											</div>
										</div>
										<a href="book-yoga-sesion.php?cid=<?php echo $row->ID;?>" class="site-btn sb-gradient">book now</a>
									</div>
								</div>
							</div></div>
							<?php $cnt=$cnt+1;}} ?>
							
						
				
					</div>
					<div align="left">
    <ul class="pagination" >
        <li><a href="?pageno=1"><strong>First></strong></a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong style="padding-left: 10px">Prev></strong></a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><strong style="padding-left: 10px">Next></strong></a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Last</strong></a></li>
    </ul>
</div>
				</div>
				
		
	</section>
	<!-- Classes Section end -->

	

	<!-- Footer Section -->
<?php include_once('includes/footer.php');?>
	<!-- Footer Section end -->
	
	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>



	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>

<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Yoga Classes Registration System | Single Class Detail</title>
	
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
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
					<h2>Detaiil of yoga classes</h2>
					<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!.</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Page top Section end -->

	<!-- Classes Details Section -->
	<section class="classes-details-section spad overflow-hidden">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="classes-details">
						<?php
						 $vid=$_GET['viewid'];
$sql="SELECT * from tblclasses where ID=:vid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vid',$vid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
						<div class="classes-preview">
							<img src="admin/images/<?php echo $row->YogaImages;?>" width='400' height="700" alt="">
						</div>
						<div class="row">
							<div class="col-lg-8">
								<h2><?php echo $row->TypeofClasses;?></h2>
								<div class="cd-meta"><p style="color: blue">Duration:  <?php echo $row->ClassDuration;?></p></div>
								
							</div>
							<div class="col-lg-4 text-left text-md-right">
								<div class="cd-price">$<?php echo $row->Fees;?></div>
							</div>
						</div>
						<p><?php echo $row->Description;?>.</p>
						<p><?php echo $row->DaysTime;?>.</p>
						<a href="book-yoga-sesion.php?cid=<?php echo $row->ID;?>" class="site-btn sb-gradient">book now</a>
					</div> <?php $cnt=$cnt+1;}} ?> 
					<br />
					<h3 class="comment-title">Other Classes</h3>
					<div class="classes-other-slider owl-carousel">
					<?php
$sql="SELECT * from tblclasses order by rand() limit 3";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
				<div class="classes-item">
					
					<div class="ci-img">
						<img src="admin/images/<?php echo $row->YogaImages;?>" alt="">
					</div>
					<div class="ci-text">
						<h4><a href="classes-details.php?viewid=<?php echo $row->ID;?>"><?php echo $row->TypeofClasses;?></a></h4>
						
							<p>Fees: Rs<?php echo $row->Fees;?></p>
										<p><?php echo substr([$row->Description],0,30);?></p>
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
			<?php $cnt=$cnt+1;}} ?>
				
				
					</div>
				</div>
				<div class="col-lg-3 col-md-5 col-sm-8 sidebar">
					<div class="sb-widget">
						<h2 class="sb-title">About instructor</h2>
						<div class="classes-info">
							<?php
						 $vid=$_GET['viewid'];
$sql="SELECT * from tblclasses where ID=:vid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vid',$vid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
							<ul>
								<li><i class="material-icons">phone</i><?php echo $row->TrainerContactnumber;?></li>
								<li><i class="material-icons">event_available</i><?php echo $row->ClassDuration;?></li>
								<li><i class="material-icons">done_all</i>Mon, Fri</li>
								<li><i class="material-icons">alarm_on</i>06:30pm - 07:45pm</li>
								<li><i class="material-icons">person_outline</i><?php echo $row->YogaTrainer;?></li>
							</ul>
							
						</div>
					</div>
					<div class="sb-widget">
						<h2 class="sb-title">About instructor</h2>
						<div class="about-instructor-widget">
							<img src="admin/images/<?php echo $row->ProfilePics;?>" alt="">
							<h4><?php echo $row->YogaTrainer;?></h4>
							<h6>Yoga Trainer</h6>
							<p><i class="material-icons">phone</i><?php echo $row->TrainerContactnumber;?></p>
							<div class="ai-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div><?php $cnt=$cnt+1;}} ?>
				</div>
			</div>
		</div>
	</section>
	<!-- Classes Details Section end -->



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

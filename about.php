<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Yoga Classes Registration System | About Us</title>
	
	<!-- Stylesheets -->
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
					<h2>About</h2>
					<p>So, join us. Get more bendy, laser-focus your mind, and breathe like a master with our selection of the best yoga app.</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Page top Section end -->


	<!-- What we do Section -->
	<section class="wwd-section spad set-bg" data-setbg="img/wwd-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-7 ml-auto">
					<?php
$sql="SELECT * from tblpage where PageType='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
					<div class="wwd-text">
						
						<h3><?php  echo htmlentities($row->PageTitle);?></h3>
						<p><?php  echo ($row->PageDescription);?>.</p>
					
					
						
					</div>
					<?php $cnt=$cnt+1;}} ?>
				</div>
			</div>
		</div>
	</section>
	<!-- What we do Section end -->

	<!-- Trainer Section -->
	<section class="trainer-section overflow-hidden spad">
		<div class="container">
			<div class="section-title text-center">
				<img src="img/icons/logo-icon.png" alt="">
				<h2>Our Yoga Trainer</h2>
				<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!</p>
			</div>
			<div class="trainer-slider owl-carousel">
				<?php
$sql="SELECT * from tblclasses order by rand() limit 2";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
				<div class="ts-item">
					<div class="trainer-item">
						<div class="ti-img">
							<img src="admin/images/<?php echo $row->ProfilePics;?>" alt="">
						</div>
						<div class="ti-text">
							<h4><?php echo $row->YogaTrainer;?></h4>
							<h6>Yoga Trainer</h6>
							<p><i class="fa fa-mobile"></i>: <?php echo $row->TrainerContactnumber;?></p>
							<div class="ti-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>
			<?php $cnt=$cnt+1;}} ?>
		
			</div>
		</div>
	</section>
	<!-- Trainer Section end -->

	<!-- Gallery Section -->
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

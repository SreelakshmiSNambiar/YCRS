<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Yoga Classes Registration System | Home Page</title>
	
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

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

	                                                     
	<!-- Hero Section -->
	<section class="hero-section">
		
		<div class="arrow-buttom">
			<img src="img/icons/arrows-buttom.png" alt="">
		</div>
		<div class="hero-slider owl-carousel">
			<div class="hs-item">
				<div class="hs-style-1 text-center">
					<img src="img/hero-slider/" alt="">
				</div>
			</div>
			<div class="hs-item">
				<div class="hs-style-2">
					<div class="container-fluid h-100">
						<div class="row h-100">
							<div class="col-lg-6 h-100 d-none d-lg-flex align-items-xl-end align-items-lg-center">
								<div class="hs-img">
									<img src="img/hero-slider/" alt=""> 
								</div>
							</div>
                                			<div class="col-lg-6 d-flex align-items-center">
								<div class="hs-text-warp">
									<div class="hs-text">
										<h2>Get slim and toned with yoga</h2>
										<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!. </p>
									
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="hs-item">
				<div class="hs-style-3 text-center">
					<div class="container">
						<div class="hs-text">
							<h2>Reduce your stress</h2>
							<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!.</p>
						
						</div>
					</div>
					<div class="hs-img">
						<img src="img/hero-slider/" alt="">
					</div>
				</div>
			</div>
		</div>
                 
	</section>
	<!-- Hero Section end -->

	<!-- About Section -->
	<section class="about-section spad">
		<div class="container">
			<div class="section-title text-center">
				
				<h2>Welcome to Yoga Classes</h2>
				<p>Yoga is a journey to finding that balance, both on and off the mat. A yoga practice stretches and strengthens our bodies; it teaches us to mindfully move and connect with our breath, which leads us to be mindful and present in our daily tasks. It teaches us the freedom to be still and connects us.!</p>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="about-img">
						<img src="img/yoga1.png" alt="">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about-item">
						<div class="ai-icon">
							<img src="img/icon/" alt="">
						</div>
						<div class="ai-text">
							<h4>Just Breath</h4>
							<p>Meditation brings wisdom; lack of meditation leaves ignorance. Know well what leads you forward and what holds you back, and choose the path that leads to wisdom.</p>
						</div>
					</div>
					<div class="about-item">
						<div class="ai-icon">
							<img src="img/icons/" alt="">
						</div>
						<div class="ai-text">
							<h4>Extension of Spring</h4>
							<p>Yoga is a great practice for both the body and the mind, it offers peace and mindfulness to its lovers and helps them get through daily stress.</p>
						</div>
					</div>
					<div class="about-item">
						<div class="ai-icon">
							<img src="img/icons/" alt="">
						</div>
						<div class="ai-text">
							<h4>Against Aging</h4>
							<p>Yoga is not a work-out it is a work-in, and this is the point of spiritual practice to make us teachable to open up our hearts and focus our awareness so that we can know what we already know and be who we already are.</p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- About Section end -->

	<!-- Classes Section -->
	<section class="classes-section spad">
		<div class="container">
			<div class="section-title text-center">
				
				<h2>Our Yoga Classes</h2>
				<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!</p>
			</div>
			
			<div class="classes-slider owl-carousel">
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
					
							<p>Fees: $<?php echo $row->Fees;?></p>
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
	</section>
	<!-- Classes Section end -->

	<!-- Trainer Section -->
	<section class="trainer-section overflow-hidden spad">
		<div class="container">
			<div class="section-title text-center">
				<img src="img/icons/logo-icon.png" alt="">
				<h2>Our Trainer Yoga</h2>
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

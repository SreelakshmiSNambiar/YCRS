<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);


 if(isset($_POST['submit']))
  {


 $fname=$_POST['fname'];
  $lname=$_POST['lname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $message=$_POST['message'];

$sql="insert into tblcontact(FirstName,LastName,MobileNumber,Email,Message)values(:fname,:lname,:phone,:email,:message)";
$query=$dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='contact.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Yoga Classes Registration System | Contact Us Page</title>
	
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
					<h2>Contact</h2>
					<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!.</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Page top Section end -->

	<!-- Contact Section -->
	<section class="contact-page-section spad overflow-hidden">
		<div class="container">
			<?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
			<div><h4 style="text-align: center;color: red"><strong><?php  echo htmlentities($row->PageTitle);?></strong></h4></div>
			<br />
			<div class="row">
				<div class="col-lg-4">
					
					<div class="con-info">
						<h3>Visit the Yoga Classes</h3>
						<ul>
							<li><i class="material-icons">map</i><?php  echo htmlentities($row->PageDescription);?></li>
						</ul>
					</div>
					<div class="con-info">
						<h3>Message Us</h3>
						<ul>
							<li><i class="material-icons">map</i><?php  echo htmlentities($row->MobileNumber);?></li>
							<li><i class="material-icons">map</i><?php  echo htmlentities($row->Email);?></li>
						</ul>
					</div>
					<div class="con-info">
						<h3>Opening Hours</h3>
						<ul>
							<li><i class="material-icons">map</i><?php  echo htmlentities($row->OpenningTime);?></li>
							
						</ul>
					</div>
					<div class="contact-social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
					</div>
				</div><?php $cnt=$cnt+1;}} ?>
				<div class="col-lg-8">
					<form class="singup-form contact-form" method="post">
						<div class="row">
							<div class="col-md-6">
								<input type="text" placeholder="First Name"  name="fname" required="true">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Last Name" name="lname" required="true">
							</div>
							<div class="col-md-6">
								<input type="email" name="email" required="true" placeholder="Your Email">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Phone Number" name="phone" required="true" maxlength="10" pattern="[0-9]+">
							</div>
							<div class="col-md-12">
								<textarea placeholder="Message" name="message" required="true"></textarea>
								 <input type="submit" value="send" name="submit">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Trainers Section end -->



	<!-- Footer Section -->
	<?php include_once('includes/header.php');?>
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

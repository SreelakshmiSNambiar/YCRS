<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
 if(isset($_POST['submit']))
  {

$booknum=mt_rand(100000000, 999999999);
 $cid=$_GET['cid'];
     $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobnum=$_POST['mobnum'];
    $add=$_POST['add'];
   
 
$sql="insert into tblbooking(ClassID,BookingNumber,FirstName,LastName,Email,MobileNumber,Address)values(:cid,:booknum,:fname,:lname,:email,:mobnum,:add)";
$query=$dbh->prepare($sql);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->bindParam(':booknum',$booknum,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo '<script>alert("Your Yoga Session has been book successfully. Booking Number is "+"'.$booknum.'")</script>';

echo "<script>window.location.href ='index.php'</script>";
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
	<title>Yoga Classes Registration System |Book Yoga Session</title>
	
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
					<h2>Book Your Session</h2>
					<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!.</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Page top Section end -->

	<!-- Contact Section -->
	<section class="contact-page-section spad overflow-hidden">
		<div class="container">
			
			<div class="row">
		
				<div class="col-lg-8">
					<form class="singup-form contact-form" method="post">
						<div class="row">
							<div class="col-md-6">
								<input type="text" placeholder="First Name" name="fname" required="true">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Last Name" name="lname" required="true">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Your Email" name="email" required="true">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Phone Number" name="mobnum" required="true" maxlength="10" pattern="[0-9]+">
							</div>
							<div class="col-md-12">
								<textarea placeholder="Enter Address" name="add" required="true"></textarea>
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
	<?php include_once('includes/footer.php');?>
	<!-- Footer Section end -->
	
	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

	<!-- Search model -->
	
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

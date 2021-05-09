	
		<div class="gallery-section">

		<div class="gallery-slider owl-carousel">
			<?php
$sql="SELECT * from tblclasses";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
			<div class="gs-item">
				
				<img src="admin/images/<?php echo $row->YogaImages;?>" width='200' height="200" alt="">
				
			</div>
				<?php $cnt=$cnt+1;}} ?>
		</div>
	</div>
	<footer class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget">
						<div class="about-widget">
							
							<h4 style="color: red">Yoga Classes</h4>
							<br />
							<ul>
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
								<li><i class="material-icons">phone</i><?php  echo htmlentities($row->MobileNumber);?></li>
								<li><i class="material-icons">email</i><?php  echo htmlentities($row->Email);?></li>
								<li><i class="material-icons">map</i><?php  echo htmlentities($row->PageDescription);?></li>
								<?php $cnt=$cnt+1;}} ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget pl-0 pl-lg-5">
						<h2 class="fw-title">Quick Links</h2>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="classes.php">Classes</a></li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="admin/login.php">Admin</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget pl-0 pl-lg-5">
						<h2 class="fw-title">Open time</h2>
						<ul>
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
							<li><i class="material-icons">alarm_on</i><?php  echo htmlentities($row->OpenningTime);?></li>
							
						</ul><?php $cnt=$cnt+1;}} ?>
						
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="row">
				
					<div class="col-md-8 text-md-right">
						<div class="copyright">
							<p style="color: red">Yoga Classes Registartion System @ 2020</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
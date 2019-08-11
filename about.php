<?php include_once "asset/header.php" ?>
	
	<div id="breadcrumb" style="background-color: #00ffff">
		<div class="container">	
			<div class="breadcrumb" style="background-color: #00ffff">							
				<li><a href="index.php" style="color: #000;">Home</a></li>
				<li style="color: #000;">About Us</li>			
			</div>		
		</div>	
	</div>
	
	<div class="aboutus">
		<div class="container">
			<h2><i>Our online auction information</i></h2>
			<hr>
			<div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
				<img src="image/3.jpg" class="img-responsive">
				<h4>Our Auction System Detail</h4>
				<p>The online auction system is a web application where all products are displayed in different categories and a user can bid to the selected category wised product without facing any problem. 
				The online auction system deals between sellers and bidders. 
				It provides the users for sign up to this system and search for products, manages their accounts. 
				Signed up users will have to log in first then they can uploaded products on the site from their account and also can bid for other products.
				</p>
				 <p>Users can edit their profile and see their uploaded products and bided products. 
				Admin panel can approve products, update products, delete products, delete user, update and delete etc.
				All particular bids have limited time to finish.
				</p>
				<p>This online auction system has two part- user interface and admin interface. 
				User panel permits a user to upload a product for sale and bid on a particular product to buy.
				This system presents an online display of category for products they want to sell or bid. 
				There is an admin panel by which an admin can  control the whole bidding system.Admin can approve product by the categories. 
				</p>
				<p>After finishing the bidding process, seller get highest price.This is dynamic system which can be easily operated by the users.
				To enable the main goals of this system are to sell  and bid different types of products to the customers living anywhere. 
				This system is very useful for the companies and market-place.  
				To enable the website will show all products in category list. 
				To enable users can view browse any product and their details and can bid on the products.
				</p> 
				<p>To develop with the objective of making the system reliable, easier and fact. 
				To provides for general people that saves both time and money.
				That support for user to sell and buy product in best price. 
				This system do not need to go at auction location to get particular selling.
				User can upload product online and get all the information about the other products. 
				User can easily sell products anytime, anywhere and at home. So is very less costly.
				In this system current update category will displayed by the admin to user and visitor. 
				This system is reliable it gives fast and also gives privacy to every user for their accounts.
				</p>
			</div>
			<div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
				<div class="skill">
					 <h2>Most Buyer Category </h2>
					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>  -->
					<?php 
						$totalsql="SELECT * FROM auction";
						$totalres=mysqli_query($conn,$totalsql);
						confirm_query($totalres);
						echo $totalcount=mysqli_num_rows($totalres);
						$Sql="SELECT * FROM category";
						$res=mysqli_query($conn,$Sql);
						confirm_query($res);
						while ($row=mysqli_fetch_assoc($res)) {
							$catid=$row['catid'];
						 	$query="SELECT * FROM product WHERE catid=$catid";
						 	$resp=mysqli_query($conn,$query);
						 	confirm_query($resp);
						 	while ($rowp=mysqli_fetch_assoc($resp)) {
						 		$product_name=$rowp['product_name'];
						 	}
						 	$sql="SELECT * FROM auction WHERE product_name='$product_name'";
						 	$ares=mysqli_query($conn,$sql);
						 	confirm_query($ares);
						 	$subcount=mysqli_num_rows($ares);
						 	echo $percentage=($subcount/$totalcount)*100;
						 	?>
						 	<div class="progress-wrap">
								<h4><?php echo $row['catname']; ?></h4>
								<div class="progress">
								  <div class="progress-bar  color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage; ?>%">
									<span class="bar-width"><?php echo $percentage; ?>%</span>
								  </div>
								</div>
							</div>
						 	<?php
						 }
					?>
					<!-- <div class="progress-wrap">
						<h3>Craft</h3>
						<div class="progress">
						  <div class="progress-bar  color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
							<span class="bar-width">85%</span>
						  </div>

						</div>
					</div>

					<div class="progress-wrap">
						<h4>Antique</h4>
						<div class="progress">
						  <div class="progress-bar color2" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
						   <span class="bar-width">95%</span>
						  </div>
						</div>
					</div>

					<div class="progress-wrap">
						<h4>Art</h4>
						<div class="progress">
						  <div class="progress-bar color3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
							<span class="bar-width">80%</span>
						  </div>
						</div>
					</div>

					<div class="progress-wrap">
						<h4>Automobile</h4>
						<div class="progress">
						  <div class="progress-bar color4" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
							<span class="bar-width">90%</span>
						  </div>
						</div>
					</div>
					<div class="progress-wrap">
						<h3>Book</h3>
						<div class="progress">
						  <div class="progress-bar  color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
							<span class="bar-width">85%</span>
						  </div>

						</div>
					</div>

					<div class="progress-wrap">
						<h4>Coin</h4>
						<div class="progress">
						  <div class="progress-bar color2" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
						   <span class="bar-width">95%</span>
						  </div>
						</div>
					</div> -->
					<!-- <div class="progress-wrap">
						<h4>Jewelry</h4>
						<div class="progress">
						  <div class="progress-bar color3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
							<span class="bar-width">80%</span>
						  </div>
						</div>
					</div> -->
					<?php $i=80
					 ?> 	
					<!-- <div class="progress-wrap">
						<h4>Stamps</h4>
						<div class="progress">
						  <div class="progress-bar color4" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $i; ?>%">
							<span class="bar-width"><?php echo $i; ?>%</span>
						  </div>
						</div>
					</div> -->
				</div>				
			</div>
		</div>
	</div>
	
	<div class="our-team" style="background-color: #d8f5f2">
		<!-- <div class="container">
			<h3 style="text-align: center;">Our Team</h3>	
			<div class="text-center">
				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" >
					<img src="image/member/WYKK.jpeg" alt="" style="width: 200px; height: 200px;">
					<h4><a href="https://www.facebook.com/nectartara119">Wyutyi Koko</a></h4>
					<p>Development</p>
				</div>
				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
					<img src="image/member/ZM.jpeg" alt="" style="width: 200px; height: 200px;">
					<h4><a href="https://www.facebook.com/zawmimi.mi">Zaw Mee</a></h4>
					<p>Design</p>
				</div>
				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" >
					<img src="image/member/TLN.jpg" alt="" style="width: 200px; height: 200px;">
					<h4><a href="https://www.facebook.com/profile.php?id=100008610407504">Thwe Lay Ngon</a></h4>
					<p>Development</p>
				</div>
			</div>
		<div class="container">
			<div class="text-center">
				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" >
					<img src="image/member/kLH.jpg" alt="" style="width: 200px; height: 200px;">
					<h4><a href="https://www.facebook.com/profile.php?id=100009296134925">Kyaw Lin Htwe</a></h4>
					<p>Development</p>
				</div>
				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
					<img src="image/member/TO2.jpg" alt="" style="width: 200px; height: 200px; ">
					<h4><a href="https://www.facebook.com/tin.ohi.5">Tin Ohn</a></h4>
					<p>Design</p>
				</div>
				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" >
					<img src="image/member/SPYT.jpg" alt="" style="width: 200px; height: 200px;">
					<h4><a href="https://www.facebook.com/april.mpp">Su Pwint Yati</a></h4>
					<p>Android</p>
				</div>
			</div>
			</div>
		</div> -->
		<div class="container">
			<div class="row">
			<h3 style="text-align: center; color: green; font-size: 30px;">Our Team</h3>	<br><br>
			<div class="text-center">
				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
					<img src="image/member/ZM.jpeg"class="img-circle center-block" alt="" style="width: 250px; height: 250px; border-radius: 50%;">
					 <h4><a href="https://www.facebook.com/zawmimi.mi" target="_blank">Zaw Mee</a></h4>
					<h5><a href="http://ucsmyitkyina.moe.edu.mm/" target="_blank">CU (Myit Kyi Na)</a></h5>
					<p>Design</p>
				</div>

				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
					
					<img src="image/member/kLH.jpg" class="img-circle center-block" alt="" style="width: 250px; height: 250px; border-radius: 50%;">
					<h4><a href="https://www.facebook.com/profile.php?id=100009296134925" target="_blank">Kyaw Lin Htwe</a></h4>
					<h5><a href="http://ucsy.edu.mm/" target="_blank">UCSY</a></h5>
					<p>Development</p>
					
				</div>
				
				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
					
					<img src="image/member/TLN.jpg" class="img-circle center-block" alt="" style="width: 250px; height: 250px; border-radius: 50%;">
					
					<h4><a href="https://www.facebook.com/profile.php?id=100008610407504" target="_blank">Thwe Lay Ngon</a></h4>
					<h5><a href="http://ucsy.edu.mm/" target="_blank">UCSY</a></h5>
					<p>Development</p>
			
				</div>
			</div>

		<div class="container">
			<div class="text-center">
				<div class="col-md-4 wow fadeInDown">
					<img src="image/member/WYKK.jpeg" class="img-circle center-block" alt="" style="width: 250px; height: 250px; border-radius: 50%;">
					<h4><a href="https://www.facebook.com/nectartara119" target="_blank">Wyutyi Koko</a></h4>
					<h5><a href="">TU(Thanlyin)</a></h5>
					<p>Development</p>
				</div>

				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
					<img src="image/member/TO2.jpg"class="img-circle center-block" alt="" style="width: 250px; height: 250px; border-radius: 50%;">
					<h4><a href="https://www.facebook.com/tin.ohi.5" target="_blank">Tin Ohn</a></h4>
					<h5><a href="http://ucsmyitkyina.moe.edu.mm/" target="_blank">CU (Myit Kyi Na)</a></h5>
					<p>Development</p>
				</div>


				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" >
					<img src="image/member/SPYT.jpg" class="img-circle center-block"  alt="" style="width: 250px; height: 250px; border-radius: 50%;">
					<h4><a href="https://www.facebook.com/april.mpp" target="_blank">Su Pwint Yati</a></h4>
					<h5><a href="http://ucspyay.moe.edu.mm/" target="_blank">CU (Pyay)</a></h5>
					<p>Android</p>
				</div>
			</div>
			</div>
			</div>
		</div>
	</div>
	
	<?php include_once "asset/footer.php" ?>
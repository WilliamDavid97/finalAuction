<?php include_once "asset/header.php" ?>

	
	<section id="main-slider" class="no-margin">
        <div class="carousel slide">      
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2 class="animation animated-item-1"><i>Welcome From<span> Online Auction </span>System</i></h2>
                                    <!-- <p class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</p>
                                    <a class="btn-slide animation animated-item-3" href="#">Read More</a> -->
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img3.png" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->             
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
    </section><!--/#main-slider-->
	
	<div class="feature">
		<div class="container">
			<div class="text-center">
				<div class="col-md-3">
					<div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" >
						<i class="fa"><div class="inte">1<sup>st</sup></div></i>	
						<h2>REGISTER</h2>
						<p>To start using our auction, you’ll need to register. It’s completely free!</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
						<i class="fa">2<sup>nd</sup></i>	
						<h2>BID</h2>
						<p>You can instantly buy or place a bid on a desired product right after registration.</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" >
						<i class="fa">3<sup>rd</sup></i>	
						<h2>SUBMIT A BID</h2>
						<p>Submitting a bid is fast and easy. The process takes approximately afew minute.</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
						<i class="fa">4<sup>th</sup></i>	
						<h2>WIN</h2>
						<p>Easily win at our auction and enjoy owning the product you dream of !</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="about">
		<div class="container">
			<div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" >
				<img src="image/back.jpg" class="img-responsive" style="margin-top: 90px;
    height: 400px;" />
			</div>
			
			<div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
				<h2>Rules and Regulations</h2>
					<p><b>1.</b> You must be at least 18 years of age before you connect our auction system and able to form legally binding contracts under our system.</p>
					<p><b>
					2.</b>  And you can select an item for online bidding, then bidding for this system will continue during in our auction system.</p>
					<p><b>
					3.</b> You must have credict card, or visa card for payment system to bid any products.</p>
					<p><b>
					4.</b> If you want to be an auctioneer , you should place a bid on an online auction item at first.</p>
					<p><b>
					5.</b> If your bid is the highest amount at our auction close , you are the winning bidder and your bid is accepted by seller. When you buy a fix-price item , you must follow a legally binding contract to purchase the product from the auctioneer.</p>
					<p><b>
					6.</b> Notice that you have many chances , that place and confirmed a bid .</p>
					<p><b>
					7.</b> The most importhant thing of u should know is in the case of two bidders choose the same maximum amount on bid , the first bid is reduced by the our auction system.</p>
					<p><b>
					8.</b> Auctioneer hold the rights to add or remove items' descriptions at any time without notice.</p>
					<p><b>
					9.</b> You must have at least extra $100 more than you selected item.</p>
					<p><b>
					10.</b> You must read , understand and accept to our Terms of services for bidders.</p>
					<p><b>11.</b> If you sent an auction thing to admin , admin will never allow to cancel this auction things.</p>
			</div>
		</div>
	</div>
	
	<div class="lates">
		<div class="container">
			<div class="text-center">
				<h2>Latest 	Products</h2>
			</div>
			<?php 
	$sql="SELECT * FROM product ORDER BY product_id DESC LIMIT 3";
	$res=mysqli_query($conn,$sql);
	while ($row=mysqli_fetch_assoc($res)) {
		$product_id=$row['product_id'];
		$product_name=$row['product_name'];
		$description=$row['description'];
		$product_image=unserialize($row['image'])[0];
		?>
		<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
				<a href="product_detail/product_detail.php?product_id=<?php echo $product_id; ?>"><img src="images/<?php echo $product_image;?>" class="img-responsive" style="width: 500px; height: 350px;"/></a>
				<h3><?php echo $product_name; ?></h3>
				<p><?php echo $description; ?>
				</p>
			</div>
		<?php
	}
	?>
			
			
			<!-- <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
				<a href="eachItem/eachProduct.php"><img src="AuctionImage/Jewelry/Jewelry9b.jpg" class="img-responsive"/></a>
				<h3>Minoan Snake Bracelet - Armlet (Silver)</h3>
				<p>This extremely feminine Ancient Minoan bracelet or armlet has an original Hellenistic charm. Due to the unusual nature regarding size and fit, it is quite size specific so please don't hesitate to contact us for more information before ordering to make sure it will have a comfortable fit that you need. 
				</p>
			</div>
			
			<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">				
				<a href="eachItem/eachProduct.php"><img src="AuctionImage/Stamps/stamps6.jpg" class="img-responsive"/></a>
				<h3>Vintage Keep Calm </h3>
				<p>Vintage Keep Calm and Carry ON Wax Seal Stamp Wedding Invitation
				</p>
			</div> -->
		</div>
	</div>
	
	<section id="partner">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Our Partners</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>    

            <div class="partners">
                <ul>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/partners/partner1.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="images/partners/partner2.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="images/partners/partner3.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="images/partners/partner4.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="images/partners/partner5.png"></a></li>
                </ul>
            </div>        
        </div><!--/.container-->
    </section><!--/#partner-->
	
	<section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="pull-left">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <h2>Have a question or need a custom quote?</h2>
                            <p>You can connect our office phone number,<br><a href="#" style="color: #000;">+959696945971</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->    
    </section><!--/#conatcat-info-->
	
	<?php include_once "asset/footer.php" ?>
<?php include_once "asset/header.php" ?>
	
	<!-- <div id="breadcrumb">
		<div class="container">	
			<div class="breadcrumb">							
				<li><a href="index.php">Home</a></li>
				<li>Contact</li>			
			</div>		
		</div>	
	</div> -->
	<div id="breadcrumb" style="background-color: #00ffff">
		<div class="container">	
			<div class="breadcrumb" style="background-color: #00ffff">							
				<li><a href="index.php" style="color: #000;">Home</a></li>
				<li style="color: #000;">Contact</li>			
			</div>		
		</div>	
	</div>
	
	<div class="map">
		<!-- <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kuningan,+Jakarta+Capital+Region,+Indonesia&amp;aq=3&amp;oq=kuningan+&amp;sll=37.0625,-95.677068&amp;sspn=37.410045,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Kuningan&amp;t=m&amp;z=14&amp;ll=-6.238824,106.830177&amp;output=embed">
		</iframe> -->
        <iframe src="https://maps.google.com/maps?q=greenhackerinstitute&t=&z=13&ie=UTF8&iwloc=&output=embed"> </iframe>
	</div>
	<?php 
    if (isset($_POST['submit'])) {
        $product_name=$_POST['product_name'];
        $product_cat_id=$_POST['product_cat_id'];
        $product_price=$_POST['product_price'];
        $description=$_POST['description'];
        $auction_time=$_POST['auction_time'];
        $user_name=$_SESSION['fullname'];

                $imageArray=array();
              //echo $user_id;
              $filename=$_FILES['product_image']['name'];
              $tmpname=$_FILES['product_image']['tmp_name'];
              $filetype=$_FILES['product_image']['type'];
                          for($i=0;$i<=count($tmpname)-1;$i++){
                            $name=addslashes($filename[$i]);
                            array_push($imageArray,$name);
                             move_uploaded_file($tmpname[$i],"images/".$filename[$i]);
                           }
        //$product_date=date('d-m-y');
        $imageArray=serialize($imageArray);
        $query="INSERT INTO sent_product(product_name, price, description, product_date, image, catid,auction_time,user_name)
                 VALUES ('$product_name','$product_price','$description',now(),'$imageArray','$product_cat_id','$auction_time','$user_name')";
        $result=mysqli_query($conn,$query);
        header('Localtion:thank_you.php');
        
    }
    ?>
	<section id="contact-page">
        <div class="container">
            <div class="center">        
                <h2>Sent Your Product</h2>
                <!-- <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="" enctype="multipart/form-data">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Product Name *</label>
                            <input type="text" name="product_name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Price *</label>
                            <input type="text" name="product_price" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Image</label>
                            <input type="file" name="product_image[]" multiple="">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Choose Category</label>
                            <select name="product_cat_id" id="" class="form-control">
                                <?php 
                            $query="SELECT * FROM category";
                            $res=mysqli_query($conn,$query);
                            
                            while ($row=mysqli_fetch_assoc($res)) {
                                $catid=$row['catid'];
                                $catname=$row['catname'];
                                echo "<option value='{$catid}'>{$catname}</option>";
                            }
                             ?>
                                
                            </select>
                        </div>                      
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Select Auction Time</label>
                            <!-- <input type="text" name="subject" class="form-control" required="required"> -->
                            <select name="auction_time" id="" class="form-control">
                                <option value='8'>8 Hours</option>
                                <option value='16'>16 Hours</option>
                                <option value='24'>24 Hours</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description *</label>
                            <textarea name="description" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Sent</button>
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->
	
	<?php include_once "asset/footer.php" ?>
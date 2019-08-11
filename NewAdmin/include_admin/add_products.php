<?php
	include_once "functions.php";
	if(isset($_POST['create'])){
		add_product();
		echo "Add Post success "."<a href='product.php'>View Products</a>";
	}
?> 
<form action="" enctype="multipart/form-data" method="post">
	<div class="form-group">
		<label for="" class="control-label">Product Name</label>
		<input type="text" class="form-control"  name="product_name">
	</div>
	<div class="form-group">
		<label for="">Product Price</label>
		<input type="text" class="form-control"  name="product_price">
		
	</div>
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
		<label for="" class="control-label">Description</label>
		<textarea name="description" id="" cols="30" rows="10" class="form-control">
    	</textarea>
	</div>
	<!-- <div class="form-group">
		<label for="" class="control-label">Date</label>
		<input type="text" class="form-control"  name="product_date">
	</div> -->
	<div class="form-group">
		<label for="" class="control-label">Image</label>
		<input type="file" name="product_image[]" multiple="">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Category</label>
		<!-- <input type="text" class="form-control" name="product_cat_id"> -->
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
	<div class="form-group">
		<input type="submit" name="create" value="Create Products" class="btn btn-primary">
	</div>
</form>
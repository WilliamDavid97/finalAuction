<?php 
	if(isset($_POST['update'])){
		$product_id=$_GET['update'];
		$product_name=$_POST['product_name'];
        $product_cat_id=$_POST['product_cat_id'];
        $product_price=$_POST['product_price'];
        $description=$_POST['description'];

        $imageArray=array();

        $filename=$_FILES['product_image']['name'];
              $tmpname=$_FILES['product_image']['tmp_name'];
              $filetype=$_FILES['product_image']['type'];
                          for($i=0;$i<=count($tmpname)-1;$i++){
                            $name=addslashes($filename[$i]);
                            array_push($imageArray,$name);
                             move_uploaded_file($tmpname[$i],"../images/".$filename[$i]);
                           }
        //$product_date=date('d-m-y');
        $imageArray=serialize($imageArray);
        if(empty($filename)){
            $query="SELECT * FROM product WHERE product_id=$product_id";
            $result=mysqli_query($conn,$query);
            confirm_query($result);
            while ($row=mysqli_fetch_assoc($result)) {
                $imageArray=$row['image'];
            }
        }
        
        $query="UPDATE product SET product_name='$product_name',price='$product_price',description='$description',product_date=now(),image='$imageArray',catid='$product_cat_id' WHERE product_id='$product_id'";
        $result=mysqli_query($conn,$query);
		confirm_query($result);
	}
?>
<?php
	if(isset($_GET['update'])){
		$product_id=$_GET['update'];
		$query="SELECT * FROM product WHERE product_id=$product_id";
		$result=mysqli_query($conn,$query);
		while ($row=mysqli_fetch_assoc($result)) {
			$product_id=$row['product_id'];
			$product_name=$row['product_name'];
			$product_cat_id=$row['catid'];
			$product_price=$row['price'];
			$description=$row['description'];
			$product_date=$row['product_date'];
			$product_image=$row['image'];
		}
?>
<form action="" enctype="multipart/form-data" method="post">
	<div class="form-group">
		<label for="" class="control-label">Product Name</label>
		<input type="text" class="form-control" name="product_name" value="<?php echo $product_name ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Product Category Id</label>
<!-- 		<input type="text" class="form-control" name="product_cat_id" value="<?php echo $product_cat_id ?>"> -->
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
		<label for="" class="control-label">Product Price</label>
		<input type="text" class="form-control" name="product_price" value="<?php echo $product_price ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Description</label>
		<input type="text" class="form-control" name="description" value="<?php echo $description ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Image</label>
		<input type="file" name="product_image[]" multiple="">
		<img src="../images/<?php echo $product_image?>" alt="" class="img-responsive" width="100px;">
	</div>
	<div class="form-group">
		<input type="submit" name="update" value="Update Products" class="btn btn-primary">
	</div>
</form>
<?php 
	}
?>

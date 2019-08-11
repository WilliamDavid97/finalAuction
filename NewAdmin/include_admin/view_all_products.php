<?php
    if(isset($_POST['checkboxArray'])){

        foreach ($_POST['checkboxArray'] as $checkboxValue) {
            $bulk_option=$_POST['bulk_option'];
            switch ($bulk_option) {
                case 'delete':
                    $query="DELETE FROM product WHERE product_id=$checkboxValue";
                    $result=mysqli_query($conn,$query);
                    confirm_query($result);
                    break;
                case 'clone':
                    $query="SELECT * FROM product WHERE product_id=$checkboxValue";
                    $result=mysqli_query($conn,$query);
                    confirm_query($result);
                    while ($row=mysqli_fetch_assoc($result)) {
                        $product_id=$row['product_id'];
                        $product_name=$row['product_name'];
                        $product_price=$row['price'];
                        $product_cat_id=$row['catid'];
                        $product_date=$row['product_date'];
                        $product_image=$row['image'];
                        $description=$row['description'];
                    }
                    $query="INSERT INTO product(product_name, price, description, product_date, image, catid) VALUES ('$product_name','$product_price','$description',now(),'$product_image','$product_cat_id')";
                    $copy_result=mysqli_query($conn,$query);
                    confirm_query($copy_result);
                    break;
                
                default:
                    # code...
                    break;
            }
         }
    }
?>
<form action="" method="post" >
    <div class="form-group col-md-4">
        <select id="" class="form-control" name="bulk_option">
            <option value="">--Select--</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>

        </select>
    </div>
    <div class="form-group col-md-2">
        <input type="submit" name="apply" class="btn btn-primary">
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><input type="checkbox" id="checkboxth"></th>
                    <th>Number</th>
                    <th>Product Name</th>
                    <th>Product Category Id</th>
                    <th>Product Price</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                    $query="SELECT * FROM product";
                    $result= mysqli_query($conn,$query);
                    if(!$result){
                        die("Query Failed".mysqli_error($result));
                    }
                    while ($row=mysqli_fetch_assoc($result)) {
                        $product_id=$row['product_id'];
                        $product_name=$row['product_name'];
                        $product_cat_id=$row['catid'];
                        $product_price=$row['price'];
                        $description=$row['description'];
                        $product_date=$row['product_date'];
                        $product_image=$row['image'];
                        //echo $product_image=unserialize($product_image)[0];

                ?>
                <tr>
                    <td><input type="checkbox" name="checkboxArray[]" class="checkboxtd" value="<?php echo $product_id ?>"></td>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $product_name ?></td>
                    <td><?php
                            $query="SELECT * FROM category WHERE catid=$product_cat_id";
                            $cat_result=mysqli_query($conn,$query);
                            while ($row=mysqli_fetch_assoc($cat_result)) {
                                $cat_name=$row['catname'];
                            echo $cat_name;
                        }
                    ?></td>
                    <td><?php echo $product_price ?></td>
                    <td><?php echo substr($description,0,50) ?></td>
                    <td><?php echo $product_date ?></td>
                    <td>
                        <!-- <img src="../images/<?php echo $product_image ?>" class="img-responsive" width="100px"> -->
                        <?php 
                            $noimage=count(unserialize($product_image));
                            for ($i=0; $i <$noimage ; $i++) { 
                               echo  $eachimage=unserialize($product_image)[$i]."<br>";
                            }
                        ?>
                    </td>
                    
                    <td><a onclick="javaScript: return confirm('Are You Sure To Delete?')" href="Product.php?delete=<?php echo $product_id ?>" class="btn btn-danger">Delete</a></td>
                    <td><a href="Product.php?source=<?php echo 'update_products'?>&update=<?php echo $product_id ?>" class="btn btn-success">Edit</a></td>
                </tr>
                <?php
                $no++;
                    }
                ?>
        </tbody>
    </div>
    </table>
</form>


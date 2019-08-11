<?php
                add_category();
            ?>
            
<?php 
    if(isset($_POST['update'])){
        $cat_name=$_POST['cat_name'];
        $cat_id=$_GET['update'];
        $query="UPDATE category SET catname='$cat_name' WHERE catid=$cat_id";
        $result=mysqli_query($conn,$query);
        confirm_query($result);
    }

    if(isset($_GET['update'])){
        $cat_id=$_GET['update'];
        $query="SELECT * FROM category WHERE catid=$cat_id";
        $result=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($result)) {
            $cat_name=$row['catname'];
            }
            
?>
<form action="" method="post">
    <div class="form-group">
        <label for="" class="control-label">Categories</label>
        <input type="text" class="form-control" name="cat_name" value="<?php echo $cat_name; ?>">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update Categories" name="update">
    </div>
    
</form>
<?php
    }else{
        ?>
        <form action="" method="post">
                <div class="form-group">
                    <label for="" class="control-label">Categories</label>
                    <input type="text" class="form-control" name="cat_name">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Add Categories" name="submit">
                </div>

            </form>
        <?php
    }
    
?>
<?php include_once "include_admin/admin_header.php" ?>
  <!-- Sidenav -->
  <?php include_once"include_admin/admin_nav.php" ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="sent_product.php">Sent Product</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" action="../leveinshtein/leveinshteinstemer.php" method="post">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text" name="searchbox">
            </div>
          </div>
          <input type="submit" name="search" class="btn btn-success" value="Search">
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
<?php
$email=$_SESSION['email'];
  $sql="SELECT * FROM user WHERE email='$email'";
  $res=mysqli_query($conn,$sql);
  confirm_query($res);
  while ($prorow=mysqli_fetch_assoc($res)) {
    $user_id=$prorow['user_id'];
    $fullname=$prorow['fullname'];
    $user_image=$prorow['user_image'];
  } 
?>
                  <img alt="Image placeholder" src="../images/user_image/<?php echo $user_image; ?>" style="width: 36px;height:36px; border-radius: 50%">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['fullname']; ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="" class="dropdown-item">
                <i class="ni ni-box-2"></i>
                <span>Inbox</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary  pt-md-7">
    </div>
    <div>
      <?php 
        if (isset($_GET['sent_id'])) {
          $sent_id=$_GET['sent_id'];
          $query="SELECT * FROM sent_product WHERE product_id=$sent_id";
          $resu= mysqli_query($conn,$query);
          if(!$resu){
              die("Query Failed".mysqli_error($resu));
          }
          while ($row=mysqli_fetch_assoc($resu)) {
              $product_id=$row['product_id'];
              $product_name=$row['product_name'];
              $product_cat_id=$row['catid'];
              $product_price=$row['price'];
              $description=$row['description'];
              $product_image=$row['image'];
              $auction_time=$row['auction_time'];
              $query="INSERT INTO product(product_name, price, description, product_date, image, catid,auction_time)
                       VALUES ('$product_name','$product_price','$description',now(),'$product_image','$product_cat_id','$auction_time')";
              $result=mysqli_query($conn,$query);
              $product_id=$_GET['delete'];
              $selectquery="SELECT * FROM sent_product WHERE product_id=$product_id";
                  $selectres=mysqli_query($conn,$selectquery);
                  while ($selectrow=mysqli_fetch_assoc($selectres)) {
                    for ($i=0; $i <count(unserialize($selectrow['image'])) ; $i++) { 
                      unlink("../images/".unserialize($selectrow['image'])[$i]);
                    }
                    
                  }
              $dquery="DELETE FROM sent_product WHERE product_id=$sent_id";
              $dres=mysqli_query($conn,$dquery);
              confirm_query($dres);
          }

        }

        if(isset($_GET['delete'])){
            $product_id=$_GET['delete'];
             $selectquery="SELECT * FROM sent_product WHERE product_id=$product_id";
                  $selectres=mysqli_query($conn,$selectquery);
                  while ($selectrow=mysqli_fetch_assoc($selectres)) {
                    for ($i=0; $i <count(unserialize($selectrow['image'])) ; $i++) { 
                      unlink("../images/".unserialize($selectrow['image'])[$i]);
                    }
                    
                  }
            $query="DELETE FROM sent_product WHERE product_id=$product_id";
            $result=mysqli_query($conn,$query);
            confirm_query($result);
        }
      ?>
      <div class="row mt-3" style="width: 100%;">
        <div class="col-md-12">
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
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                    $query="SELECT * FROM sent_product";
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
                        <img src="../images/<?php echo $product_image ?>" class="img-responsive" width="100px">
                    </td>
                    
                    <td><a onclick="javaScript: return confirm('Are You Sure To Delete?')" href="sent_product.php?delete=<?php echo $product_id ?>" class="btn btn-danger">Delete</a></td>
                    <td><a href="sent_product.php?sent_id=<?php echo $product_id ?>" class="btn btn-info">Allow</a></td>
                </tr>
                <?php
                $no++;
                    }
                ?>
        </tbody>
    </div>
    </table>
</form>
          
      </div>
    </div>
    <!-- Page content -->
   
  <!-- Argon Scripts -->
  <!-- Core -->
  <?php include_once "include_admin/admin_footer.php" ?>
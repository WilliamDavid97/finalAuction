<?php include_once "include_admin/admin_header.php" ?>
  <!-- Sidenav -->
  <?php include_once"include_admin/admin_nav.php" ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="product.php">Product</a>
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
              <a href="feedback.php" class="dropdown-item">
                <i class="ni ni-box-2"></i>
                <span>Inbox</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="include_admin/logout.php" class="dropdown-item">
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
      <div class="row mt-3" style="width: 100%;">
        <div class="col-xl-12">
            <?php
              if(isset($_GET['delete'])){
                  $product_id=$_GET['delete'];
                   $selectquery="SELECT * FROM product WHERE product_id=$product_id";
                  $selectres=mysqli_query($conn,$selectquery);
                  while ($selectrow=mysqli_fetch_assoc($selectres)) {
                    for ($i=0; $i <count(unserialize($selectrow['image'])) ; $i++) { 
                      unlink("../images/".unserialize($selectrow['image'])[$i]);
                    }
                    
                  }
                  $query="DELETE FROM product WHERE product_id=$product_id";
                  $result=mysqli_query($conn,$query);
                  confirm_query($result);
              }
            ?>
           <?php
                if(isset($_GET['source'])){
                    $source=$_GET['source'];
                }else{
                    $source='';

                }
                switch ($source) {
                    case 'add_products':
                        include_once "include_admin/add_products.php";
                        break;
                    case 'update_products':
                        include_once "include_admin/update_products.php";
                        break;
                    default:
                        include_once "include_admin/view_all_products.php";
                        break;
                }
           ?>
          
      </div>
    </div>
    <!-- Page content -->
   
  <!-- Argon Scripts -->
  <!-- Core -->
  <?php include_once "include_admin/admin_footer.php" ?>
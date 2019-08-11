<?php include_once "include_admin/admin_header.php" ?>
  <!-- Sidenav -->
  <?php include_once"include_admin/admin_nav.php" ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="category.php">Category</a>
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
      <div class="row mt-3" style="width: 100%;">
        <div class="col-md-6">
            <?php include_once 'include_admin/update_categories.php' ?>
            
        </div>
          
        <div class="col-md-6">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>Category Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                        $query="SELECT * FROM category";
                        $result=mysqli_query($conn,$query);
                        if(!$result){
                            die("Query Failed".mysqli_error($result));
                        }
                        while ($row=mysqli_fetch_assoc($result)) {
                            $cat_id=$row['catid'];
                            $cat_name=$row['catname'];
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $cat_name; ?></td>
                            <td><a href="category.php?delete=<?php echo $cat_id ?>" class="btn btn-danger">Delete</a></td>
                            <td><a href="category.php?update=<?php echo $cat_id ?>" class="btn btn-success">Edit</a></td>
                            
                        </tr>
                    <?php
                    $no++;
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>
        <?php 
            if(isset($_GET['delete'])){
                $cat_id=$_GET['delete'];
                $query="DELETE FROM category WHERE catid='$cat_id'";
                $result=mysqli_query($conn,$query);
                if(!$result){

                    die("Query Failed".mysqli_error($result));
                }
                header("Location:category.php");
            }
        ?>
          
      </div>
    </div>
    <!-- Page content -->
   
  <!-- Argon Scripts -->
  <!-- Core -->
  <?php include_once "include_admin/admin_footer.php" ?>
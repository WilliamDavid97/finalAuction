<?php include_once "include_admin/admin_header.php" ?>
  <!-- Sidenav -->
  <?php include_once"include_admin/admin_nav.php" ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Dashboard</a>
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
          <input type="submit" name="search" class="btn btn-primary fa fa-search" value="Search" style="border-radius: 30%">
          <!-- <span class="btn bg-gradient-primary fa fa-search" name="search"></span> -->
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
    <?php 
      $product_query="SELECT * FROM product";
      $product_result=mysqli_query($conn,$product_query);
      confirm_query($product_result);
      $product_count=mysqli_num_rows($product_result);
     ?>

     <?php 
        $user_query="SELECT * FROM user";
        $user_result=mysqli_query($conn,$user_query);
        confirm_query($user_result);
        $user_count=mysqli_num_rows($user_result);
      ?>

      <?php 
        $feedback_query="SELECT * FROM feedback";
        $feedback_result=mysqli_query($conn,$feedback_query);
        confirm_query($feedback_result);
        $feedback_count=mysqli_num_rows($feedback_result);
       ?>

       <?php 
          $category_query="SELECT * FROM category";
          $category_result=mysqli_query($conn,$category_query);
          confirm_query($category_result);
          $category_count=mysqli_num_rows($category_result);
        ?>
        <?php 
          $sent_query="SELECT * FROM sent_product";
          $sent_result=mysqli_query($conn,$sent_query);
          confirm_query($sent_result);
          $sent_count=mysqli_num_rows($sent_result);
        ?>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <a href="product.php"><h5 class="card-title text-uppercase text-blue mb-0">Products</h5></a>
                      <span class="h2 font-weight-bold mb-0"><?php echo $product_count ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <a href="user.php"><h5 class="card-title text-uppercase text-blue mb-0">New users</h5></a>
                      <span class="h2 font-weight-bold mb-0"><?php echo $user_count ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <a href="feedback.php"><h5 class="card-title text-uppercase text-blue mb-0">Feedback</h5></a>
                      <span class="h2 font-weight-bold mb-0"><?php echo $feedback_count ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-file"></i>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-yellow mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <a href="Category.php"><h5 class="card-title text-uppercase text-blue mb-0">Categories</h5></a>
                      <span class="h2 font-weight-bold mb-0"><?php echo $category_count ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-list"></i>
                      </div>
                    </div>
                  </div>
<!--                   <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
      $admin_query="SELECT * FROM user WHERE role='admin'";
      $admin_result=mysqli_query($conn,$admin_query);
      confirm_query($admin_result);
      $admin_count=mysqli_num_rows($admin_result);
     ?>

    <?php 
      $subscriber_query="SELECT * FROM user WHERE role='subscriber'";
      $subscriber_result=mysqli_query($conn,$subscriber_query);
      confirm_query($subscriber_result);
      $subscriber_count=mysqli_num_rows($subscriber_result);
     ?>
    <!-- Page content -->

    <div>
        
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Percentage'],
          ["Products", <?php echo $product_count; ?>],
          ["Feedbacks", <?php echo $feedback_count; ?>],
          ["Admin", <?php echo $admin_count; ?>],
          ["Subscriber", <?php echo $subscriber_count; ?>],
          ["Sent Product",<?php echo $sent_count; ?>]
        ]);

        var options = {
          width: 1100,
          legend: { position: 'none' },
          chart: {
            title: 'Chess opening moves',
            subtitle: 'popularity by percentage' },
          axes: {
            x: {
              0: { side: 'top', label: 'White to move'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
    <div id="top_x_div" style="width: 100%; height: 600px;"></div>
    </div>
    
    </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <?php include_once "include_admin/admin_footer.php" ?>
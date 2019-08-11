<style type="text/css">
  #merge{
  
    z-index: 11;
  }
</style>



  <nav id="merge" class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="../index.php">
        <img src="./assets/img/brand/logo1.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="logout.php" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.php">
                <img src="./assets/img/brand/logo1.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="auction.php">
              <i class="ni ni-collection text-blue"></i> Auction List
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" data-target="#user_dropdown" href="javascript:;">
              <i class="ni ni-single-02 text-orange"></i> Users
            </a>
            <ul id="user_dropdown" class="collapse">
              <li><a href="user.php">View all user</a></li>
              <li>
                  <a href="user.php?source=<?php echo 'add_user'?>">Add user</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="category.php">
              <i class="ni ni-bullet-list-67 text-yellow"></i> Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:;" data-toggle="collapse" data-target="#product">
              <i class="ni ni-bag-17 text-red"></i> Products
            </a>
            <ul id="product" class="collapse">
              <li>
                  <a href="product.php">View All Products</a>
              </li>
              <li>
                  <a href="product.php?source=add_products">Add Product</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="feedback.php">
              <i class="ni ni-like-2 text-info"></i> Feedback
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sent_product.php">
              <i class="ni ni-bag-17 text-blue"></i> Sent Product
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="auction_price.php">
              <i class="ni ni-collection text-blue"></i> Auction Price List
            </a>
          </li>
        </ul>
        <!-- Divider -->

      </div>
    </div>
  </nav>


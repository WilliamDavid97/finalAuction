<?php include_once "db.php" ?>
<?php include_once "NewAdmin/include_admin/functions.php" ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Aucion</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" />

    <!-- Font awesome -->
    <link href="product/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="product/css/bootstrap.css" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="product/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="product/css/jquery.simpleLens.css">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="product/css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="product/css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="product/css/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="product/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="product/css/style.css" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>
  <body>
    <header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">
              <a href="index.php"><!-- <h1><span>Auc</span>tion</h1> -->
                <img src="logo1.png">
              </a>
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <div class="productMenu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="index.php" class="active">Home</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <?php
                      category();
                      ?>

                        <!-- <li><a href="product.php">Automobiles</a></li>
                        <li><a href="product.php">coins</a></li>
                        <li><a href="product.php">stamps</a></li>
                        <li><a href="product.php">Jewelry</a></li>
                        <li><a href="product.php">Art</a></li>
                        <li><a href="product.php">Antique</a></li>
                        <li><a href="product.php">Books</a></li> -->
                    </ul>
                </li>
                <li role="presentation"><a href="about.php">About Us</a></li>
                                <?php
                                  $fullname=$_SESSION['fullname'];
                                if (!isset($fullname)) {
                                    ?>
                                    <li role="presentation"><a href="login_form.php">Login</a></li>
                                <li role="presentation"><a href="register.php">Register</a></li>
                                    <?php
                                }else{
                   ?>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i><?php echo $_SESSION['fullname']; ?></i>   <b class="caret"></b> </a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        if ($_SESSION['role']=='admin') {
                                           ?>
                                           <li>
                                                <a href="NewAdmin/index.php"><i class="fa fa-fw fa-user"></i>Admin</a>
                                            </li>
                                           <?php
                                        }
                                         ?>

                                        <li>
                                            <a href="profile.php"><i class="fa fa-fw fa-user"></i>Profile</a>
                                        </li>
                                        <li>
                                            <a href="feedback.php"><i class="fa fa-fw fa-envelope"></i> Feedback</a>
                                        </li>
                                        <li>
                                            <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Send Product</a>
                                        </li>
                                        <li>
                                            <a href="mysendproduct.php"><i class="fa fa-fw fa-envelope"></i> My Send Product</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="NewAdmin/include_admin/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                        </li>

                                    </ul>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="winner.php">Winner</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </nav>
            </header>
            <body>
              <div class="col-md-12">
                <div class="col-6">
                        <?php
                          $sendproduct_sql="SELECT * FROM sent_product WHERE user_name='$fullname'";
                          $sendproduct_res=mysqli_query($conn,$sendproduct_sql);
                          // if(!$sendproduct_res){
                          //     die("Query Failed".mysqli_error($sendproduct_res));
                          // }
                          while ($row=mysqli_fetch_assoc($sendproduct_res)) {
                             $product_id=$row['product_id'];
                             $product_name=$row['product_name'];
                             $price=$row['price'];
                             $image=$row['image'];
                             $time=$row['product_date'];
                             $description=$row['description'];
                             $catid=$row['catid'];
                             $auction_time=$row['auction_time'];


                            ?>




                <div class="row" style="margin-top:15px;">
                  <div class="col-md-4">
                    <a class="gallery_img" href="<?php echo $image; ?>">
                        <img class="d-block w-100" src="<?php echo $image; ?>"  style="width: 200px;height: 200px;">
                    </a>
                  </div>
                  <div class="col-md-8 offset-4 text-left">
                    <h5><b><?php echo $product_name; ?></b></h5>
                    <p><?php
                    $query="SELECT * FROM category WHERE catid=$catid";
                    $cat_result=mysqli_query($conn,$query);
                    while ($row=mysqli_fetch_assoc($cat_result)) {
                        $cat_name=$row['catname'];
                    echo $cat_name;} ?>
                  </p>
                    <p> <b> <i> $ <?php echo $price; ?> </i> </b> </p>
                    <p><?php echo $description; ?></p>


                  </div>
                </div>

            <?php } ?>






              </div>

            </div>



     </body>


  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="product/js/bootstrap.js"></script>
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="product/js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="product/js/jquery.smartmenus.bootstrap.js"></script>
  <!-- To Slider JS -->
  <script src="product/js/sequence.js"></script>
  <script src="product/js/sequence-theme.modern-slide-in.js"></script>
  <!-- Product view slider -->
  <script type="text/javascript" src="product/js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="product/js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="product/js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="product/js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="product/js/custom.js"></script>

  </body>
</html>

<?php include_once "db.php" ?>
<?php include_once "NewAdmin/include_admin/functions.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Auction Login Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="signin/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="signin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="signin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="signin/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="signin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="signin/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="signin/css/util.css">
    <link rel="stylesheet" type="text/css" href="signin/css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
<!--===============================================================================================-->
</head>
<body>
    <div class="navigation">
                <div class="container">                 
                    <div class="navbar-header">
                        <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button> -->
                        <div class="navbar-brand">
                            <a href="index.php"><!-- <h1><span>Auc</span>tion</h1> -->
                                <img src="logo1.png">
                            </a>
                        </div>
                    </div>
                    
                    <div class="navbar-collapse collapse">                          
                        <div class="menu">
                            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="index.php" class="active">Home</a></li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories</a>
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
                                if (!isset($_SESSION['fullname'])) {
                                    ?>
                                    <li role="presentation"><a href="login_form.php">Login</a></li>
                                <li role="presentation"><a href="register.php">Register</a></li>
                                    <?php
                                }else{
                   ?>
                  
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i><?php echo $_SESSION['fullname']; ?></i></a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                        if ($_SESSION['role']=='admin') {
                                           ?>
                                           <li>
                                                <a href="NewAdmin/index.php"><i class="fa fa-fw fa-user"></i>Admin</a>
                                            </li>
                                           <?php 
                                        }else if ($_SESSION['role']=='subscriber'){
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
                                          <?php
                                          }
                                         ?>
                                        
                                        
                                        
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
    
    <div class="limiter">
        <div class="container-login100" style="background: linear-gradient(-135deg, #525052, #f7f1f7);">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="signin/images/log1.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="login.php" method="post">
                    <span class="login100-form-title">
                        Member Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="login">
                            Login
                        </button>
                    </div>

                    <!-- <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
    
    

    
<!--===============================================================================================-->  
    <script src="signin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="signin/vendor/bootstrap/js/popper.js"></script>
    <script src="signin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="signin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="signin/vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="signin/js/main.js"></script>

</body>
</html>
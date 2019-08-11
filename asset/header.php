<?php include_once "db.php" ?>
<?php include_once "NewAdmin/include_admin/functions.php" ?>
<?php session_start(); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Auction System(GH)</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" />	
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
							<!-- <a href="index.php"><h1><span>Auc</span>tion</h1></a> -->
                            <a href="index.php"><img src="logo1.png"></a>
						</div>
					</div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
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
                                if (!isset($_SESSION['fullname'])) {
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
		</nav>		
	</header>
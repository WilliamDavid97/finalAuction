<?php include_once "db.php" ?>
<?php include_once "NewAdmin/include_admin/functions.php" ?>
<?php session_start(); ?>
<!DOCTYPE html>
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
	<link href="css/style.css" rel="stylesheet"/>	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style >
    	/*.fa{
    		border:1px solid green;
    	}*/
       

   .form-horizontal{
    background-color:  gray;
   }

   .form-control{
  /* border-radius: 30px;
    background-color: #e0e0e0;
    color:gray;
    font-size: 20px;*/


   }
   .control-label{
   /* font-size: 15px;*/
    color: black;

   }

    .aa{
        color:black;
    }   

    </style>
  </head>
  <body style="background-color: gray;">
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
							<a href="index.html"><!-- <h1><span>Auc</span>tion</h1> -->
								<img src="logo1.png">
							</a>
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
	</header><br><br><br><br><br>
     <div class="container">
      
    <div class="row"><br><br><br><br>

      <?php
          $query="SELECT * FROM auction";
          $res=mysqli_query($conn,$query);
          confirm_query($res);
          while ($row=mysqli_fetch_assoc($res)) {
            $auction_id=$row['auction_id'];
            $user_name=$row['user_name'];
            $product_name=$row['product_name'];
            $last_price=$row['last_price'];
            ?>
  <div class="col-lg-12">
    <div class="container" style="background-color: gray; border:3px solid black;box-shadow: 12px 12px 15px black;"> 
        <div class="col-lg-3 ">
            <?php 
                    $user_sql="SELECT * FROM user WHERE fullname='$user_name'";
                    $user_res=mysqli_query($conn,$user_sql);
                    while ($user_row=mysqli_fetch_assoc($user_res)) {
                      $fullname=$user_row['fullname'];
                      $user_image=$user_row['user_image'];
                    }
                ?>
          <h5 text-align="center" class="aa"><h3><i><b> USER IMAGE </b></i></h3></h5>
          <img src="images/user_image/<?php echo $user_image; ?>" class="img-responsive " width="200px" height="200px"style="border:1px solid black;width: 200px;height: 200px;">
        </div>

        <div class="col-lg-6">
          <form action="" class="form-horizontal"><br><br>
            <div class="form-group">
              <label for="" class="control-label col-md-4"> USER NAME:</label>
              <div class="col-md-8">

                <label for="" class="control-label"><?php echo $user_name; ?></label>
              </div>
            </div><br>

            <div class="form-group">
              <label for="" class="control-label col-md-4"> PRODUCT NAME:</label>
              <div class="col-md-8">
                <?php 
                    $product_sql="SELECT * FROM product WHERE product_name='$product_name'";
                    $product_res=mysqli_query($conn,$product_sql);
                    while ($product_row=mysqli_fetch_assoc($product_res)) {
                      $product_image=$product_row['image'];
                    }
                ?>
                <label for="" class="control-label"><?php echo $product_name; ?></label>
              </div>
            </div><br>
            <div class="form-group">
              <label for="" class="control-label col-md-4"> PRICE:</label>
              <div class="col-md-8">
                <label for="" class="control-label">$<?php echo $last_price; ?></label>
              </div>
            </div><br>
          </form>
        </div>

        <div class="col-lg-3 ">
          <h5 text-align="center" class="aa"><h3><i><b> PRODUCT IMAGE </b></i></h3></h5>
          <img src="images/<?php echo $product_image ?>" class="img-responsive " width="200px" height="200px"style="border:1px solid black;width: 200px;height: 200px;">
        </div>
       
       </div>
            <?php
          }
          ?>
      
      </div>
        </div>
        </div>






<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.1.1.min.js"></script>  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
    <script src="js/wow.min.js"></script>
    <script src="js/functions.js"></script>
    
  </body>
</html>
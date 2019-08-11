<?php include_once "db.php" ?>
<?php include_once "NewAdmin/include_admin/functions.php" ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Feedback</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bootstrap 3 template for corporate business" />
<meta name="author" content="http://iweb-studio.com" />
<!-- css -->

<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/animate.css">
<link href="css/prettyPhoto.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet"/>	
<link href="css/bootstrap.min.css" rel="stylesheet">


<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>

    	.navigation{
    		background-color: #e0e0e0;
			
    	}
    	#email{
    		border: 1px solid black;
    		font-size: 20px;
    		border-radius:20px;
    		background-color:  #ccff90;
    	}
    	#comment{
    		border:1px solid black;
    		font-size:20px;
    		border-radius: 20px;
			background-color:  #ccff90;
			color: black;
    	}
    	.btn{
    		font-size: 20px;
    		border:2px solid green;
    		border-radius: 20px;
    	}
    	

    </style>

</head>
<body  style="background-image: url(images/portfolio/full/item3.png);">
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
	</header>

	<br><br><br><br><br><br><br>

<?php 
$email=$_SESSION['email'];
$sql="SELECT * FROM user WHERE email='$email'";
$res=mysqli_query($conn,$sql);
confirm_query($res);
while ($prorow=mysqli_fetch_assoc($res)) {
  $user_id=$prorow['user_id'];
}
    if (isset($_POST['feedback_btn'])) {
        $message=$_POST['message'];
        $query="INSERT INTO feedback( message, user_id) VALUES ('$message',$user_id)";
        $result=mysqli_query($conn,$query);
        confirm_query($result);
        
    }

?>

		<div class="container">
		<div class="row">
		<div class="col-lg-12">

			<form role="form" class="register-form" method="post">
			<h2>Feedback us <small style="color: white;">get in touch with us by filling form below</small></h2>
			<hr style="border:2px solid green;">
				<div class="row">
				<!-- <div class="col-xs-8 col-sm-4 col-md-4">
					<div class="form-group">
						<input type="text" name="email" id="email" class="form-control input-md" placeholder="Email" name="email">
					</div>
				</div> -->
			</div>

			<div class="form-group">
				<textarea class="form-control" rows="6"  id="comment" placeholder=" *Your comment here" name="message"></textarea>
			</div>
			<hr style="border:2px solid green;">
			<div class="row">
				<div class="col-x-12 col-md-6"><input type="submit" value="Submit message" class="btn  btn-success btn-md" name="feedback_btn"></div>
				<div class="col-xs-12 col-md-8" style="color: white;">* Please fill all required form field, thanks!</div>
					</div>
				</form>
			</div>
		</div>
	</div>


<script src="js/jquery.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/stellar.js"></script>
<script src="js/classie.js"></script>
<script src="js/uisearch.js"></script>
<script src="js/jquery.cubeportfolio.min.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>

	
</body>
</html>
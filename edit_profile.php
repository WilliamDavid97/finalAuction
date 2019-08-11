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
  <link href="css/bootstrap.min.css" rel="stylesheet">

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
  
 

	<style>
  
  .navigation{
    background-color: #e0e0e0;
  }

    .well{
      background-color:  #e0e0e0;
    }
    .aa{
      color:  #e0e0e0;
    }

    .row{
    text-align: center;
    
   } 

   .form-horizontal{
    background-color:  #e0e0e0;
   }

   .form-control{
   border-radius: 30px;
    background-color: #e0e0e0;
    color:black;
    font-size: 20px;


   }
   .control-label{
    font-size: 20px;
    color:black;

   }
  
   .btn{
    border-radius: 30px;
    background-color: #e0e0e0;
    color:black;
    font-size: 20px;
    border:1px solid black;  
   }

   #hh{
    border:1px solid black;
    background-color: #ccff90;
   }

  </style>
 
  </head>
  <body  style="background-image: url(images/portfolio/full/item3.png);"><br><br>

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
    </nav>    
  </header><br><br>


    <div class="container">
      <div class="row"><br><br>
        <h1 text-align="center" class="aa"> USER EDIT PROFILE</h1><br><br>


<?php 
/*if (isset($_GET['email'])) {
    $email=$_GET['email'];*/
    $sql="SELECT * FROM user WHERE user_id=10";
    $res1=mysqli_query($conn,$sql);
    confirm_query($res1);
    while ($prorow=mysqli_fetch_assoc($res1)) {
      $user_id=$prorow['user_id'];
      $fullname=$prorow['fullname'];
      $password=$prorow['password'];
      $phNo=$prorow['phNo'];
      $user_email=$prorow['email'];
      $nrc=$prorow['nrc'];
      $address=$prorow['address'];
      echo $dob=$prorow['dob'];
      echo "<br>";
      echo $time=strtotime($prorow['dob'])+(24*3600);
      echo "<br>";
      echo time();
    }
    ?>
    <div class="col-md-12">
          <div class="well well-lg">
            <form action="" class="form-horizontal" method="post"><br>
              <div class="form-group">
                <label for="" class="control-label col-md-2"></label>
                <div class="col-md-9">
                  <input type="text" id="hh" class="form-control" name="user_name" placeholder="UserName" value="<?php echo $fullname; ?>">
                </div>
              </div><br><br>

              <div class="form-group">
                <label for="" class="control-label col-md-2"></label>
                <div class="col-md-9">
                  <input type="text" id="hh" class="form-control" name="user_password" placeholder="Password" value="<?php echo $password; ?>">
                </div>
          </div><br><br>

           <div class="form-group">
                <label for="" class="control-label col-md-2"></label>
                <div class="col-md-9">
                  <input type="text" id="hh" class="form-control" name="phoneNo" placeholder="PhoneNo" value="<?php echo $phNo; ?>">
                </div>
          </div><br><br>

           <div class="form-group">
                <label for="" class="control-label col-md-2"></label>
                <div class="col-md-9">
                  <input type="text" id="hh" class="form-control" name="email" placeholder="Email" value="<?php echo $user_email; ?>">
                </div>
          </div><br><br>

           <div class="form-group">
                <label for="" class="control-label col-md-2"></label>
                <div class="col-md-9">
                  <input type="text" id="hh" class="form-control" name="nrc" placeholder="NRC" value="<?php echo $nrc; ?>">
                </div>
          </div><br><br>

           <div class="form-group">
                <label for="" class="control-label col-md-2"></label>
                <div class="col-md-9">
                  <input type="text" id="hh" class="form-control" name="address" placeholder="Address" value="<?php echo $address; ?>">
                </div>
          </div><br><br>

          <div class="form-group">
                   <div class="col-md-9 col-md-offset-2">
                  <!-- <input type="submit" class="btn " value="Update" name="update_user"> -->
                  <a href="update_profile.php?id=<?php echo $user_id ?>" class="btn btn-success">Edit</a>
                </div>
        </div><br>
      </form>
      </div>
    </div>
    <?php
 //}
 ?>

     
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
   <script src="js/jquery.min.js"></script>
    
  
  
  </body>
</html>
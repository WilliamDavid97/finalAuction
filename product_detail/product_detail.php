<?php include_once "../db.php" ?>
<?php include_once "../NewAdmin/include_admin/functions.php" ?>
<?php session_start(); ?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Auction System(GH)</title>

    <!-- Bootstrap -->

    <!-- Title  -->
    <title>Auction | Product Details</title>
    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style1.css">
   <style>
        .box-count{
            border:15px solid #8be4ef;
            background-color: #8be4ef;
            border-radius: 20px;
        }
    </style>

    </head>
    <body>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="display:contents;">
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
                            <a href="../index.php"><!-- <h1><span>Auc</span>tion</h1> -->
                                <img src="../logo1.png">
                            </a>
                        </div>
                    </div>

                    <div class="navbar-collapse collapse">
                        <div class="menu">
                           <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"><a href="../index.php" class="active">Home</a></li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories</a>
                                <ul class="dropdown-menu">
                                  <?php 
                                    $sql="SELECT * FROM category";
                                    $res=mysqli_query($conn,$sql);
                                    // confirm_query($res);
                                    while ($row=mysqli_fetch_assoc($res)) {
                                        $catid=$row['catid'];
                                        $catname=$row['catname'];
                                        ?>
                                        <li><a href="../product.php?id=<?php echo $catid; ?>"><?php echo $catname; ?></a></li>
                                        <?php
                                    }
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
                            <li role="presentation"><a href="../about.php">About Us</a></li>
                                            <?php 
                                            if (!isset($_SESSION['fullname'])) {
                                                ?>
                                                <li role="presentation"><a href="../login_form.php">Login</a></li>
                                            <li role="presentation"><a href="../register.php">Register</a></li>
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
                                                            <a href="../NewAdmin/index.php"><i class="fa fa-fw fa-user"></i>Admin</a>
                                                        </li>
                                                       <?php 
                                                    }else if ($_SESSION['role']=='subscriber'){
                                                      ?>
                                                      <li>
                                                        <a href="../profile.php"><i class="fa fa-fw fa-user"></i>Profile</a>
                                                    </li>
                                                    <li>
                                                        <a href="../feedback.php"><i class="fa fa-fw fa-envelope"></i> Feedback</a>
                                                    </li>
                                                    <li>
                                                        <a href="../contact.php"><i class="fa fa-fw fa-envelope"></i> Send Product</a>
                                                    </li>
                                                    <li>
                                                        <a href="../mysendproduct.php"><i class="fa fa-fw fa-envelope"></i> My Send Product</a>
                                                    </li>
                                                      <?php
                                                      }
                                                     ?>
                                                    
                                                    
                                                    
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="../NewAdmin/include_admin/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                                    </li>
                                                   
                                                </ul>
                                            </li> 
                                        <?php } ?>  
                                        <li>
                                            <a href="../winner.php">Winner</a>
                                        </li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
<!-- <div class="container">
    <div class="row"> 
    <div class="col-md-1"> 
    </div>
    <div class="col-md-9">  -->  
        <div class="main-content-wrapper d-flex clearfix">
            <!-- Mobile Nav (max width 767px)-->
            <div class="mobile-nav">
                <!-- Navbar Brand -->
                <div class="amado-navbar-brand">
                    <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
                </div>
                <!-- Navbar Toggler -->
                <div class="amado-navbar-toggler">
                    <span></span><span></span><span></span>
                </div>
            </div>
                <!-- Header Area End -->
                <header class="header-area clearfix">
                    <nav class="amado-nav">
                <ul>
                    <?php 
                        $sql="SELECT * FROM category";
                        $res=mysqli_query($conn,$sql);
                        // confirm_query($res);
                        while ($row=mysqli_fetch_assoc($res)) {
                            $catid=$row['catid'];
                            $catname=$row['catname'];
                            ?>
                            <li><a href="../product.php?id=<?php echo $catid; ?>"><?php echo $catname; ?></a></li>
                            <?php
                        }
                        ?>
                    <!-- <li><a href="index.html">Home</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li class="active"><a href="product-details.html">Product</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="checkout.html">Checkout</a></li> -->
                </ul>
            </nav>
                    <!-- <div id="top_x_div" style="width: 900px; height: 500px;"></div> -->
            
        </header>
                <!-- Product Details Area Start -->
            <div class="single-product-area section-padding-100 clearfix">
                <div class="container-fluid">
                   <!--  <div class="row">
                    </div> -->
                    <?php
                        if (isset($_GET['product_id'])) {
                            $product_id=$_GET['product_id'];
                            $sql="SELECT * FROM product WHERE product_id=$product_id";
                            $res=mysqli_query($conn,$sql);
                            confirm_query($res);
                            while ($row=mysqli_fetch_assoc($res)) {
                                $product_id=$row['product_id'];
                                $product_name=$row['product_name'];
                                $price=$row['price'];
                                $product_date=$row['product_date'];
                                $description=$row['description'];
                                $image=$row['image'];
                                $price=$row['price']; 
                                date_default_timezone_set('Asia/Rangoon');
                                $time=(strtotime($row['product_date'])+(24*3600))*10000;
                                $mictime=microtime(time())*10000;                
                            }
                                
                                if ($time<=$mictime) {
                                    $query="SELECT * FROM auction_price WHERE product_id=$product_id  ORDER BY price DESC LIMIT 1";
                                    $timeres=mysqli_query($conn,$query);
                                    
                                        if (mysqli_num_rows($timeres)>0) {
                                        while ($row1=mysqli_fetch_assoc($timeres)) {
                                            $uname=$row1['user_name'];
                                            $pname=$row1['product_name'];
                                            $last_price=$row1['price'];
                                        }
                                        $selectquery="SELECT * FROM auction WHERE product_name='$pname'";
                                        $selectres=mysqli_query($conn,$selectquery);
                                        if (!$selectres) {
                                            $pricequery="INSERT INTO auction(user_name, product_name, last_price) VALUES ('$uname','$pname','$last_price')";
                                            $resu=mysqli_query($conn,$pricequery);
                                            confirm_query($resu);
                                        }
                                    }
                            }
                            // $time =1000*60*60*24;
                            // $end_time=$product_date + $time;
                        }
                    ?>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="single_product_thumb">
                                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <?php 
                                                $noimage=count(unserialize($image));
                                                if ($noimage>4) {
                                                    $noimage=4;
                                                }
                                                for ($i=0; $i <$noimage ; $i++) { 
                                                    $eachimage=unserialize($image)[$i];
                                                    switch ($i) {
                                                        case '0':
                                                            ?>
                                                            <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(../images/<?php echo $eachimage; ?>);">
                                                        </li>
                                                            <?php
                                                            break;

                                                        case '1':
                                                            ?>
                                                            <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(../images/<?php echo $eachimage; ?>);">
                                                    </li>
                                                            <?php
                                                            break;

                                                        case '2':
                                                            ?>
                                                            <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(../images/<?php echo $eachimage; ?>);">
                                            </li>
                                                            <?php
                                                            break;
                                                        
                                                        default:
                                                            ?>
                                                            <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(../images/<?php echo $eachimage; ?>);">
                                            </li>
                                                            <?php
                                                            break;
                                                    }
                                                    ?>
                            
                                                    <?php
                                                }
                                                ?>
                                        </ol>
                                        
                                        <div class="carousel-inner">
                                            <?php 
                                                $noimage=count(unserialize($image));
                                                if ($noimage>4) {
                                                    $noimage=4;
                                                }
                                                for ($i=0; $i <$noimage ; $i++) { 
                                                    $eachimage=unserialize($image)[$i];
                                                    switch ($i) {
                                                        case '0':
                                                            ?>
                                                            <div class="carousel-item active">
                                                                <a class="gallery_img" href="../images/<?php echo $eachimage; ?>">
                                                                    <img class="d-block w-100" src="../images/<?php echo $eachimage; ?>" alt="First slide" style="width: 700px;height: 700px;">
                                                                </a>
                                                            </div>
                                                            <?php
                                                            break;

                                                        case '1':
                                                            ?>
                                                            <div class="carousel-item">
                                                                <a class="gallery_img" href="../images/<?php echo $eachimage; ?>">
                                                                    <img class="d-block w-100" src="../images/<?php echo $eachimage; ?>" alt="Second slide">
                                                                </a>
                                                            </div>
                                                            <?php
                                                            break;

                                                        case '2':
                                                            ?>
                                                            <div class="carousel-item">
                                                                <a class="gallery_img" href="../images/<?php echo $eachimage; ?>">
                                                                    <img class="d-block w-100" src="../images/<?php echo $eachimage; ?>" alt="Third slide">
                                                                </a>
                                                            </div>
                                                            <?php
                                                            break;
                                                        
                                                        default:
                                                            ?>
                                                            <div class="carousel-item">
                                                                <a class="gallery_img" href="../images/<?php echo $eachimage; ?>">
                                                                    <img class="d-block w-100" src="../images/<?php echo $eachimage; ?>" alt="Fourth slide">
                                                                </a>
                                                            </div>
                                                            <?php
                                                            break;
                                                    }
                                                    ?>
                            
                                                    <?php
                                                }
                                             ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="single_product_desc">
                                    <!-- Product Meta Data -->
                                    <div class="product-meta-data">
                                        <!-- <div class="line"></div> -->
                                        <!-- <p class="product-price">$180</p> -->
                                        <a href="product-detail.html">
                                            <h6><?php echo $product_name; ?></h6>
                                        </a><br><br>
                                        <div class="col-lg-12">
                                            <div id="buybox-timer" style="max-width:500px; margin:auto auto;" class="hasCountdown">
                                                <div class="box-count-down">
                                                  <span class="countdown-lastest is-countdown">
                                                  <span class="box-count"><span class="number" id="day"></span><span class="text">Days</span></span>
                                                  <span class="dot">:</span>
                                                  <span class="box-count"><span class="number" id="hr"></span> <span class="text">Hrs</span></span>
                                                  <span class="dot">:</span>
                                                  <span class="box-count"><span class="number" id="min"></span> <span class="text">Mins</span></span>
                                                  <span class="dot">:</span>
                                                  <span class="box-count"><span class="number" id="second"></span> <span class="text">Secs</span></span>
                                                  </span>
                                                    <script>
                                                      // Set the date we're counting down to
                                                      var countDownDate = new Date("<?php echo $product_date ?>").getTime();
                                                      var time = countDownDate + (1000*60*60*24);

                                                      // Update the count down every 1 second
                                                      var x = setInterval(function() {

                                                        // Get today's date and time
                                                        var now = new Date().getTime();

                                                        // Find the distance between now and the count down date
                                                        var distance = time - now;

                                                        // Time calculations for days, hours, minutes and seconds
                                                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                                        // Output the result in an element with id="demo"
                                                        document.getElementById("day").innerHTML = days ;
                                                        document.getElementById("hr").innerHTML = hours ;
                                                        document.getElementById("min").innerHTML = minutes ;
                                                        document.getElementById("second").innerHTML = seconds ;


                                                        // If the count down is over, write some text
                                                        if (distance < 0) {
                                                          clearInterval(x);
                                                          var expire=document.getElementById("buybox-timer").innerHTML = "EXPIRED";
                                                          if(expire){
                                                            document.getElementById("bid_id").disabled=true;
                                                            document.getElementById("bid_amount").disabled=true;
                                                          }
                                                        }
                                                      }, 1000);
                                                    </script>
                                                </div>
                                            </div><br><br>
                                        </div>
                                                <?php
                                                    if (isset($_POST['bid'])) {

                                                        if (isset($_SESSION['email'])) {
                                                            $product_id=$_GET['product_id'];
                                                            $bidamount=$_POST['bidamount'];
                                                            $user_name=$_SESSION['fullname'];
                                                            $product_sql="SELECT * FROM product WHERE product_id=$product_id";
                                                            $product_res=mysqli_query($conn,$product_sql);
                                                            while ($product_row=mysqli_fetch_assoc($product_res)) {
                                                                $product_name=$product_row['product_name'];
                                                            }
                                                            $price_sql="INSERT INTO auction_price(user_name, product_name, price,product_id) VALUES ('$user_name','$product_name','$bidamount','$product_id')";
                                                            $price_res=mysqli_query($conn,$price_sql);
                                                        }else{
                                                            header('Location: ../login_form.php');
                                                        }
                                                        
                                                        
                                                    }
                                                ?>
                                        <div class="col-md-12">
                                            <div class="boxprice">
                                              <div class="row">
                                                <div class="col-6">
                                                    <div class="text-uppercase">Current Bid</div><br>
                                                    <?php
                                                        $product_id=$_GET['product_id'];
                                                        $count="SELECT * FROM auction_price WHERE product_id=$product_id";
                                                        $price_res=mysqli_query($conn,$count);
                                                        $bidcount=mysqli_num_rows($price_res);
                                                        
                                                      ?>
                                                     <p class="avaibility"><i class="fa fa-circle"></i> <?php echo $bidcount; ?>bids</p>
                                                </div>
                                                <div class="col-6 text-right text-danger">
                                                    <div id="buybox-price" style="opacity: 1;">
                                                       <span class="buybox-price-symbol h2 h4">$</span>
                                                       <span class="buybox-price-num h2 h4">
                                                        <?php
                                                        if ($bidcount!=0) {
                                                            $product_id=$_GET['product_id'];
                                                            $large_price="SELECT MAX(price) AS largestPrice FROM auction_price WHERE product_id = '$product_id'";
                                                            $large_result=mysqli_query($conn,$large_price);
                                                            while($row1=mysqli_fetch_assoc($large_result)){
                                                                $largePrice=$row1['largestPrice'];
                                                                echo $largePrice;
                                                            }
                                                        }else{
                                                            echo $price;
                                                        }
                                                        ?>
                                                       </span>
                                                       <span class="buybox-price-currency">USD</span>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="short_overview my-5">
                                            <p><?php echo $description; ?></p>
                                        </div>
                                        <input type="hidden" class="ggtd">
                                        <div class="highbidder" style="">
                                            <div class="card my-4">
                                                
                                                <div class="card-body" >
                                                    <form method="post" action="product_detail.php?product_id=<?php echo $product_id; ?>">
                                                        <div id="bidtype-bid" class="btn-mainbid clearfix my-3">
                                                            <div class="row">
                                                                <div class="col-md-6 ">
                                                                    <div class="input-group">
                                                                    
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">$</span>
                                                                        </div>
                                                                        <input type="text" class="form-control size16 nob" id="bid_amount" name="bidamount" maxlength="10">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 text-xs-right">
                                                                    <input type="submit" name="bid" class="btn-bid btn btn-block btn-primary" style="margin-top: 5px;" value="BID NOW" id="bid_id">
                                                                </div>
                    
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="card-footer text-uppercase text-center font-weight-bold small">
<?php 
if ($bidcount==0) {
    echo "<h3>You are the high for that product</h3>";
}else{
    $email=$_SESSION['email'];
    $user_sql="SELECT * FROM auction_price WHERE price=$largePrice";
    $user_res=mysqli_query($conn,$user_sql);
    while ($user_row=mysqli_fetch_assoc($user_res)) {
        $user_name=$user_row['user_name'];
    }
    $image_sql="SELECT * FROM user WHERE fullname='$user_name'";
    $image_res=mysqli_query($conn,$image_sql);
    while ($image_row=mysqli_fetch_assoc($image_res)) {
        $high_image=$image_row['user_image'];
    }
    ?>
    <span id="bidding_highest_bidder"><a href="http://at9.wlthemes.com/author/demo/"><img src="../images/user_image/<?php echo $high_image; ?>" class="avatar img-fluid userphoto" alt="image"></a><?php echo $user_name ?></span> is the highest bidder.
    <?php
}
?>


                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div><br><br><br>   
                                </div>
                            </div>
                        </div>
                <!-- Product Details Area End -->
                <div id="top_x_div" style="width: 100%; height: 600px;"></div>    




                <!-- //////////////////////////////////////////////////// -->    
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Dollars'],
          <?php 
                $product_id=$_GET['product_id'];
                $select_sql="SELECT * FROM auction_price WHERE product_id=$product_id";
                $select_res=mysqli_query($conn,$select_sql);
                while ($select_row=mysqli_fetch_assoc($select_res)) {
                    $select_price=$select_row['price'];
                    $select_name=$select_row['user_name'];
                    ?>
                    ["<?php echo $select_name; ?>", <?php echo $select_price; ?>],
                    <?php
                }
                 ?>
        ]);

        var options = {
          width: 1000,
          legend: { position: 'none' },
          chart: {
            title: 'Product Auction List',
            subtitle: 'Auction List by percentage' },
          axes: {
            x: {
              0: { side: 'top', label: 'Auctioneer List'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
                <!-- /////////////////////////////////////////////////////// -->   
                </div>
            </div>
        </div>
    <!-- </div>
    <div class="col-md-1"> 
    </div>
    </div>
</div> -->
    </body>


    



    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>
</html>

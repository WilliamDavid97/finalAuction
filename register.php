<?php include_once "db.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="register/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="register/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="register/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register/css/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="login/css/main.css"> -->
<!--===============================================================================================-->
</head>
<body>
<?php 
  if (isset($_POST['login'])) {
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $nrc=$_POST['nrc'];
    $phNo=$_POST['phNo'];
    $password=$_POST['password'];
    $repass=$_POST['repass'];

    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];

    $address=$_POST['address'];
    $dob=$_POST['day'].'-'.$_POST['month'].'-'.$_POST['year'];
    $gender=$_POST['gender'];
    $card=$_POST['card'];
    move_uploaded_file($user_image_tmp,"images/user_image/".$user_image);
    if ($password==$repass) {
      $password=password_hash($password,PASSWORD_BCRYPT, array('cost' =>10));
      $sql="INSERT INTO user(fullname, email, phNo, nrc, password, address, dob, gender, role, cartNo, user_image) VALUES ('$fullname','$email','$phNo','$nrc','$password','$address','$dob','$gender','subscriber','$card','$user_image')";
    $res=mysqli_query($conn,$sql);
    //header('Location: login_form.php');
    }else{
      echo "Incorrect Repeat Password";
    }
    
  }
?>
  
<div class="container">

  <form method="post" action="" enctype="multipart/form-data">
    <div class="row">
      <h4>Account</h4>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Full Name" name="fullname" />
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="email" placeholder="Email Adress" name="email" />
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Phone Number" name="phNo" />
        <div class="input-icon"><i class="fa fa-phone"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="NRC(Eg..1/XXX(N)123456)" name="nrc" />
        <div class="input-icon"><i class="fa fa-credit-card"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="password" placeholder="Password" name="password" />
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="password" placeholder="Repeat Password" name="repass" />
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Enter Your Adress" name="address" />
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <!-- <label for="" class="control-label"><b>Choose Your Image</b></label> -->
      <h5>Choose Your Image</h5>
      <div class="input-group input-group-icon">
        <input type="file" name="user_image" >
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
    </div>
    <div class="row">
      <div class="col-half">
        <h4>Date of Birth</h4>
        <!-- <div class="input-group">
          <div class="col-third">
            <input type="text" placeholder="DD" name="date" />
          </div>
          <div class="col-third">
            <input type="text" placeholder="MMM" name="month" />
          </div>
          <div class="col-third">
            <input type="text" placeholder="YYYY" name="year" />
          </div>
        </div> -->
          <div class="col-third">
             <select name="day" value="day" style="width: 80px;">
             <option value="day">DD</option>
             <script>
             
             for( i=1;i<=31;i++){
              document.write("<option value='"+i+"'>"+i+"</option>");
             }
             </script>
             </select>
          </div>
          <div class="col-third">

             <select name="month" id="" value="month" style="width:80px;">
             <option value="month">MM</option>
             <script>
             var m=new Array("MM","January","February","March","April","May","June","July","August","September","October","November","December");
             for( i=1;i<=m.length-1;i++){
              document.write("<option value='"+i+"'>"+m[i]+"</option>");
             }
             </script>
             </select>
           </div>
          <div class="col-third">
            <select name="year" value="year" style="width: 80px;">
             <option value="month">YY</option>
             <script>
             
             for( i=2000;i>=1900;i--){
              document.write("<option value='"+i+"'>"+i+"</option>");
             }
             </script>
             </select>
           </div>
      </div>
      <div class="col-half">
        <h4>Gender</h4>
        <div class="input-group">
          <input type="radio" name="gender" value="male" id="gender-male"/>
          <label for="gender-male">Male</label>
          <input type="radio" name="gender" value="female" id="gender-female"/>
          <label for="gender-female">Female</label>
        </div>
      </div>
    </div>
    <div class="row">
      <h4>Payment Details</h4>
      <div class="input-group">
        <input type="radio" name="payment-method" value="card" id="payment-method-card" checked="true"/>
        <label for="payment-method-card"><span><i class="fa fa-cc-visa"></i>Credit Card</span></label>
        <input type="radio" name="payment-method" value="paypal" id="payment-method-paypal"/>
        <label for="payment-method-paypal"> <span><i class="fa fa-cc-paypal"></i>Paypal</span></label>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Card Number" name="card" />
        <div class="input-icon"><i class="fa fa-credit-card"></i></div>
      </div>
      <!-- <div class="col-half">
        <div class="input-group input-group-icon">
          <input type="text" placeholder="Card CVC"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
      </div> -->
     <!--  <div class="col-half">
        <div class="input-group">
          <select>
            <option>01 Jan</option>
            <option>02 Jan</option>
          </select>
          <select>
            <option>2015</option>
            <option>2016</option>
          </select>
        </div>
      </div> -->
    </div>
    <?php $txt="";
    $Number=4; ?>
    <div class="row">
      <h4>Terms and Conditions</h4>
      <div class="input-group">
        <input type="checkbox" id="terms" required="" onclick="javaScript: return confirm('1.You must be at least 18 years of age before you connect our auction system and able to form legally binding contracts under our system.\n2. And you can select an item for online bidding, then bidding for this system will continue during in our auction system.\n 3.You must have credict card, or visa card for payment system to bid any products.\n 4. If you want to be an auctioneer , you should place a bid on an online auction item at first.\n 5. If your bid is the highest amount at our auction close , you are the winning bidder and your bid is accepted by seller. When you buy a fix-price item , you must follow a legally binding contract to purchase the product from the auctioneer.\n 6. Notice that you have many chances , that place and confirmed a bid.\n 7. The most importhant thing of u should know is in the case of two bidders choose the same maximum amount on bid , the first bid is reduced by the our auction system.\n 8. Auctioneer hold the rights to add or remove items descriptions at any time without notice.\n 9. You must have at least extra $100 more than you selected item.\n 10. You must read , understand and accept to our Terms of services for bidders. \n 11. If you sent an auction thing to admin , admin will never allow to cancel this auction things.')" />
        <label for="terms">I accept the terms and conditions for signing up to this service, and hereby confirm I have read the privacy policy.</label>
      </div>
      <script type="text/javascript">
      function myfunction(){

        var txt="";
        alert(txt);
        // if (confirm(txt)) {
        //   this.checked=true;
        // }else {
        //   this.checked=false;
        // }
      }

      // $('.check').change(function(){
      //   if ($(this).is(":checked")) {
      //     confirm(txt);
      //   }else{
      //     alert("Hello World");
      //   }
      // });
    </script>
    </div>
    <div class="container-login100-form-btn" >
        <button class="login100-form-btn" name="login" >
            Register
        </button>
    </div>
    <div class="container-login100-form-btn" >
        <a href="index.php">Cancel</a>
    </div>
  </form>
</div>
    
<!--===============================================================================================-->
    <script src="register/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="register/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="register/vendor/bootstrap/js/popper.js"></script>
    <script src="register/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="register/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="register/vendor/daterangepicker/moment.min.js"></script>
    <script src="register/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="register/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="register/js/index.js"></script>

</body>
</html>

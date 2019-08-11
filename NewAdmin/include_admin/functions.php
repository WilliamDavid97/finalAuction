<?php 
	function add_category(){
		global $conn;
		if(isset($_POST['submit'])){
            $cat_name= $_POST['cat_name'];
            $query="INSERT INTO category (catname) VALUES ('$cat_name')";
            $result=mysqli_query($conn,$query);
        }
	}
    function confirm_query($result){
        global $conn;
        if(!$result){
                die("Query Failed".mysqli_error($result));
            }
    }
    function category(){
        global $conn;
        $sql="SELECT * FROM category";
        $res=mysqli_query($conn,$sql);
        // confirm_query($res);
        while ($row=mysqli_fetch_assoc($res)) {
            $catid=$row['catid'];
            $catname=$row['catname'];
            ?>
            <li><a href="product.php?id=<?php echo $catid; ?>"><?php echo $catname; ?></a></li>
            <?php
        }
    }
    function add_product(){
        global $conn;
        $product_name=$_POST['product_name'];
        $product_cat_id=$_POST['product_cat_id'];
        $product_price=$_POST['product_price'];
        $description=$_POST['description'];
        $auction_time=$_POST['auction_time'];

                $imageArray=array();
              //echo $user_id;
              $filename=$_FILES['product_image']['name'];
              $tmpname=$_FILES['product_image']['tmp_name'];
              $filetype=$_FILES['product_image']['type'];
                          for($i=0;$i<=count($tmpname)-1;$i++){
                            $name=addslashes($filename[$i]);
                            array_push($imageArray,$name);
                             move_uploaded_file($tmpname[$i],"../images/".$filename[$i]);
                           }
        //$product_date=date('d-m-y');
        $imageArray=serialize($imageArray);
        $query="INSERT INTO product(product_name, price, description, product_date, image, catid,auction_time)
                 VALUES ('$product_name','$product_price','$description',now(),'$imageArray','$product_cat_id','$auction_time')";
        $result=mysqli_query($conn,$query);
    }
    function add_user(){
        global $conn;
        $user_name=$_POST['user_name'];
        $user_password=$_POST['user_password'];
        $user_password=password_hash($user_password,PASSWORD_BCRYPT, array('cost' =>10));
        $phoneNo=$_POST['phoneNo'];
        $email=$_POST['email'];
        $nrc=$_POST['nrc'];

        $user_image=uniqid()."_".$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];

        $address=$_POST['address'];
        $dob=$_POST['day']."/".$_POST['month']."/".$_POST['year'];
        $gender=$_POST['gender'];
        $role=$_POST['role'];
        $cartNo=$_POST['cartNo'];
        move_uploaded_file($user_image_tmp,"../images/user_image/".$user_image);

        $query="INSERT INTO user(fullname,email, phNo, nrc, password, address, dob, gender, role,cartNo,user_image) VALUES ('$user_name','$email','$phoneNo','$nrc','$user_password','$address','$dob','$gender','$role','$cartNo','$user_image')";
        $result2=mysqli_query($conn,$query);
    }
    

    function select_category(){
        global $conn;
        $query="SELECT * FROM category";
        $result=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($result)) {
            $response[]=array(
            'catid'=>$row['catid'],
            'catname'=>$row['catname']
        );
        }
        return $response;
    }

    function select_user(){
        global $conn;
        $query="SELECT * FROM user";
        $result=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($result)) {
            $response[]=array(
            'user_id'=>$row['user_id'],
            'fullname'=>$row['fullname'],
            'email'=>$row['email'],
            'phNo'=>$row['phNo'],
            'nrc'=>$row['nrc'],
            'password'=>$row['password'],
            'address'=>$row['address'],
            'dob'=>$row['dob'],
            'gender'=>$row['gender'],
            'role'=>$row['role']
        );
        }
        return $response;
    }

    function select_auction(){
        global $conn;
        $query="SELECT * FROM auction";
        $result=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($result)) {
            $response[]=array(
            'auction_id'=>$row['auction_id'],
            'user_id'=>$row['user_id'],
            'product_id'=>$row['product_id'],
            'last_price'=>$row['last_price']
        );
        }
        return $response;
    }

    function select_feedback(){
        global $conn;
        $query="SELECT * FROM feedback";
        $result=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($result)) {
            $response[]=array(
            'feedback_id'=>$row['feedback_id'],
            'message'=>$row['message'],
            'user_id'=>$row['user_id']
        );
        }
        return $response;
    }

    function select_product(){
        global $conn;
        $query="SELECT * FROM product";
        $result=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($result)) {
            $response[]=array(
            'product_id'=>$row['product_id'],
            'product_name'=>$row['product_name'],
            'price'=>$row['price'],
            'description'=>$row['description'],
            'product_date'=>$row['product_date'],
            'image'=>$row['image'],
            'catid'=>$row['catid']
        );
        }
        return $response;
    }

    function delete_category(){
        global $conn;
        $cat_id=$_GET['delete'];
        $query="DELETE FROM category WHERE catid='$cat_id'";
        $result=mysqli_query($conn,$query);
    }

    function delete_feedback(){
        global $conn;
        $feedback_id=$_GET['delete'];
        $query="DELETE FROM feedback WHERE feedback_id=$feedback_id";
        $result=mysqli_query($conn,$query);
    }

    function delete_product(){
        global $conn;
        $product_id=$_GET['delete'];
        $query="DELETE FROM product WHERE product_id=$product_id";
        $result=mysqli_query($conn,$query);
    }

    function delete_user(){
        global $conn;
        $user_id=$_GET['delete'];
        $query="DELETE FROM user WHERE user_id=$user_id";
        $result=mysqli_query($conn,$query);
    }

    function sent_product(){
        global $conn;
        $product_name=$_POST['product_name'];
        $product_cat_id=$_POST['product_cat_id'];
        $product_price=$_POST['product_price'];
        $description=$_POST['description'];
        $auction_time=$_POST['auction_time'];
        $user_name=$_SESSION['fullname'];

                $imageArray=array();
              //echo $user_id;
              $filename=$_FILES['product_image']['name'];
              $tmpname=$_FILES['product_image']['tmp_name'];
              $filetype=$_FILES['product_image']['type'];
                          for($i=0;$i<=count($tmpname)-1;$i++){
                            $name=addslashes($filename[$i]);
                            array_push($imageArray,$name);
                             move_uploaded_file($tmpname[$i],"images/".$filename[$i]);
                           }
        //$product_date=date('d-m-y');
        $imageArray=serialize($imageArray);
        $query="INSERT INTO sent_product(product_name, price, description, product_date, image, catid,auction_time,user_name)
                 VALUES ('$product_name','$product_price','$description',now(),'$imageArray','$product_cat_id','$auction_time','$user_name')";
        $result=mysqli_query($conn,$query);
        header('Localtion:thank_you.php');
    }
?>
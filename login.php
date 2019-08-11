<?php require_once "db.php" ?>
<?php include_once "NewAdmin/include_admin/functions.php"?>
<?php session_start(); ?>
<?php

	if(isset($_POST['login'])){
		$email=$_POST['email'];
		$password=$_POST['password'];

		$email=mysqli_real_escape_string($conn,$email);
		$password=mysqli_real_escape_string($conn,$password);


		$query="SELECT * FROM user WHERE email='$email'";
		$result=mysqli_query($conn,$query);
		confirm_query($result);
		
		while ($row=mysqli_fetch_assoc($result)) {
			$db_id=$row['id'];
			$db_fullname=$row['fullname'];
			$db_email=$row['email'];
			$db_phno=$row['phNo'];
			$db_nrc=$row['nrc'];
			$db_password=$row['password'];
			$db_address=$row['address'];
			$db_dob=$row['dob'];
			$db_gender=$row['gender'];
			$db_role=$row['role'];
		}
		if ($db_email != $email && $db_password != $password) {
			header('Location:index.php');
		}else if ($db_email==$email && $password=password_verify($password,$db_password)) {
			$_SESSION['fullname']=$db_fullname;
			$_SESSION['email']=$db_email;
			$_SESSION['role']=$db_role;
			if ($_SESSION['role']=='admin') {
				header('Location: NewAdmin/index.php');
			}else{
				header('Location: index.php');
			}
			
		}else{
			header('Location: index.php');
		}
	}
?>
<?php
	if(isset($_GET['update'])){
		$user_id=$_GET['update'];
		$query="SELECT * FROM user WHERE user_id=$user_id";
		$result=mysqli_query($conn,$query);
		while ($row=mysqli_fetch_assoc($result)) {

		$user_name=$row['fullname'];
		$user_password=$row['password'];
		$phoneNo=$row['phNo'];
		$email=$row['email'];
		$nrc=$row['nrc'];
		$address=$row['address'];
		$dob=$row['dob'];
		$gender=$row['gender'];
		$role=$row['role'];
		$user_image=$row['user_image'];
 
		}
?>
<form action="" enctype="multipart/form-data" method="post">

	<div class="form-group">
		<label for="" class="control-label">User Name</label>
		<input type="text" class="form-control" name="user_name" value="<?php echo $user_name ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Password</label>
		<input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">PhoneNo</label>
		<input type="text" class="form-control" name="phoneNo" value="<?php echo $phoneNo ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Email</label>
		<input type="email" name="email" class="form-control" value="<?php echo $email ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">NRC</label>
		<input type="text" class="form-control" name="nrc" value="<?php echo $nrc ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Image</label>
		<input type="file" name="user_image">
		<img src="../images/user_image/<?php echo $user_image?>" alt="" class="img-responsive" width="100px;">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Address</label>
		<input type="text" class="form-control" name="address" value="<?php echo $address ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Date Of Birth</label><br>
		<input type="text" class="form-control" name="dob" value="<?php echo $dob ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Gender</label><br>
		<select name="gender" class="form-control">
		<option value="<?php echo $gender ?>"><?php echo $gender ?></option>
			<?php
				if ($gender=='male') {
					echo "<option value='female'>female</option>";
				}else{
					echo "<option value='male'>male</option>";
				}
			?>
		</select>
		<!-- <input type="radio" name="gender" value="male"><label>Male</label>
		<input type="radio" name="gender" value="female"><label>Female</label> -->
	</div>
	<div class="form-group">
		<label for="" class="control-label">Role</label>
		<select name="role" class="form-control">
			<option value="<?php echo $role ?>"><?php echo $role ?></option>
			<?php
				if ($role=='subscriber') {
					echo "<option value='admin'>admin</option>";
				}else{
					echo "<option value='subscriber'>subscriber</option>";	
				}
			?>
		</select>
	</div>
	<div class="form-group">
		<input type="submit" name="update_user" value="Update Users" class="btn btn-primary">
	</div>
</form>
<?php 
	}
?>
<?php 
	if(isset($_POST['update_user'])){
		$user_name=$_POST['user_name'];
		$user_password=$_POST['user_password'];
		$user_password=password_hash($user_password,PASSWORD_BCRYPT, array('cost' =>10));
		$phoneNo=$_POST['phoneNo'];
		$email=$_POST['email'];
		$nrc=$_POST['nrc'];
		$address=$_POST['address'];
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$role=$_POST['role'];

		$user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp,"../images/user_image/".$user_image);

		if(empty($user_image)){
			$query="SELECT * FROM user WHERE user_id=$user_id";
			$result=mysqli_query($conn,$query);
			confirm_query($result);
			while ($row=mysqli_fetch_assoc($result)) {
				$user_image=$row['user_image'];
			}
		}
		
		$query="UPDATE user SET fullname='$user_name',email='$email',phNo='$phoneNo',nrc='$nrc',password='$user_password',address='$address',dob='$dob',gender='$gender',role='subscriber',cartNo='$cartNo',user_image='$user_image' WHERE user_id='$user_id'";
		$result=mysqli_query($conn,$query);
		confirm_query($result);
	}
?>
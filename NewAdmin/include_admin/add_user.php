<?php
	include_once "functions.php";
	if(isset($_POST['create_user'])){
		add_user();
		echo "Create account success "."<a href='user.php'>View Account</a>"; 
	}
?>
<form action="" enctype="multipart/form-data" method="post">

	<div class="form-group">
		<label for="" class="control-label">User Name</label>
		<input type="text" class="form-control" name="user_name">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Password</label>
		<input type="password" class="form-control" name="user_password">
	</div>
	<div class="form-group">
		<label for="" class="control-label">PhoneNo</label>
		<input type="text" class="form-control" name="phoneNo">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Email</label>
		<input type="email" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label for="" class="control-label">NRC</label>
		<input type="text" class="form-control" name="nrc">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Image</label>
		<input type="file" name="user_image">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Address</label>
		<input type="text" class="form-control" name="address">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Date Of Birth</label><br>
		 <select name="day" value="day">
		 <option value="day">Day:</option>
		 <script>
		 
		 for( i=1;i<=31;i++){
		  document.write("<option value='"+i+"'>"+i+"</option>");
		 }
		 </script>
		 </select>
		 <select name="month" id="" value="month">
		 <option value="month">Month:</option>
		 <script>
		 var m=new Array("","January","February","March","April","May","June","July","August","September","October","November","December");
		 for( i=1;i<=m.length-1;i++){
		  document.write("<option value='"+i+"'>"+m[i]+"</option>");
		 }
		 </script>
		 </select>
		<select name="year" value="year">
		 <option value="month">Year:</option>
		 <script>
		 
		 for( i=2019;i>=1990;i--){
		  document.write("<option value='"+i+"'>"+i+"</option>");
		 }
		 </script>
		 </select>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Gender</label><br>
		<input type="radio" name="gender" value="male"><label>Male</label>
		<input type="radio" name="gender" value="female"><label>Female</label>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Role</label>
		<select name="role" class="form-control">
			<option value="">---Select---</option>
			<option value="subscriber">Subscriber</option>
			<option value="admin">admin</option>
		</select>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Card No</label>
		<input type="text" class="form-control" name="cartNo">
	</div>
	<div class="form-group">
		<input type="submit" name="create_user" value="Create Users" class="btn btn-primary">
	</div>
</form>
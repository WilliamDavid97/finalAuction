<?php 

$db['db_host']='localhost';
$db['db_user']='root';
$db['db_pass']='';
$db['db_name']='test';
foreach ($db as $key => $value) {
define(strtoupper($key), $value);
}
$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if(!$conn){
	die("Connection Failed" . mysqli_error($conn));
}

 

// $sql="SELECT * FROM seller_upload WHERE my_project_";
// $res=mysqli_query($conn,$sql);
// while ($row=mysqli_fetch_assoc($res)) {
// 	$image=$row['cover'];

// 	print_r($row['cover']);
// 	echo "<br>";
// 	echo $count = count(unserialize($row['cover']));
// 	echo "<br>";
// 	for ($i=0; $i <$count ; $i++) { 
// 		echo unserialize($row['cover'])[$i];
// 	}
// }

if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	$user_image=uniqid()."_".$_FILES['image']['name'];
    $user_image_tmp=$_FILES['image']['tmp_name'];
	move_uploaded_file($user_image_tmp,"images/test/".$user_image);

	$sql="INSERT INTO user(user_name, image) VALUES ('$name','$user_image')";
	$res=mysqli_query($conn,$sql);
}
 ?>

<form method="post" action="" enctype="multipart/form-data">
	<input type="text" name="name">
	<br>
	<input type="file" name="image">
	<input type="submit" name="submit">


</form>
<?php 
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$query="SELECT * FROM user WHERE user_id=$id";
	$qres=mysqli_query($conn,$query);
	while ($ro=mysqli_fetch_assoc($qres)) {
		unlink("images/test/".$ro['image']);
	}
	$delete="DELETE FROM user WHERE user_id=$id";	
	mysqli_query($conn,$delete);
}

 ?>
<table>
	<thead>
		<td>
			no
		</td>
		<td>
			name
		</td>
		<td>
			image
		</td>

	</thead>
	<tbody>
		<?php 
$select="SELECT * FROM user";
$selres=mysqli_query($conn,$select);
while ($row=mysqli_fetch_assoc($selres)) {
?>
<tr>
			<td>
				<?php echo $row['user_id']; ?>
			</td>
			<td>
				<?php echo $row['user_name']; ?>
			</td>
			<td>
				<img src="images/test/<?php echo $row['image']; ?>" style="width: 100px;height: 100px;">
			</td>
			<td>
				<a href="test.php?id=<?php echo $row['user_id']; ?>">Delete</a>
			</td>
		</tr>
<?php
}
 ?>
		
	</tbody>
</table>
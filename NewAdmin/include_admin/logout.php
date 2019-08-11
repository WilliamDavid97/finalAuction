<?php session_start(); ?>
<?php
	$_SESSION['fullname']=null;
	$_SESSION['email']=null;
	$_SESSION['role']=null;
	header('Location: ../../index.php');
?>
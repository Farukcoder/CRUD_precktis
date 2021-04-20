<?php
session_start();
if (!isset($_SESSION['login'])) {
	header('location:login.php');
}
	$conn = mysqli_connect('localhost','root','','ci_crud');
	$name=$_POST['name'];
	$roll=$_POST['roll'];
	$class=$_POST['class'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];

	$sql = "INSERT INTO `user`(`name`, `roll`, `class`, `address`, `mobile`) VALUES ('$name','$roll','$class','$address','$mobile')";

	if(mysqli_query($conn , $sql)){
		$_SESSION['success']=1;
		header('location:studentlist.php');
	}else{
		$_SESSION['error']=1;
		header('location:index.php');
	}
?>
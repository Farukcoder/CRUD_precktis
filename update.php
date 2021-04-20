<?php
session_start();
if (!isset($_SESSION['login'])) {
	header('location:login.php');
}
	$conn = mysqli_connect('localhost','root','','ci_crud');
	$id = $_GET['id'];
	$name=$_POST['name'];
	$roll=$_POST['roll'];
	$class=$_POST['class'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];

	$sql = "UPDATE `user` SET `name`='$name',`roll`='$roll',`class`='$class',`address`='$address',`mobile`='$mobile' WHERE id = $id";

	if(mysqli_query($conn , $sql)){
		$_SESSION['success']=1;
		header('location:studentlist.php');
	}else{
		$_SESSION['error']=1;
		header('location:edit.php');
	}
?>
<?php
ob_start();
	$username = $_POST['username'];
	$password = $_POST['password'];


$conn= mysqli_connect('localhost','root','','ci_crud');

$sql= "SELECT*FROM `users` WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn , $sql);

$row = mysqli_num_rows($result);

if ($row == 1) {
	session_start();
	$_SESSION['success']=true;
	$_SESSION['login']=true;
	header('location:index.php');
}else {
	session_start();
	$_SESSION['error']= true;
	header('location:login.php');
}

?>
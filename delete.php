<?php
	$id= $_GET['id'];
	$conn = mysqli_connect('localhost','root','','ci_crud');

	$sql = "DELETE FROM `user` WHERE id= $id";
	if(mysqli_query($conn , $sql)){
		header('location:studentlist.php');
	}else {
		echo "no deleted";
	}
?>
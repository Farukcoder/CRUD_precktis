<?php
session_start();
if (!isset($_SESSION['login'])) {
	header('location:login.php');
}
  $id = $_GET['id'];

  $conn = mysqli_connect('localhost','root','','ci_crud');

  $sql="SELECT * FROM user WHERE id= $id";
  $result= mysqli_query($conn, $sql);

  $std = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>crud oparetion</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<a class="btn btn-primary" href="studentlist.php">student list</a>
			</div>
			<div class="col-md-10">
				<h3>student view</h3>
				<hr>
				<table class="table table-success">
					<tr>
						<th>Name :</th>
						<td><?= $std['name']?></td>
					</tr>
					<tr>
						<th>Roll :</th>
						<td><?= $std['roll']?></td>
					</tr>
					<tr>
						<th>Class :</th>
						<td><?= $std['class']?></td>
					</tr>
					<tr>
						<th>Address :</th>
						<td><?= $std['address']?></td>
					</tr>
					<tr>
						<th>Phone :</th>
						<td><?= $std['mobile']?></td>
					</tr>

				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
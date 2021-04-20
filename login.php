<?php
session_start();
if (isset($_SESSION['login'])) {
	header('location:index.php');
}
$conn= mysqli_connect('localhost','root','','ci_crud');

$sql= "SELECT*FROM `users`";
$result = mysqli_query($conn , $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>login system</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h3>Login User</h3>
				<hr>
				<?php
				if (isset($_SESSION['error'])) {?>
					<div class="alert alert-success" role="alert">
						<h4 class="alert-heading">opps!</h4>
						<p>user and password wrong</p>

					</div>
					<?php
				}
				?>
				<form action="confirmlogin.php" method="post">
					<div class="form-group">
						<label for="username">User Name:</label>
						<input type="text" class="form-control" placeholder="User Name" id="username" name="username" required="">
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password" required="">
					</div>
					<div class="form-group form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox"> Remember me
						</label>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form> 
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
unset($_SESSION['error']);
?>
<?php
session_start();

if (!isset($_SESSION['login'])) {
	header('location:login.php');
}
$conn= mysqli_connect('localhost','root','','ci_crud');

$sql= "SELECT*FROM `user`";
$result = mysqli_query($conn , $sql);
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
			<div class="col-md-3">
				<a class="btn btn-primary" href="studentlist.php">Student List</a>
			</div>
			<div class="col-md-3">
				<a class="btn btn-warning" href="logout.php">logout</a>
			</div>
			<div class="col-md-9">
				<h3>Add Student</h3>
				<hr>
				<?php
				if (isset($_SESSION['success'])) {?>
					<div class="alert alert-success" role="alert">
						<h4 class="alert-heading">Wel Done!</h4>
						<p>Successfully Login!!</p>

					</div>
					<?php
				}
				?>
				<form action="insert.php" method="post">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" required="">
						</div>
						<div class="form-group col-md-6">
							<label for="roll">Roll</label>
							<input type="text" class="form-control" id="roll" name="roll" placeholder="Roll" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="class">Class</label>
						<input type="text" class="form-control" id="class" name="class" placeholder="Class" required="">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control" id="address" name="address" placeholder="Address" required="">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="mobile">Mobile</label>
							<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" required="">
						</div>
					</div>
					<button type="submit" class="btn btn-success" name="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
unset($_SESSION['success']);
?>
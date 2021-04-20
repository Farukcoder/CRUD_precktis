<?php
session_start();
if (!isset($_SESSION['login'])) {
	header('location:login.php');
}
  $id = $_GET['id'];

  $conn = mysqli_connect('localhost','root','','ci_crud');

	$sql = "SELECT*FROM user WHERE id = $id";
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
			<div class="col-md-3">
				<a class="btn btn-primary" href="studentlist.php">Student List</a>
			</div>
			<div class="col-md-9">
				<h3>Add Student</h3>
				<hr>
				<?php
				if(isset($_SESSION['success'])){
					?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Wel done!!</strong> update Successfully!!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<?php
				}else{ 
					if (isset($_SESSION['error'])) {?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Opps!!</strong> No update Successfully!!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
					}
				}
				?>
				<form action="Update.php?id=<?= $id ?>" method="post">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" required="" value="<?= $std['name']?>">
						</div>
						<div class="form-group col-md-6">
							<label for="roll">Roll</label>
							<input type="text" class="form-control" id="roll" name="roll" placeholder="Roll" required=""value="<?= $std['roll']?>">
						</div>
					</div>
					<div class="form-group">
						<label for="class">Class</label>
						<input type="text" class="form-control" id="class" name="class" placeholder="Class" required="" value="<?= $std['class']?>">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control" id="address" name="address" placeholder="Address" required="" value="<?= $std['address']?>">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="mobile">Mobile</label>
							<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" required="" value="<?= $std['mobile']?>">
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
	unset($_SESSION['error']);
?>
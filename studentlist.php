
<?php
session_start();
if (!isset($_SESSION['login'])) {
	header('location:login.php');
}
$conn = mysqli_connect('localhost','root','','ci_crud');

$sql = "SELECT*FROM user";
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
			<div class="col-md-2">
				<a class="btn btn-primary" href="index.php">Add Student</a>
			</div>
			<div class="col-md-10">
				<h3>student list</h3>
				<hr>
				<?php
				if(isset($_SESSION['success'])){
					?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Wel done!!</strong> Submit Successfully!!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<?php
					}
					?>
				<table class="table table-striped table-dark">
					<thead>
						<tr>
							<th scope="col">SL</th>
							<th scope="col">Name</th>
							<th scope="col">Roll</th>
							<th scope="col">Class</th>
							<th scope="col">Address</th>
							<th scope="col">mobile</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=1;
						while ($row=mysqli_fetch_assoc($result)) {?>
							<tr>
								<th scope="row"><?= $i++;?></th>
								<td><?= $row['name'];?></td>
								<td><?= $row['roll'];?></td>
								<td><?= $row['class'];?></td>
								<td><?= $row['address'];?></td>
								<td><?= $row['mobile'];?></td>
								<td>
									<a class="btn btn-info" href="view.php?id=<?= $row['id'];?>">View</a>
									<a class="btn btn-warning" href="edit.php?id=<?= $row['id'];?>">Edit</a>
									<a class="btn btn-danger" onclick="return confirm('are you sure delete??')" href="delete.php?id=<?= $row['id'];?>">Delete</a>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
unset($_SESSION['success']);
?>
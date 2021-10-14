<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Manegment</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>

<body>
	<div class="container">
		<br>
		<a href="admin/login.php" class="btn btn-primary" style="float: right;">Admin Login</a><br><br>

		<h3 class="text-center">Welcome to Student Management System</h3><br><br>
		<div class="row justify-content-center">
			<div class="col-6">
				<form action="" method="post">
					<table class="table table-bordered table-striped ">
						<tr>

							<td colspan="2" class="text-center"><label for="student"><b>Student Information</b></label>

							</td>
						</tr>
						<tr>
							<td><label for="choose">Choose Class</label></td>
							<td>
								<select name="choose" id="choose" class="form-control">
									<option value="">Select Option</option>
									<option value="class-1">class 1</option>
									<option value="class-2">class 2</option>
									<option value="class-3">class 3</option>
									<option value="class-4">class 4</option>
									<option value="class-5">class 5</option>
									<option value="class-6">class 6</option>
									<option value="class-7">class 7</option>
									<option value="class-8">class 8</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="roll">Roll</label></td>
							<td><input class="form-control" type="text" name="roll" pattern="[0-9]{6}" placeholder="roll"></td>
						</tr>
						<tr>
							<td colspan="2" class="text-center"><input class="btn btn-info" type="submit" value="Show Info" name="show_info"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<br><br>
		<?php
		require_once('admin/dbcon.php');
		if (isset($_POST['show_info'])) {
			$choose = $_POST['choose'];
			$roll = $_POST['roll'];

			$result = mysqli_query($db, "SELECT * FROM `student_info` WHERE `class` ='$choose' and `roll` ='$roll'");

			if (mysqli_num_rows($result) == 1) {
				$row=mysqli_fetch_assoc($result);
			
		?>
				<div class="row justify-content-center">
					<div class="col-sm-6">
						<table class="table table-bordered table-striped table-hover">
							<tr>
								<td rowspan="5">
									<img src="admin/images/<?php echo $row['photo']; ?>" style="width: 200px; height: 220px;" alt="">

								</td>
								<td>Name</td>
								<td><?php echo ucwords($row['name']); ?></td>
							</tr>
							<tr>

								<td>Roll</td>
								<td><?php echo $row['roll']; ?></td>
							</tr>
							<tr>

								<td>Class</td>
								<td><?php echo ucwords($row['class']); ?></td>
							</tr>
							<tr>

								<td>City</td>
								<td><?php echo ucwords($row['city']); ?></td>
							</tr>
							<tr>

								<td>P.Contact</td>
								<td><?php echo $row['pcontact']; ?></td>
							</tr>
						</table>
					</div>
				</div>

			<?php
			} 
			else 
			{ ?>
				<script>
					alert("No Found Data");
				</script>


		<?php }} ?>








	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

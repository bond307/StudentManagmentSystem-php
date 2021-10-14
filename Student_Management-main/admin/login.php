<?php
include 'dbcon.php';
session_start();

if(isset($_SESSION['user_login'])){
    header('location:adminindex.php');
}

if (isset($_POST['login'])) 
{
	$username = $_POST['username'];
	$password = $_POST['password'];



	$username_check=mysqli_query($db,"SELECT * FROM `user` WHERE `username` ='$username';");

	if(mysqli_num_rows($username_check)>0) 
	{
		$row=mysqli_fetch_assoc($username_check);
		
			if($row['password']==md5($password))
			{
				if($row['status'] =='active')
				{

					$_SESSION['user_login']=$username;
					header('location:adminindex.php');
				}
				else
				{
					$inactive_status="You Status inactive";
				}
			}
		else
		{
			$wrong_password="Your password Wrong";
		}
	}
	else
	{
		$username_not_found="This username not found";
	}

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
	<link rel="stylesheet" href="css/style.css">
		
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>
<body>
	
	<div class="container animate__animated animate__shakeX">
		<br>
		
		<h3 class="text-center">Student Management System</h3><br>

		<h4 class="text-center">Admin Login</h4>
		<div class="row justify-content-center">
			<div class="col-4">
				<form action="" method="post">
					<div>
						<label for="">User Name</label>
						<input type="text" name="username" class="form-control" placeholder="Username" 
						value="<?php if(isset($username)){echo $username; } ?>" required="">
					</div>
					<div>
						<label for="">Password</label>
						<input type="password" name="password" class="form-control" placeholder="password"
						 value="<?php if(isset($password)){echo $password; } ?>" required="">
					</div>
					<div><br>
						<input type="submit" name="login" class="btn btn-outline-info " required="" style="float: right;">
					</div>
				</form>
			</div>
		</div>
		<div><br>
			<?php 
			if(isset($username_not_found))
			{
				echo '<div class="alert alert-danger text-center col-md-4"style="margin-left: 375px;">'.$username_not_found.'</div>';
			}
			?>
			<?php
			if(isset($wrong_password))
			{
				echo '<div class="alert alert-danger text-center col-md-4"style="margin-left: 375px;">'.$wrong_password.'</div>';
			}
			?>
			<?php
			if(isset($inactive_status))
			{
				echo '<div class="alert alert-danger text-center col-md-4"style="margin-left: 375px;">'.$inactive_status.'</div>';
			}
			?>
			
		</div>
		






	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
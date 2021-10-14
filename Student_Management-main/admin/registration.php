<?php
include 'dbcon.php';
session_start();

if (isset($_POST['resigtration'])) 
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$c_password = $_POST['c_password'];


	$photo=explode('.', $_FILES['photo']['name']);
	$photo_ext= end($photo);
	$photo_name= $username.'.'.$photo_ext;
	
	$input_error=array();



	if (empty($name)) 
	{
		$input_error['name']="This Name is required";

	}


	if (empty($email)) 
	{
		$input_error['email']="This email is required";

	}

	if (empty($username)) 
	{
		$input_error['username']="This username is required";

	}

	if (empty($password)) 
	{
		$input_error['password']="This password is required";

	}

	if (empty($c_password)) 
	{
		$input_error['c_password']="This c_password is required";

	}

	if (count($input_error)==0) 
	{
		$email_check= mysqli_query($db,"SELECT * FROM `user` WHERE `email` = '$email';");

		if (mysqli_num_rows($email_check)==0) 
		{
			$username_check= mysqli_query($db,"SELECT * FROM `user` WHERE `username` = '$username';");

			if (mysqli_num_rows($username_check)==0) 
			{
				
				if (strlen($username)>7) 
				{
					if (strlen($password)>7)
					{
						if ($password==$c_password) 
						{
							$password=md5($password);						

							$query="INSERT INTO `user`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";
							$result=mysqli_query($db,$query);
							if (isset($result)) 
							{
								$_SESSION['data_insert']='Data Isert Successful';
								move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
								header('location: registration.php');

							}
							else
							{
								$_SESSION['data_error']="Data Insert Error";
							}



						}
						else
						{
							$password_n_macth="Confirm Password not match";
						}
					}
					else
					{
						$password_l="Password More Then 8 Charecter";
					}
				}
				else
				{
					$username_l="Username More then 8 Charecter";
					
				}
			}
			else
			{
				$username_error="The username already exists";
			}

		}
		else
		{
			$email_error="The email address already exists";
		}
	}





	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Registration</title>
	<link rel="stylesheet" href="../css/style.css" class="css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	


</head>
<body>	
	<div class="container">
		<br>
		
		<h3 class="text-center">Student Management System</h3><br>

		<h4 class="text">User Registration Form</h4>

		<?php if (isset($_SESSION['data_insert'])) 
		{
			echo "<div class='alert alert-success'>".$_SESSION['data_insert']."</div>";
		}
		
		?>
		<?php if (isset($_SESSION['data_error'])) 
		{
			echo "<div class='alert alert-danger'>".$_SESSION['data_error']."</div>";
		}
		
		?>

		
		
		<hr>
		<div class="row">
			<div class="col-md-12">
				<form action="" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<label for="name" class="control-label col-sm-1">Name:</label>
						<div class="col-sm-4">
							<input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name" value="<?php if(isset($name)) { echo "$name"; };  ?>">
						</div>
						<label id="error" ><?php if (isset($input_error['name'])) { echo $input_error['name']; }?>	
						</label>								
					
						</div>

					<div class="form-group">
						<label for="email" class="control-label col-sm-1">Email:</label>
						<div class="col-sm-4">
							<input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email" value="<?php if(isset($email)) { echo "$email"; };  ?>">
						</div>
						<label id="error" ><?php if (isset($input_error['email'])) { echo $input_error['email']; }?></label>
						<label id="error" ><?php if (isset($email_error)) { echo $email_error; }; ?></label>

					</div>

					<div class="form-group">
						<label for="username" class="control-label col-sm-1">Username:</label>
						<div class="col-sm-4">
							<input type="text" id="username" name="username" class="form-control" placeholder="Enter Your username" value="<?php if(isset($username)) { echo "$username"; };  ?>">
						</div>
						<label id="error" ><?php if (isset($input_error['username'])) { echo $input_error['username']; }?>	
						</label>

						<label id="error" ><?php if (isset($username_error)) { echo $username_error; }; ?>	
						</label>
						<label id="error" ><?php if (isset($username_l)) { echo $username_l; }; ?>	
						</label>
					</div>

					<div class="form-group">
						<label for="password" class="control-label col-sm-1">Password:</label>
						<div class="col-sm-4">
							<input type="password" id="password" name="password" class="form-control" placeholder="Enter Your password" value="<?php if(isset($password)) { echo "$password"; };  ?>">
						</div>
						<label id="error" ><?php if (isset($input_error['password'])) { echo $input_error['password']; }?>	
						</label>
						<label id="error" ><?php if (isset($password_l)) { echo $password_l ; }?>	
						</label>
					</div>

					<div class="form-group">
						<label for="c_password" class="control-label col-sm-1">Confirm Password:</label>
						<div class="col-sm-4">
							<input type="password" id="c_password" name="c_password" class="form-control" placeholder="Enter Your Confirm Password" value="<?php if(isset($c_password)) { echo "$c_password"; };  ?>">
						</div>
						<label id="error" ><?php if (isset($input_error['c_password'])) { echo $input_error['c_password']; }?>	
						</label>

						<label id="error" ><?php if (isset($password_n_macth)) { echo $password_n_macth; }?>	
						</label>

						
					</div>

					<div class="form-group">
						<label for="photo" class="control-label col-sm-1">Photo:</label>
						<div class="col-sm-4">
							<input type="file" id="photo" name="photo" >
						</div>

					</div>

					<div class="form-group" style="margin-left: 15px;">
						<input type="submit" value="Resigtration" name="resigtration" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
		<br>
		<br>
		<p>If you have an account ? Then please <a href="login.php">login</a></p>
		<hr>

		<footer>
			<p>Copyright &copy; <?php echo date("Y"); ?> All Right Reserved </p>
		</footer>


		






	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user profile</title>
</head>

<body>
    <h1 class="text-primary"><i class="fas fa-user"></i> User Profile <small class="text-dark">My Profile</small></h1>


    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">
            <a href="adminindex.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> &nbsp; Dashboard &nbsp;</a>
        </li>
        <li class="active"><i class="fas fa-user"></i> Profile</li>
    </ol>
    <?php

    $session_user = $_SESSION['user_login'];

    $db_user = mysqli_query($db, "SELECT * FROM `user` WHERE `username`='$session_user'");

    $row_user = mysqli_fetch_assoc($db_user);

    ?>
    <div class="row">
        <div class="col-sm-6">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>User Id</td>
                        <td><?php echo $row_user['id']; ?></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php echo ucwords($row_user['name']); ?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><?php echo ucwords($row_user['username']); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $row_user['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?php echo ucwords($row_user['status']); ?></td>
                    </tr>
                    <tr>
                        <td>Signup Date</td>
                        <td><?php echo $row_user['datetime']; ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="" class="btn btn-sm btn-primary float-right">Edit Profile</a>
        </div>
        <div class="col-sm-6">
            <a href="">
                <img class="img-thumbnail" style="width: 250px; height: 250px;" src="images/<?php echo $row_user['photo']; ?>" alt="">
            </a>
            <br><br>
            <?php
            if (isset($_POST['upload'])) {
                $photo = explode('.',$_FILES['photo']['name']);
                $photo_ext=end($photo);
                $photo_name = $session_user.'.'.$photo_ext;

                $upload= mysqli_query($db,"UPDATE `user` SET `photo`='$photo_name' WHERE `username`='$session_user'");
               
                if($upload)
                {
                    move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);

                }
            
            }
            ?>
            <form action="" enctype="multipart/form-data" method="POST">
                <label for="photo">Profile Picture</label><br>
                <input type="file" name="photo" id="photo"><br><br>
                <input type="submit" name="upload" value="Upload" class="btn btn-info btn-sm">
            </form>

        </div>
    </div>
</body>

</html>
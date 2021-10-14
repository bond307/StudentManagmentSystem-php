<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
</head>

<body>
    <h1 class="text-primary"><i class="fas fa-users"></i> All Users <small class="text-dark">All Users</small></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            <a href="adminindex.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard&nbsp; </a>
            <i class="fas fa-users"></i> &nbsp; All Users
        </li>
    </ol>
    <div class="table-responsive">
        <table id="data" class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>                                      
                    <th>Photo</th>                  
                </tr>
            </thead>
            <tbody>

                <?php
                $db_info = mysqli_query($db, "SELECT * FROM `user`");

                while ($row = mysqli_fetch_assoc($db_info)) { ?>



                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo ucwords($row['name']); ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['username']; ?></td>                  
                        <td><img style="width: 100px;" src="images/<?php echo $row['photo'] ?>" alt=""></td>   

                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>
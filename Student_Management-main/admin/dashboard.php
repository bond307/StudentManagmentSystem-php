<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 class="text-primary"><i class="fas fa-tachometer-alt"></i> Dashboard <small class="text-dark">Statistics Overview</small></h1>


    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> &nbsp; Dashboard
        </li>
    </ol>

<?php
$count_student= mysqli_query($db,"SELECT * FROM `student_info`");
$total_student= mysqli_num_rows($count_student);

$count_users= mysqli_query($db,"SELECT * FROM `user`");
$total_users= mysqli_num_rows($count_users);
?>

    <div class="row">
        <div class="col-sm-4">
            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header bg-primary text-white">
                    <div class="row">
                        <div class="col xs-3">
                            <i class="fas fa-users fa-5x"></i>
                        </div>
                        <div class="col xs-9">
                            <div class="float-right" style="font-size: 45px;"><?php echo $total_student; ?></div>
                            <div class="clearfix"></div>
                            <div class="float-right">All Student</div>
                        </div>
                    </div>
                </div>
                <a href="adminindex.php?page=all-students">
                    <div class="card-footer">
                        <span class="float-left">All Student</span>
                        <span class="float-right"><i class="fas fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>

            </div>
        </div>

        <div class="col-sm-4">
            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header bg-primary text-white">
                    <div class="row">
                        <div class="col xs-3">
                            <i class="fas fa-users fa-5x"></i>
                        </div>
                        <div class="col xs-9">
                            <div class="float-right" style="font-size: 45px;"><?php echo $total_users; ?></div>
                            <div class="clearfix"></div>
                            <div class="float-right">All Users</div>
                        </div>
                    </div>
                </div>
                <a href="adminindex.php?page=all-user">
                    <div class="card-footer">
                        <span class="float-left">All Users</span>
                        <span class="float-right"><i class="fas fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>

            </div>

        </div>
       
    </div>
    <hr>
    <div class="table-responsive">
        <table id="data" class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>class</th>
                    <th>City</th>
                    <th>P.Contact</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $db_info = mysqli_query($db, "SELECT * FROM `student_info`");

                while ($row = mysqli_fetch_assoc($db_info)) { ?>



                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo ucwords($row['name']); ?></td>
                        <td><?php echo $row['roll']; ?></td>
                        <td><?php echo $row['class']; ?></td>
                        <td><?php echo ucwords($row['city']); ?></td>
                        <td><?php echo $row['pcontact']; ?></td>                     
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title>
</head>

<body>
    <h1 class="text-primary"><i class="fas fa-users"></i> All Student <small class="text-dark">All New Student</small></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            <a href="adminindex.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard&nbsp; </a>
            <i class="fas fa-users"></i> &nbsp; All Student
        </li>
    </ol>
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
                    <th>Action</th>
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
                        <td>
                            <a href="adminindex.php?page=update_student&id=<?php echo base64_encode($row['id']); ?>"class="btn btn-warning btn-xs" > <i class="fas fa-pencil-alt"></i> Edit</a>

                            <a href="delete_student.php?id=<?php echo base64_encode($row['id']); ?>"class="btn btn-danger btn-xs" > <i i class="fas fa-trash-alt"></i> Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>
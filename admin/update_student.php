<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
</head>

<body>
    <h1 class="text-primary"><i class="far fa-edit"></i> Update Student <small class="text-dark">Update Student</small></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            <a href="adminindex.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard&nbsp; </a>
            <a href="adminindex.php?page=all-students"><i class="fas fa-users"></i> All Students&nbsp; </a>
            &nbsp;<i class="far fa-edit"></i> Update Student
        </li>
    </ol>
    <?php
    require_once('dbcon.php');
    $id = base64_decode($_GET["id"]);
    $db_data = mysqli_query($db, "SELECT * FROM `student_info` WHERE id='$id';");
    $db_row=mysqli_fetch_assoc($db_data);
    

    if (isset($_POST['update-Student'])) {
        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $city = $_POST['city'];
        $pcontact = $_POST['pcontact'];
        $class = $_POST['class'];        

        $query = "UPDATE `student_info` SET `name`='$name',`roll`=' $roll',`class`='$class',`city`='$city',`pcontact`='$pcontact' WHERE `id`='$id';";

        $result = mysqli_query($db, $query);
        if($result)
        {
            header('location:adminindex.php?page=all-students');
        }       
    }
    ?>

    <div class="row">
        <div class="col-sm-6">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Student Name</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Enter Your Name" value="<?= $db_row['name'];?>" required>
                </div>
                <div class="form-group">
                    <label for="roll">Student Roll</label>
                    <input class="form-control" type="text" name="roll" id="roll" placeholder="Enter Your roll" pattern="[0-9]{6}" value="<?= $db_row['roll'];?>" required>
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input class="form-control" type="text" name="city" id="city" placeholder="Enter Your city" value="<?= $db_row['city'];?>" required>
                </div>
                <div class="form-group">
                    <label for="pcontact">P Contact</label>
                    <input class="form-control" type="text" name="pcontact" id="pcontact" placeholder="01*******" pattern="01[1|3|4|5|6|7|8|9][0-9]{8}" value="<?= $db_row['pcontact'];?>" required>
                </div>
                <div class="form-group">
                    <label for="class">Class</label>
                    <select name="class" id="class" class="form-control" required>
                        <option value="">Select Your Class</option>
                        <option <?php echo $db_row['class']=='class-1'?'selected=""':'';?> value="class-1">Class 1</option>
                        <option <?php echo $db_row['class']=='class-2'?'selected=""':'';?> value="class-2">Class 2</option>
                        <option <?php echo $db_row['class']=='class-3'?'selected=""':'';?> value="class-3">Class 3</option>
                        <option <?php echo $db_row['class']=='class-4'?'selected=""':'';?> value="class-4">Class 4</option>
                        <option <?php echo $db_row['class']=='class-5'?'selected=""':'';?> value="class-5">Class 5</option>
                        <option <?php echo $db_row['class']=='class-6'?'selected=""':'';?> value="class-6">Class 6</option>
                        <option <?php echo $db_row['class']=='class-7'?'selected=""':'';?> value="class-7">Class 7</option>
                    </select>
                </div>             

                <div class="form-group">
                    <input class="btn btn-primary float-right" value="update Student" type="submit" name="update-Student">
                </div>

            </form>
        </div>

    </div>
</body>

</html>
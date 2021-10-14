<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>

<body>
    <h1 class="text-primary"><i class="fas fa-user-plus"></i> Add Student <small class="text-dark">Add New Student</small></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            <a href="adminindex.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard&nbsp; </a>
            <i class="fas fa-user-plus"></i> &nbsp; Add Student
        </li>
    </ol>
    <?php
    if (isset($_POST['Add-Student'])) {
        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $city = $_POST['city'];
        $pcontact = $_POST['pcontact'];
        $class = $_POST['class'];

        $photo = explode('.', $_FILES['photo']['name']);
        $photo_ex = end($photo);
        $photo_name = $roll . '.' . $photo_ex;

        $query = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES ('$name','$roll','$class','$city','$pcontact','$photo_name')";

        $result = mysqli_query($db, $query);

        if ($result) {
            $success = "Data Insert Success";
            move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $photo_name);
        } 
        else 
        {
            $error = "Data Insert Faild";
        }
    }

    ?>
    <div class="row">
        <?php
        if (isset($success)) {
            echo '<p class="alert alert-success col-sm-6">' . $success . '</p>';
        }
        if (isset($error)) {
            echo '<p class="alert alert-danger col-sm-6">' . $error . '</p>';
        } ?>


    </div>

    <div class="row">
        <div class="col-sm-6">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Student Name</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Enter Your Name" required>
                </div>
                <div class="form-group">
                    <label for="roll">Student Roll</label>
                    <input class="form-control" type="text" name="roll" id="roll" placeholder="Enter Your roll" pattern="[0-9]{6}" required>
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input class="form-control" type="text" name="city" id="city" placeholder="Enter Your city" required>
                </div>
                <div class="form-group">
                    <label for="pcontact">P Contact</label>
                    <input class="form-control" type="text" name="pcontact" id="pcontact" placeholder="01*******" pattern="01[1|3|4|5|6|7|8|9][0-9]{8}" required>
                </div>
                <div class="form-group">
                    <label for="class">Class</label>
                    <select name="class" id="class" class="form-control" required>
                        <option value="">Select Your Class</option>
                        <option value="class-1">Class 1</option>
                        <option value="class-2">Class 2</option>
                        <option value="class-3">Class 3</option>
                        <option value="class-4">Class 4</option>
                        <option value="class-5">Class 5</option>
                        <option value="class-6">Class 6</option>
                        <option value="class-7">Class 7</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="photo">Add Photo</label><br>
                    <input type="file" name="photo" id="photo" required>
                </div>

                <div class="form-group">
                    <input class="btn btn-primary float-right" value="Add Student" type="submit" name="Add-Student">
                </div>

            </form>
        </div>

    </div>
</body>

</html>
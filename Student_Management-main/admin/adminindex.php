<?php
session_start();

if (!isset($_SESSION['user_login'])) {
    header('location:login.php');
}
?>
<?php
require_once('dbcon.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminindex</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">  -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">     
    <link rel="stylesheet" href="../css/style.css">



</head>
<body>
    <div class="topnav">
        <a class="active" href="#home">SMS</a>

        <div class="topnav-right">
            <a href=""><i class="fas fa-user"></i> Welcome : Nayem Uddin</a>           
            <a href="registration.php"><i class="fas fa-user-plus"></i> Add User</a>
            <a href="adminindex.php?page=user-profile"><i class="fas fa-user"></i> Profile</a>
            <a href="logout.php"><i class="fas fa-power-off"></i> Logout</a>
        </div>
    </div><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="list-group">
                    <a href="adminindex.php?page=dashboard" class="list-group-item list-group-item-action active"><i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                    <a href="adminindex.php?page=add-student" class="list-group-item list-group-item-action"><i class="fas fa-user-plus"></i> Add Student</a>
                    <a href="adminindex.php?page=all-students" class="list-group-item list-group-item-action"><i class="fas fa-users"></i> All Student</a>
                    <a href="adminindex.php?page=all-user" class="list-group-item list-group-item-action"><i class="fas fa-users"></i> All User</a>
                </div>

            </div>
            <div class="col-sm-9">
                <div class="content">
                    <?php
                     
                     if(isset($_GET['page'])){
                        $page=$_GET['page'].'.php';
                     }
                     else
                     {
                         $page="dashboard.php";
                     }



                     if(file_exists($page)){
                        require_once($page);
                     }
                     else
                     {
                         require_once('404.php');
                     }
                      
                    ?>
                </div>
            </div>
        </div>

    </div>

    <footer id="footer1">
        <p> Copyright &copy; 2021 Student Managment System.All right reserved </p>
    </footer>






    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#data').DataTable();
        });
    </script>
</body>

</html>
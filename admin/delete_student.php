<?php
require_once('dbcon.php');
$id= base64_decode($_GET["id"]);

$db = mysqli_query($db, "DELETE FROM `student_info` WHERE id='$id';");

header('location:adminindex.php?page=all-students');

?>
<?php
$Id = $_GET['ID'];
$con = mysqli_connect('localhost', 'root', '', 'ecommerce');
mysqli_query($con, "DELETE FROM `userfeedback` WHERE Id = $Id ");
header("location:disp-user-feedback.php");
?>
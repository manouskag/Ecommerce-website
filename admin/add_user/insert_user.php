<?php
if(isset($_POST['submit']))
{
    include 'Config.php';
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $user_number = $_POST['number'];
    $user_password = $_POST['password'];
    //insert product

    mysqli_query($con, "INSERT INTO `tbluser`(`UserName`, `Email`, `Number`,`Password`) 
    VALUES ('$user_name','$user_email','$user_number', '$user_password')");
    header("location:../user.php");
}
?>


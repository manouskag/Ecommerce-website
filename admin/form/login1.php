<!--code for comparing the admin password entered with the one in the database-->
<?php


$con = mysqli_connect('localhost', 'root', '', 'ecommerce');
$A_name = $_POST['username'];
$A_password = $_POST['userpassword'];
$result = mysqli_query($con, " SELECT * FROM `admin` WHERE username = '$A_name' AND userpassword = '$A_password' ");

//starting a session
session_start();




//mysqli_num_row checks if data is present in the database or not
if(mysqli_num_rows($result))
{
    $_SESSION['admin'] = $A_name;


    echo"
        <script>
        alert('Login Successful.');
        window.location.href = '../mystore.php';
        </script>
    ";

}
else{
    echo"
        <script>
        alert('Invalid username/password.');
        window.location.href = 'login.php';
        </script>
    ";
}
?>


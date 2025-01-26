<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <!-- Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
    
</head>

<body>

<?php
include 'mystore.php';
$con = mysqli_connect('localhost', 'root', '', 'ecommerce');
$Record = mysqli_query($con, "SELECT * FROM `tbluser` ");
$row_count = mysqli_num_rows($Record);

?>
<div class="container mt-5">
<div class="row">
<div class="col-md-10">

<table class="table table-secondary table-bordered">
<thead class="text-center">
<th>Sr No</th>
<th>Name</th>
<th>Email</th>
<th>Number</th>
<th>Delete</th>
</thead>

<tbody class="text-center text-danger">
<?php
$i = 0;
while( $row = mysqli_fetch_array($Record) )
{
    echo "
    <tr>
    <td> ";?><?php echo ++$i; ?><?php echo "</td>
    <td>$row[UserName]</td>
    <td>$row[Email]</td>
    <td>$row[Number]</td>
    <td><a href = 'delete.php? ID= $row[Id]' class='btn btn-outline-danger'>Delete</a></td>
    
    </tr>   
    ";
}
?>
</tbody>
</table>
</div>
<div class="col-md-2 pr-5 text-center">
<h3 class="text-danger">Total</h3>
<h1 class="bg-danger text-white"> <?php echo $row_count; ?> </h1>
</div>
</div>
</div>
<br>

<div class="col-md-2 bg-danger text-center m-auto" >
        <a href="add_user/add_user.php" class="text-white text-decoration-none fs-4 fw-bold px-5">ADD USERS</a>
</div>



</body>
</html>


















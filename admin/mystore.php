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
<!--for starting the session-->
<?php
session_start();
if(!$_SESSION['admin'])
{
    header("location: form/login.php");
}
?>

<body>
<nav class="navbar navbar-light bg-dark">
    <div class="container-fluid text-white">
        <a class="navbar-brand text-white"><h1>GoShop</h1></a>
    <span>
    <i class="bi bi-file-person-fill"></i>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
    </svg>
    Hello, <?php echo $_SESSION['admin']; ?>
    <i class="bi bi-arrow-bar-right"></i>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8m-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5"/>
    </svg>
    <a href="form/logout.php" class="text-decoration-none text-white">Logout</a>
    <a href="../user/index.php" class="text-decoration-none text-white">|Userpanel</a>   
    </span>
    </div>
</nav>
        <div>
        <h2 class="text-center">My Store</h2>
        </div>

        <div class="col-md-6 bg-danger text-center m-auto" >
        <a href="product/index.php" class="text-white text-decoration-none fs-4 fw-bold px-5">ADD POST</a>
        <a href="user.php" class="text-white text-decoration-none fs-4 fw-bold px-5">USERS</a>
        <a href="disp-user-feedback.php" class="text-white text-decoration-none fs-4 fw-bold px-5">USER_FEEDBACK</a>

        </div>
</body>
</html>
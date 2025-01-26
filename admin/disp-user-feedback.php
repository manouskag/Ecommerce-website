<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Users Feedback</title>
    <!-- Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
    
</head>

<body>

<?php
include 'mystore.php';
$con = mysqli_connect('localhost', 'root', '', 'ecommerce');
$Record = mysqli_query($con, "SELECT * FROM `userfeedback` ");
$row_count = mysqli_num_rows($Record);
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 mx-auto">

            <?php
            $i = 0;
            while($row = mysqli_fetch_array($Record)) {
            ?>
            <div class="card mb-3">
                <div class="card-header bg-secondary text-white">
                    <h5>User Feedback #<?php echo ++$i; ?></h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">UserName: <?php echo $row['username']; ?></h6>
                    <p class="card-text">Email: <?php echo $row['email']; ?></p>
                    <p class="card-text">Feedback: <?php echo $row['feedback']; ?></p>
                    <p class="card-text"><small class="text-muted">Submitted At: <?php echo $row['submitted_at']; ?></small></p>
                    <a href="delete1.php?ID=<?php echo $row['id']; ?>" class="btn btn-outline-danger">Delete</a>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
    </div>
</div>

</body>
</html>
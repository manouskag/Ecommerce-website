<?php
// Start the session at the beginning
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLOTHING PAGE</title>
    <!-- Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        /* Background Styling */
        body {
            background-color: #f0f0f0;
            background-image: url('path_to_your_image.jpg'); /* Replace with your image path */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-blend-mode: overlay; /* This blends the color with the image */
        }

        /* Adding a gradient overlay */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom right, rgba(255, 255, 255, 0.5), rgba(0, 0, 0, 0.5));
            z-index: -1; /* Ensures the gradient is behind the content */
        }

        .card {
            transition: transform 0.2s;
            background-color: rgba(255, 255, 255, 0.8); /* Light background for cards */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for cards */
        }
        .card:hover {
            transform: scale(1.05);
        }

        h1, .card-title, .card-text {
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); /* Adds a slight shadow to text */
        }
    </style>
</head>

<body>
<?php
      include 'header1.php';
?>
<div class="container-fluid">
    <div class="col-md-12">

    <div class="row">

    <h1 class="text-warning font-monospace text-center my-3">CLOTHING</h1>

    <!-- Search Form -->
    <form action="" method="GET" class="d-flex justify-content-center mb-4">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" style="width: 500px;">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <?php
    include 'Config.php';

    // Check if search query exists
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    // Modify query to include search condition
    $query = "SELECT * FROM tblproduct WHERE PCategory = 'Clothing'";
    if ($search) {
        $query .= " AND PName LIKE '%" . mysqli_real_escape_string($con, $search) . "%'";
    }

    $Record = mysqli_query($con, $query);

    // Loop through the records and display them
    while ($row = mysqli_fetch_array($Record)) {
    echo "  
    <div class='col-md-6 col-lg-4 mt-5 m-auto'>
    <a href='productDetails.php?PName=$row[PName]' style='text-decoration: none; color: inherit;'>
    <div class='card m-auto' style='width: 18rem;'>
        <img src='../admin/product/$row[PImage]' class='card-img-top m-auto' style='width: 170px; height: 250px'>
        <div class='card-body text-center'>
        <h5 class='card-title text-danger fs-4 fw-bold'>$row[PName]</h5>
        <p class='card-text text-danger fs-4 fw-bold '>";?>Rs: <?php echo number_format($row['PPrice'], 2) ?> <?php echo "</p>
        <div class='rating'>
            <i class='fa fa-star' style='color: yellow;'></i>
            <i class='fa fa-star' style='color: yellow;'></i>
            <i class='fa fa-star' style='color: yellow;'></i>
            <i class='fa fa-star' style='color: yellow;'></i>
            <i class='fa fa-star-half-alt' style='color: yellow;'></i>
        </div>
        </div>
    </div>
    </a>
    </div>";
    }
    ?>

    </div>
    </div>
</div>

<?php
include 'footer.php';
?>

</body>
</html>

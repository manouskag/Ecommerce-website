<?php
//session_start();
$count = 0;
if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <!-- Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        /* General styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar styling */
        .navbar {
            background-color: #343a40;
            padding: 1rem 2rem;
        }

        .navbar-brand img {
            height: 100px;
            width: auto;
            transition: transform 0.3s ease-in-out;
        }

        .navbar-brand img:hover {
            transform: scale(1.2);
        }

        .navbar-nav .nav-link {
            color: #ffc107 !important;
            margin-right: 1rem;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .navbar-nav .nav-link:hover {
            color: #fff !important;
        }

        .navbar-nav .cart-count {
            background-color: #ffc107;
            color: #343a40;
            padding: 0.2rem 0.5rem;
            border-radius: 50%;
            margin-left: 0.3rem;
        }

        /* Dropdown styling */
        .dropdown-menu {
            background-color: #343a40;
        }

        .dropdown-item {
            color: #ffc107 !important;
        }

        .dropdown-item:hover {
            background-color: #ffc107;
            color: #343a40 !important;
        }

        /* Category links styling */
        .category-links {
            background-color: #dc3545;
            padding: 1rem 0;
        }

        .category-links a {
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0 1.5rem;
            text-decoration: none;
        }

        .category-links a:hover {
            color: #ffc107;
        }

        /* Mobile view adjustments */
        @media (max-width: 767px) {
            .navbar-brand img {
                height: 40px;
            }

            .navbar-nav .nav-link {
                font-size: 1rem;
                margin-right: 0.5rem;
            }

            .category-links a {
                font-size: 1.2rem;
                margin: 0 1rem;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="canvasDesign.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="bi bi-house-door-fill"></i> HOME
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewCart.php">
                        <i class="bi bi-cart-fill"></i> CART<span class="cart-count">(<?php echo $count; ?>)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <span class="nav-link">
                        <i class="bi bi-person-circle"></i>
                        <?php
                        if (isset($_SESSION['user'])) {
                            echo "Hello, " . $_SESSION['user'];
                            echo "<a href='form/logout.php' class='text-decoration-none text-warning ms-2'>LOGOUT</a>";
                        } else {
                            echo "<a href='form/login.php' class='text-decoration-none text-warning ms-2'>LOGIN</a>";
                        }
                        ?>
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin/mystore.php">ADMIN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="category-links text-center">
    <a href="Electronics.php">ELECTRONICS</a>
    <a href="Clothing.php">CLOTHING</a>
    <a href="Grocery.php">GROCERY</a>
</div>

</body>
</html>





<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Scan the QR code for Razor payment" />
    <title>QR CODE COMPONENT</title>
    
    <link rel="stylesheet" href="./styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f0f0f0;
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

        main {
            background-color: rgba(255, 255, 255, 0.9); /* Slightly white background with some opacity */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 30px auto;
            max-width: 600px; /* Center and constrain width */
            text-align: center; /* Center text and content */
        }

        h2, p {
            color: #28a745; /* Green color for headings and text */
        }

        .navbar {
            width: 100%;
            margin: 0 auto;
        }
        .container-fluid {
            max-width: 100%;
            padding: 0;
        }
        .navbar-nav {
            margin-left: auto;
        }
    </style>
</head>
<body>
    <?php
        include 'header1.php';
    ?>
    <main>
        <img src="QRimg.jpg" alt="QR Code" width="288" height="288">
        <h2>Go Ahead Shop Now</h2>
        <p>Scan The QR Code For Razor Payment</p>
    </main>
    <?php
        include 'footer.php';
    ?>
</body>
</html>

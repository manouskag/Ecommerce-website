<?php
session_start();

$totalAmount = isset($_SESSION['total_amount']) ? $_SESSION['total_amount'] : "0.00";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THANKS PAGE</title>
    <!-- Bootstrap CDN-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include 'header1.php'; ?>
    <style>
        
        body {
            background-color: #f0f0f0;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-blend-mode: overlay; 
        }

        
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom right, rgba(255, 255, 255, 0.5), rgba(0, 0, 0, 0.5));
            z-index: -1; 
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        h1, p {
            color: #28a745; 
        }
    </style>
</head>
<body>

<div class="container">
    <?php 
        
        if (isset($_SESSION['user'])) { 
            //$customerName = $_SESSION['user']['UserName']; 
        //} else { 
            $customerName = "Dear Customer"; 
        }
        
        
        echo "<h1 class='text-center fw-bold mt-5'>Thank You, $customerName!</h1>"; 
        echo "<h1 class='text-center fw-bold'>Payment Successful! &#10003;</h1>";
        echo "<h3 class='text-center fs-4 fw-bold'>Your payment of Rs $totalAmount was successful.</h3>";
        echo "<h3 class='text-center fs-4 fw-bold'>Your order has been received and will be delivered soon.</h3>"; 
    ?>
</div>
<?php
 include 'footer.php';
?>
</body>
</html>

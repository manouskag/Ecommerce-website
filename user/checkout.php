<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHECKOUT PAGE</title>
    <!-- Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        /* Background Styling */
        body {
            background-color: #333333; /* Dark gray background color */
            color: #ffffff; /* White text color for contrast */
            font-family: Arial, sans-serif;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-blend-mode: overlay;
        }

        /* Adding a gradient overlay */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.6), rgba(255, 255, 255, 0.3));
            z-index: -1; /* Ensures the gradient is behind the content */
        }

        section {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff; /* White background for the form */
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #00ff00; /* Green color for headers */
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666666; /* Light gray for labels */
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 16px;
            background-color: #f0f0f0; /* Light background for inputs */
            color: #333333; /* Dark text color in inputs */
        }

        input[type="submit"],
        .btn-razorpay {
            background-color: #00ff00; /* Green background for buttons */
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #228B22; /* Darker green on hover */
        }

        .btn-razorpay {
            background-color: #ffc107;
            color: #ffffff;
        }

        .btn-razorpay:hover {
            background-color: #e0a800;
        }
    </style>
    <?php
        include 'header1.php';
    ?>
    <script>
        function validateForm() {
            let inputs = document.querySelectorAll('input[required]');
            for (let input of inputs) {
                if (input.value.trim() === '') {
                    alert('Please fill out all required fields.');
                    return false;
                }
            }
            return true;
        }
    </script>
</head>
<body>

<section>
    <h1>Checkout</h1>
    <form action="userFeedback.php" method="POST" onsubmit="return validateForm()">
        <h2>Billing Information</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required>

        <label for="zip">Zip Code:</label>
        <input type="text" id="zip" name="zip" required>

        <h2>Payment Information</h2>
        <label for="cardholder">Name on Card:</label>
        <input type="text" id="cardholder" name="cardholder" required>

        <label for="cardnumber">Card Number:</label>
        <input type="text" id="cardnumber" name="cardnumber" required pattern="\d{4}-?\d{4}-?\d{4}-?\d{4}">

        <label for="expmonth">Expiration Month:</label>
        <input type="text" id="expmonth" name="expmonth" required>

        <label for="expyear">Expiration Year:</label>
        <input type="text" id="expyear" name="expyear" required>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required>

        <input type="submit" name="pay" value="PAY">
    </form>
    <form action="indexh.php" method="POST" onsubmit="return validateForm()">
        <button type="submit" class="btn-razorpay">RAZOR PAY</button>
    </form>
</section>

<?php
    include 'footer.php';
?>

</body>
</html>

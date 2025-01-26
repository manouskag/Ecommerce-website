<?php
include 'Config.php';
session_start();

if (isset($_SESSION['user'])) {

  $product_name = isset($_POST['PName']) ? $_POST['PName'] : null;
  $product_price = isset($_POST['PPrice']) ? $_POST['PPrice'] : null;
  $product_quantity = isset($_POST['PQuantity']) ? $_POST['PQuantity'] : null;

  if (isset($_POST['addCart']) && $product_name && $product_price && $product_quantity) {
    $_SESSION['cart'][] = array(
      'productName' => $product_name,
      'productPrice' => $product_price,
      'productQuantity' => $product_quantity
    );
    header("location:viewCart.php");
  }

  // delete product
  if (isset($_POST['remove'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
      if ($value['productName'] === $_POST['item']) {
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        header('location:viewCart.php');
        exit;
      }
    }
  }

  // update product
  if (isset($_POST['update'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
      if ($value['productName'] === $_POST['item']) {
        $_SESSION['cart'][$key] = array(
          'productName' => $product_name,
          'productPrice' => $product_price,
          'productQuantity' => $product_quantity
        );
        header("location:viewCart.php");
        exit;
      }
    }
  }
} else {
  header("location:form/login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewCart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include 'header1.php'; ?>
    <style>
        button {
            margin: auto;
        }
    </style>
</head>
<body>
<div class="container-fluid mt-5">
    <div class="row justify-content-around mt-5">
        <div class="col-sm-12 col-md-6 col-lg-9 mt-5" style="background-color: #d3d3d3; padding: 20px; border-radius: 10px; mt-5">
        <table class="table border border-warning table-hover my-5 text-center">
    <thead class="bg-danger text-white fs-5">
        <tr>
            <th>Serial No.</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Total Price</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $ptotal = 0;
        $total = 0;
        $i = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $ptotal = $value['productPrice'] * $value['productQuantity'];
                $total += $ptotal;
                $i = $key + 1;
                echo "
                    <form action='viewCart.php' method='POST'>
                    <tr>
                        <td>$i</td>
                        <td><input type='hidden' name='PName' value='$value[productName]'>$value[productName]</td>
                        <td><input type='hidden' name='PPrice' value='$value[productPrice]'>$value[productPrice]</td>
                        <td><input type='number' name='PQuantity' value='$value[productQuantity]'></td>
                        <td>$ptotal</td>
                        <td><button name='update' class='btn-warning'>Update</button></td>
                        <td><button name='remove' class='btn-danger'>Delete</button></td>
                        <input type='hidden' name='item' value='$value[productName]'>
                    </tr>
                    </form>
                ";
            }
        }
        ?>
    </tbody>
</table>

        </div>
        <div class="col-lg-3 text-center">
            <h3>TOTAL</h3>
            <h1 class="bg-danger text-white"><?php echo number_format($total, 2); ?></h1>
            
        </div>
    </div>
</div>

<?php

// After calculating the total value
$total = number_format($total, 2); // Already calculated and formatted in your code

// Store the total amount in a session variable
$_SESSION['total_amount'] = $total;

// Redirect to the thanks.php page
//header("Location: thanks.php");
//exit;
?>


<div class="container mt-5">
    <a href="checkout.php"><button type="button">Checkout</button></a>
</div>

<?php include 'footer.php'; ?>
</body>
</html>

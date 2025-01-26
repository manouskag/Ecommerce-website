<?php
// Start the session at the beginning
session_start();
?>

<?php
include 'Config.php';
include 'header1.php';

echo "<div class='container text-center mt-5' style='background-color: #d3d3d3; padding: 20px; border-radius: 10px; margin-bottom: 50px;'>";
if (isset($_GET['PName'])) {
    $PName = mysqli_real_escape_string($con, $_GET['PName']);
    $query = "SELECT * FROM tblproduct WHERE PName = '$PName'";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_array($result)) {
        echo "<h1 class='fw-bold'>Product Details for: " . htmlspecialchars($row['PName']) . "</h1>";
        echo "<p class='fw-bold fs-5'>Price: Rs " . number_format($row['PPrice'], 2) . "</p>";
        echo "<p class='fw-bold fs-5'>Product Quantity: " . htmlspecialchars($row['PQuantity']) . "</p>";
        echo "<p class='fw-bold fs-5'>Product Image: <img src='../admin/product/" . htmlspecialchars($row['PImage']) . "' class='card-img-top m-auto' style='width: 170px; height: 250px'></p>";
        echo "<p class='fw-bold fs-5'>Product Description: " . htmlspecialchars($row['PDes']) . "</p>";
        echo "<p class='fw-bold fs-5'>Product Category: " . htmlspecialchars($row['PCategory']) . "</p>";

        // Add To Cart button form
        echo "<form action='viewCart.php' method='POST' class='mt-4'>";
        echo "<input type='hidden' name='PName' value='" . htmlspecialchars($row['PName']) . "'>";
        echo "<input type='hidden' name='PPrice' value='" . htmlspecialchars($row['PPrice']) . "'>";
        echo "<input type='number' name='PQuantity' min='1' max='" . htmlspecialchars($row['PQuantity']) . "' value='1' class='form-control w-25 m-auto mb-3' placeholder='Quantity'>";
        echo "<input type='submit' name='addCart' class='btn btn-warning text-white w-50' value='Add To Cart'>";
        echo "</form>";
    } else {
        echo "<p class='fw-bold'>Product not found.</p>";
    }
} else {
    echo "<p class='fw-bold'>No product specified.</p>";
}

echo "</div>";

include 'footer.php';
?>

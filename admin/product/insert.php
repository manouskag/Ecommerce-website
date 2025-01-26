<?php
if(isset($_POST['submit']))
{
    include 'Config.php';
    $product_name = $_POST['Pname'];
    $product_price = $_POST['Pprice'];
    $product_quantity = $_POST['Pquantity'];
    $product_image = $_FILES['Pimage'];
    $product_des = $_POST['Pdes'];

    $product_category = $_POST['Pages'];

    $image_loc = $_FILES['Pimage'] ['tmp_name'] ;
    $image_name = $_FILES['Pimage'] ['name'] ;
    $image_des = "Uploadimage/".$image_name;
    move_uploaded_file($image_loc, "Uploadimage/" .$image_name);
    


    //insert product

    mysqli_query($con, "INSERT INTO `tblproduct`(`PName`, `PPrice`, `PQuantity`, `PImage`, `PDes`, `PCategory`) 
    VALUES ('$product_name','$product_price','$product_quantity','$image_des','$product_des','$product_category')");
    header("location:index.php");
}
?>


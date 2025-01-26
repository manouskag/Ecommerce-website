
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>PRODUCT PAGE</title>
    <!--Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<?php

$id = $_GET['ID'];
include 'Config.php';

$Record = mysqli_query($con, " SELECT * FROM `tblproduct` WHERE Id = '$id' ");
$data = mysqli_fetch_array($Record);

?>
    <div class="container">
    <div class="row">
    <div class="col-md-6 m-auto border border-primary mt-4">
    
        <form action="update.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <p class="text-center fw-bold fs-3 text-warning">Product Update:</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Product Name:</label>
                <input type="text" value="<?php echo $data['PName'] ?>"  name="Pname" class="form-control" placeholder="Enter product name">
            </div>
            <div class="mb-3">
                <label class="form-label">Product Price:</label>
                <input type="text" value="<?php echo $data['PPrice'] ?>" name="Pprice" class="form-control" placeholder="Enter product price">
            </div>
            <div class="mb-3">
                <label class="form-label">Product Quantity:</label>
                <input type="text" value="<?php echo $data['PQuantity'] ?>" name="Pquantity" class="form-control" placeholder="Enter product Quantity">
            </div>
            <div class="mb-3">
                <label class="form-label">Add Product Image:</label>
                <input type="file" name="Pimage" class="form-control" ><br>
                <img src= "<?php echo $data['PImage'] ?>" alt="" style="height:100px;">
            </div>
            <div class="mb-3">
                <label class="form-label">Product Description:</label>
                <input type="text" value="<?php echo $data['PDes'] ?>" name="Pdes" class="form-control" placeholder="Enter product Description">
            </div>
            <div class="mb-3">
                <label class="form-label">Select Page Category:</label>
                <select class="form-select" name="Pages">
                    <option value="Home">Home</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Clothing">Clothing</option>
                    <option value="Grocery">Grocery</option>
                </select>
            </div>
            <input type="text" name="id" value="<?php echo $data['Id'] ?>">
            <button name="update" class="bg-danger fs-4 fw-bold my-3 form-control text-white">Update</button>
        </form>
    </div>
    </div>
    </div>
<!--php update code-->
        <?php
        if(isset($_POST['update']))
        {
           $id = $_POST['id'];
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
           include 'Config.php';
           mysqli_query($con, " UPDATE `tblproduct` SET `PName`='$product_name',`PPrice`='$product_price',`PQuantity`='$product_quantity',
                               `PImage`='$image_des', `PDes`='$product_des', `PCategory`='$product_category' WHERE Id = '$id' ");
                          
                                header("location:index.php");

        }
        ?>

</body>
</html>











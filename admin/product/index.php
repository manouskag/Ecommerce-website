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
    
    <div class="container">
    <div class="row">
    <div class="col-md-6 m-auto border border-primary mt-4">
    
        <form action="insert.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <p class="text-center fw-bold fs-3 text-warning">Product Detail:</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Product Name:</label>
                <input type="text" name="Pname" class="form-control" placeholder="Enter product name">
            </div>
            <div class="mb-3">
                <label class="form-label">Product Price:</label>
                <input type="text" name="Pprice" class="form-control" placeholder="Enter product price">
            </div>
            <div class="mb-3">
                <label class="form-label">Product Quantity:</label>
                <input type="text" name="Pquantity" class="form-control" placeholder="Enter product quantity">
            </div>
            <div class="mb-3">
                <label class="form-label">Add Product Image:</label>
                <input type="file" name="Pimage" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label">Product Description:</label>
                <input type="text" name="Pdes" class="form-control" placeholder="Enter product description">
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
            <button name="submit" class="bg-danger fs-4 fw-bold my-3 form-control text-white">Upload</button>
        </form>
    </div>
    </div>
    </div>
<!--fetch data-->

<div class="container">
<div class="row">
<div class="col-md-8 m-auto">



<table class="table border border-warning table-hover border my-5">

<thead class = "bg-dark text-white fs-5 font-monospace text-center">
    <th>Id</th>
    <th>Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Image</th>
    <th>Description</th>
    <th>Category</th>
    <th>Delete</th>
    <th>Update</th>
</thead>
<tbody class="text-center">
<?php
include 'Config.php';
$Record = mysqli_query($con, "SELECT * FROM `tblproduct`");
    while($row = mysqli_fetch_array($Record)) 
    echo "
    <tr>
    <td>$row[Id]</td>
    <td>$row[PName]</td>
    <td>$row[PPrice]</td>
    <td>$row[PQuantity]</td>
    <td><img src = '$row[PImage]' height= '90px' width= '200px'></td>
    <td>$row[PDes]</td>
    <td>$row[PCategory]</td>
    <td><a href ='delete.php? ID= $row[Id]' class = 'btn btn-danger'>Delete</a></td>
    <td><a href = 'update.php? ID= $row[Id]' class = 'btn btn-warning'>Update</a></td>
    
    </tr>

    ";
?>
</tbody>
</table>

</div>
</div>
</div>

</body>
</html>


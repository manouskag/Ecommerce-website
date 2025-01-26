<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
    <style>
        body {
            background-color: #f8d7da; /* Light pink background color */
        }
        .container {
            margin-top: 50px;
        }
        .register-form {
            background-color: #ffffff; /* White background for the form */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            font-size: 1.25rem;
        }
        .btn-register {
            background-color: #007bff; /* Blue background for register button */
            color: #ffc107;
        }
        .btn-already {
            background-color: #ffc107; /* Yellow background for already have account button */
            color: #ffffff;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5 m-auto register-form">
            <p class="text-warning text-center fs-3 fw-bold my-3">USER REGISTER</p>
            <form action="insert.php" method="POST">
                <div class="mb-3">
                    <label for="">User Name:</label>
                    <input type="text" name="name" placeholder="Enter User Name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">User Email:</label>
                    <input type="email" name="email" placeholder="Enter User Email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">User Number:</label>
                    <input type="number" name="number" placeholder="Enter User Number" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">User Password:</label>
                    <input type="password" name="password" placeholder="Enter User Password" class="form-control">
                </div>
                <div class="mb-3">
                    <button name="submit" class="w-100 btn-register fs-4">REGISTER</button>
                </div>
                <div class="mb-3">
                    <button class="w-100 btn-already fs-4">
                        <a href="login.php" class="text-decoration-none text-white">ALREADY HAVE ACCOUNT</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

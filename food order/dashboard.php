<?php
require "config.php";


$pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');

$cookiename = "userId";
if (isset($_COOKIE[$cookiename]) == '' || null) {

    // echo "<script>console.log($_COOKIE[$userId])</script>}";
    header("location:dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <div class="conteiner mt-3">
        <div class="row">
            <div class="col">
                <a href="admin.php" class="btn btn-danger float-end" style="margin-right:10px;">logout</a>
            </div>
        </div>
    </div>

    <div class="container mt-5" style="margin-top: 10px;">
        <div class="row  justify-content-center align-items-center">
            <div class="card " style="width: 500px;background-color: rgb(121, 117, 117);">
                <h1 class="center text-dark mt-5 justify-content-center align-items-center d-flex ">Admin panel</h1>
                <div class="card-body ">
                    <a href="users.php" class="btn text-dark form-control-lg  form-control fw-bold" style="background-color: #f0f0f0;">Users</a>
                </div>
                <div class="card-body ">
                    <a href="add.php" class="btn text-dark form-control-lg  form-control fw-bold" style="background-color: #f0f0f0;">Add products</a>
                </div>
                <div class="card-body ">
                    <a href="menudb.php" class="btn text-dark form-control-lg  form-control fw-bold" style="background-color: #f0f0f0;">Menu items</a>
                </div>
                <div class="card-body ">
                    <a href="orders.php" class="btn text-dark form-control-lg  form-control fw-bold" style="background-color: #f0f0f0;">Order</a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
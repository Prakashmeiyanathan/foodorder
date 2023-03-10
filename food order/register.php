<?php
require "config.php";

if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $duplicate = mysqli_query($connection, "SELECT * FROM register WHERE username = '$username' or email ='$email'");

    if (mysqli_num_rows($duplicate) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location:login.php");
            echo
            " <script>alert('username and email Already has Taken');</script>";
        }
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO register VALUES('','$username','$email','$number','$address','$password','$confirmpassword')";
            mysqli_query($connection, $query);
            echo
            " <script>alert('Registration Successfully');</script>";
        } else {
            echo
            " <script>alert(' Password doesn't match');</script>";
        }
    }
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Restaurant food order and delivery</title>
</head>

<body>
    <div class="container-fluid ">
        <div class="image vh-100 bg-image" style="background-image:url('https://pngimg.com/d/pizza_PNG44049.png');position: relative;">
        </div>

        <div class="bg-text row">
            <div class="col-sm-12 col-md-12">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-12">
                        <div class="card p-5" style="background-color:rgb(0, 0, 0);">
                            <h3 class="text-center text-light">Register</h3>
                            <form class="mt-3" action="" method="post">
                                <div class="mt-3">
                                    <input type="text" name="username" class="form-control form-control-lg  align-items-center" placeholder="Username" style="border-radius:25px;">
                                </div>
                                <div class="mt-4">
                                    <input type="email" name="email" class="form-control form-control-lg  align-items-center" placeholder="Email" style="border-radius:25px;">
                                </div>
                                <div class="mt-4">
                                    <input type="number" name="number" class="form-control form-control-lg  align-items-center" placeholder="Number" style="border-radius:25px;">
                                </div>
                                <div class="mt-4">
                                    <textarea type="address" name="address" class="form-control form-control-lg  align-items-center" placeholder="Address" style="border-radius:25px;"></textarea>
                                </div>
                                <div class="mt-4">
                                    <input type="password" name="password" class="form-control form-control-lg  align-items-center" placeholder="password" style="border-radius:25px;">
                                </div>
                                <div class="mt-4">
                                    <input type="password" name="confirmpassword" class="form-control form-control-lg mb-4  align-items-center" placeholder="confirm password" style="border-radius:25px;">
                                </div>
                                <button class="form-control-lg text-light " type="submit" name="submit" style="border-radius: 25px;background-color: rgb(227, 24, 180);padding: 10px 50px;">Register</button>
                                <div class="d-flex justify-content-center mt-3">
                                    <a href="#" class="text-decoration-none text-light">Already have an account?<a href="login.php"> Login</a></a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
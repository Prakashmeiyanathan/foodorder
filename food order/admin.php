<?php
require "config.php";

if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $result = mysqli_query($connection, "SELECT * FROM adminlogin WHERE email='$email' or pass='$pass'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($pass == $row["pass"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            setcookie("userId", $_SESSION["id"], time() + 3600);

            header("Location:dashboard.php");
        } else {
            echo
            "<script>alert('Wrong password');</script>";
        }
    } else {
        echo
        "<script>alert('User not registered');</script>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Restaurant food order and delivery</title>
</head>

<body>


    <div class="container-fluid ">
        <div class="image vh-100 bg-image" style="background-image:url('https://pngimg.com/d/pizza_PNG44049.png');position: relative;">
        </div>

        <div class="bg-text row">
            <div class="row mt-5 justify-content-center">
                <div class="col-md-4 col-sm-12">
                    <div class="card p-5" style="background-color:rgb(0, 0, 0);">
                        <div class="conteiner">
                            <div class="row">
                                <div class="col">
                                    <a href="index.php"><i class="fa fa-arrow-left float-start text-light" aria-hidden="true" style="font-size:20px;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-center text-light">Admin Login</h3>
                        <form class="mt-5" action="admin.php" method="POST">
                            <div class="">
                                <label class="form-control-lg text-light ">Email:</label>
                                <input type="email" name="email" class="form-control form-control-lg  align-items-center" style="border-radius:25px;">
                            </div>
                            <div class="">
                                <label class="form-control-lg text-light ">Password:</label>
                                <input type="password" name="pass" class="form-control form-control-lg mb-5 align-items-center" style="border-radius:25px;">
                            </div>
                            <button class="form-control-lg text-light " type="submit" name="submit" style="border-radius: 25px;background-color: rgb(227, 24, 180);padding: 10px 50px;">Login</button>
                           
                        </form>
                        <script>
                            var sessionTimeout = 1; //hours
                            var loginDuration = new Date();
                            loginDuration.setTime(loginDuration.getTime() + (sessionTimeout * 60 * 60 * 1000));
                            document.cookie = "CrewCentreSession=Valid; " + loginDuration.toGMTString() + "; path=/";
                            // Put this at the top of index page

                            if (document.cookie.indexOf("CrewCentreSession=Valid") == -1) {
                                location.href = "/menudb.php";
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
<?php include "logincheck.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    <title>Restaurant food order and delivery</title>

</head>

<body>
    <header>

    </header>
    <div class="container-fluid" style="background-color:#303030;height:100vh;">
        <div class="container">
            <div class="row justify-content-center align-items-center ">
                <div class="col-sm-12 col-md-6  ">
                    <div class="row justify-content-center  align-items-center">
                        <div class="col-md-8">

                            <div class="card p-2 mt-5" style="background-color: darkslategray;">
                                <div align="center">
                                    <?php
                                    $remarks = isset($_GET['remarks']) ? $_GET['remarks'] : '';
                                    if ($remarks == null and $remarks == "") {
                                        echo ' <div id="reg-head" class="text-center mt-5 text-light fw-bold mb-4">Register Here</div> ';
                                    }
                                    if ($remarks == 'success') {
                                        echo ' <div id="reg-head" class="headrg">Registration Success</div> ';
                                    }
                                    if ($remarks == 'failed') {
                                        echo ' <div id="reg-head-fail" class="headrg">Registration Failed!, Username exists</div> ';
                                    }
                                    if ($remarks == 'error') {
                                        echo ' <div id="reg-head-fail" class="headrg">Registration Failed! <br> Error: ' . $_GET['value'] . ' </div> ';
                                    }
                                    ?>
                                </div>
                                <form name="reg" action="execute.php" onsubmit="return validateForm()" method="post" id="reg">

                                    <div class="card-body"> 
                                        <div class="mt-3">
                                            <input type="text" name="fname" class="form-control form-control-lg  align-items-center" placeholder="Fist name" style="border-radius:25px;">
                                        </div>
                                        <div class="mt-3">
                                            <input type="text" name="lname" class="form-control form-control-lg  align-items-center" placeholder="last name" style="border-radius:25px;">
                                        </div>
                                        <div class="mt-3">
                                            <input type="text" name="address" class="form-control form-control-lg  align-items-center" placeholder="Email" style="border-radius:25px;">
                                        </div>
                                        <div class="mt-3">
                                            <input type="number" name="number" class="form-control form-control-lg  align-items-center" placeholder="Phone number" style="border-radius:25px;">
                                        </div>
                                        <div class="mt-3">
                                            <textarea type="text" name="details" class="form-control form-control-lg  align-items-center" placeholder="Address" style="border-radius:25px;"></textarea>
                                        </div>
                                        <div class="mt-3">
                                            <input type="text" name="username" class="form-control form-control-lg  align-items-center" placeholder="usename" style="border-radius:25px;">
                                        </div>
                                        <div class="mt-3">
                                            <input type="password" name="password" class="form-control form-control-lg  align-items-center" placeholder="password" style="border-radius:25px;">
                                        </div>
                                            
                                    </div>
                                    <div class="justify-content-center d-flex"><input class="text-center mt-2  form-control-lg" name="submit" type="submit" value="Register" id="st-btn" style="border-radius: 50px;background-color: rgb(227, 24, 180);padding: 10px 50px;"></div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row justify-content-center align-items-center d-flex">
                        <div class="col-md-8">
                            <div class="card p-3" style="background-color:  darkslategray ;">

                                <form action="" method="POST" id="signin" id="reg">
                                    <?php
                                    $remarks = isset($_GET['remark_login']) ? $_GET['remark_login'] : '';
                                    if ($remarks == null and $remarks == "") {
                                        echo ' <div id="reg-head" class=" text-center text-light mt-5">Login Here</div> ';
                                    }
                                    if ($remarks == 'failed') {
                                        echo ' <div id="reg-head-fail" class="headrg">Login Failed!, Invalid Credentials</div> ';
                                    }
                                    ?>
                                    <div class="mt-5" action="admin.php" method="POST">
                                        <div class="">
                                            <label class="form-control-lg  text-light ">user name:</label>
                                            <input type="text" name="username" class="form-control form-control-lg  align-items-center" style="border-radius:25px;">
                                        </div>
                                        <div class="">
                                            <label class="form-control-lg text-light ">Password:</label>
                                            <input type="password" name="password" class="form-control form-control-lg mb-5 align-items-center" style="border-radius:25px;">
                                        </div>
                                        <div class="justify-content-center d-flex"><input class="text-center mt-2  form-control-lg" name="submit" type="submit" value="Login" id="st-btn" style="border-radius: 50px;background-color: rgb(227, 24, 180);padding: 10px 50px;"></div>

                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
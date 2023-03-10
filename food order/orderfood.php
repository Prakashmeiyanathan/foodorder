<?php
include('session.php');
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

    <div class="container">
        <div class="conteiner mt-3">
            <div class="row">
                <div class="col">
                    <a href="home.php"><i class="fa fa-arrow-left float-start text-dark" aria-hidden="true" style="font-size:20px;"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-sm-12 col-md-6">

                <div class="card-body justify-content-center align-items-center d-flex">
                    <img class="" src="scooter-running.gif" width="250px" height="180px">
                </div>
                <div class="text-center">
                    <b class="text-center">super! your order has been confirmed by the restaurant.</b>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-sm-12 col-md-8">
                <div class="card p-5">
                    <div class="">
                        <div class="progress">
                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="">
                            <i class="fa fa-check text-success fw-bold rounded-circle p-1" aria-hidden="true" style="border:1px solid grey;"></i>
                            <h6>Send</h6>
                        </div>
                        <div class="">
                            <i class="fa fa-check text-success fw-bold rounded-circle p-1" aria-hidden="true" style="border:1px solid grey;"></i>
                            <h6>Confiremed</h6>
                        </div>
                        <div class="">
                            <i class="fa fa-check text-success fw-bold rounded-circle p-1" aria-hidden="true" style="border:1px solid grey;"></i>
                            <h6>On the way</h6>
                        </div>
                        <div class="">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            <h6>Delivered</h6>
                        </div>
                    </div>
                    <div class="card text-center p-3">
                        <h5 class="fw-bold">Order summery</h5>
                        <div class="d-flex align-items-center justify-content-center">
                            <b class="">Time :</b>
                            <?php

                            date_default_timezone_set('Asia/Kolkata');
                            $date = date('d-m-y h:i:s');
                            echo $date;
                            ?>
                        </div>
                        <hr>
                        <div class=" justify-conten-center align-items-center ">
                            <h5 class="fw-bold">Delivery details</h5>
                            <div class="">
                                <?php
                                $sql = "SELECT * FROM member where mem_id=$loggedin_id";
                                $result = mysqli_query($connection, $sql);
                                ?>
                                <?php
                                while ($rows = mysqli_fetch_array($result)) {
                                ?>
                                    <div class=" col-md-12 mt-4 mb-3 ">
                                        <div class="text-dark">
                                            <form action="" method="POST" id="signin" id="reg">

                                                <table class="mt-3" border="0" align="center" cellpadding="2" cellspacing="0">

                                                    <tr id="lg-1">
                                                        <td class="tl-1">
                                                            <div class="fw-bold" align="center" id="tb-name">Username:</div>
                                                        </td>
                                                        <td class="tl-4"><?php echo $rows['username']; ?></td>
                                                    </tr>

                                                    <tr id="lg-1">
                                                        <td class="tl-1">
                                                            <div class="fw-bold" align="left" id="tb-name">Address:</div>
                                                        </td>
                                                        <td class="tl-4"><?php echo $rows['details']; ?> </td>
                                                    </tr>
                                                    <tr id="lg-1">
                                                        <td class="tl-1">
                                                            <div class="fw-bold" align="left" id="tb-name">Phone number:</div>
                                                        </td>
                                                        <td class="tl-4"><?php echo $rows['number']; ?></td>
                                                    </tr>

                                                </table>

                                            </form>

                                        </div>
                                    </div>

                                <?php
                                    // close while loop 
                                }
                                ?>
                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>
    </div>





</body>

</html>
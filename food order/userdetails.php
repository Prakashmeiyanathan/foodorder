<?php
include('session.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type' />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    <title>Restaurant food order and delivery</title>

</head>

<body>

    <div class="container">
        <div class="conteiner">
            <div class="row mt-3">
                <div class="col">
                    <a href="home.php"><i class="fa fa-arrow-left float-start text-dark" aria-hidden="true" style="font-size:20px;"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center d-flex">
            <?php
            $sql = "SELECT * FROM member where mem_id=$loggedin_id";
            $result = mysqli_query($connection, $sql);
            ?>
            <?php
            while ($rows = mysqli_fetch_array($result)) {
            ?>
                <div class="col-sm-12 col-md-6 mt-5 mb-3 ">
                    <div class="card p-3  text-light" style="background-color:#c9a4de;">
                        <form action="" method="POST" id="signin" id="reg">
                            <h1 class="text-center " style="color:#2b381e;">Welcome <?php echo $loggedin_session; ?>,</h1>

                            <h6 class=" text-center fw-bold mt-5">Your Profile</h6>
                            <table class="mt-3" border="0" align="center" cellpadding="2" cellspacing="0">
                                <tr id="lg-1">
                                    <td class="tl-1">
                                        <div class="fw-bold" align="left" id="tb-name">Reg id:</div>
                                    </td>
                                    <td class="tl-4"><?php echo $rows['mem_id']; ?></td>
                                </tr>
                                <tr id="lg-1">
                                    <td class="tl-1">
                                        <div class="fw-bold" align="left" id="tb-name">Name:</div>
                                    </td>
                                    <td class="tl-4"><?php echo $rows['fname']; ?> <?php echo $rows['lname']; ?></td>
                                </tr>
                                <tr id="lg-1">
                                    <td class="tl-1">
                                        <div class="fw-bold" align="left" id="tb-name">phone number:</div>
                                    </td>
                                    <td class="tl-4"><?php echo $rows['number']; ?> </td>
                                </tr>
                                <tr id="lg-1">
                                    <td class="tl-1">
                                        <div class="fw-bold" align="left" id="tb-name">Address:</div>
                                    </td>
                                    <td class="tl-4"><?php echo $rows['details']; ?> </td>
                                </tr>
                                <tr id="lg-1">
                                    <td class="tl-1">
                                        <div class="fw-bold" align="left" id="tb-name">Email id:</div>
                                    </td>
                                    <td class="tl-4"><?php echo $rows['address']; ?></td>
                                </tr>
                            </table>

                        </form>
                        <div class="p-3 mt-5">
                            <div class="justify-content-between align-items-center d-flex">
                                <div><a class="btn btn-danger text-light" href="logout.php" id="st-btn">Sign Out</a></div>
                                <div id="st"><a class="btn btn-danger text-light" href="deleteac.php" id="st-btn">Delete Account</a></div>
                            </div>
                        </div>
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
    </br>

</body>

</html>
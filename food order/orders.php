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


    <div class="container-fluid">

        <div class="row justify-content-center mt-5">
            <div class="col-sm-12 col-md-10">
                <div class="card p-5">


                    <table class="table table-dark">
                        <thead class="">
                            <tr>
                                <th>User name</th>
                                <th>Phone number</th>
                                <th>Address</th>
                                <th>Date & Time</th>
                                <th>Item name</th>
                                <th>Image</th>
                                <th>price</th>
                                <th>Total</th>
                                <th>Payment method</th>
                            </tr>
                        </thead>
                        <?php


                        ?>
                        <?php
                        $sql = "SELECT * FROM member where mem_id=$loggedin_id";
                        $result = mysqli_query($connection, $sql);
                        ?>
                        <?php
                        while ($rows = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td class="tl-4"><?php echo $rows['username']; ?></td>
                                <td class="tl-4"><?php echo $rows['number']; ?></td>
                                <td class="tl-4"><?php echo $rows['details']; ?></td>
                                <td class="tl-4"><?php date_default_timezone_set('Asia/Kolkata');
                                                    $date = date('d-m-y h:i:s');
                                                    echo $date; ?></td>
                                <td class="tl-4"><?php echo $rows['details']; ?></td>
                                <td class="tl-4"><?php echo $rows['details']; ?></td>
                                <td class="tl-4"><?php echo $rows['details']; ?></td>
                                <td class="tl-4"><?php echo $rows['details']; ?></td>
                                <td class="tl-4"><?php echo $rows['details']; ?></td>


                            </tr>

                    </table>
                <?php
                        }
                ?>
                </div>
            </div>
        </div>
</body>

</html>
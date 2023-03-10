<?php

include('config.php');

$fetchData = fetch_data($connection);

// fetch query
function fetch_data($connection)
{
    $query = "SELECT * from tblproduct ORDER BY id DESC";
    $exec = mysqli_query($connection, $query);
    if (mysqli_num_rows($exec) > 0) {

        $row = mysqli_fetch_all($exec, MYSQLI_ASSOC);
        return $row;
    } else {
        return $row = []; 
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

    <div class="conteiner mt-3">
        <div class="row">
            <div class="col">
                <a href="dashboard.php"><i class="fa fa-arrow-left float-start text-dark" aria-hidden="true" style="font-size:20px;margin-left:30px;"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 30px;">
        <div class="row  ">
            <table class="table table-bordered" style="border: 2px solid black">
                <thead class="thead-dark" style="background-color:	#808080;">
                    <tr style="border: 2px black">
                        <th class="text-center fw-bold">Item No</th>
                        <th class="text-center fw-bold">Name</th>
                        <th class="text-center fw-bold">Price</th>
                        <th class="text-center fw-bold">Image</th>
                        <th class="text-center fw-bold">Pcode</th>
                        <th class="text-center fw-bold">Edit</th>
                        <th class="text-center fw-bold">Delete</th>

                    </tr>

                </thead>

                <?php
                if (count($fetchData) > 0)  {
                    $sn = 1;
                    foreach ($fetchData as $data) {
                ?>
                        <tr>
                            <td class="text-center fw-bold">
                                <?php echo $sn; ?>
                            </td>
                            <td class="text-center fw-bold">
                                <?php echo $data['name']; ?>
                            </td>


                            <td class="text-center fw-bold">
                                <?php echo $data['price']; ?>
                            </td>
                            <td class="text-center fw-bold"><img src="<?= $data['image'] ?>" class="" height="100px" width="100px"></td>
                            <td class="text-center fw-bold">
                                <?php echo $data['code']; ?>
                            </td>
                            <td class="text-center fw-bold"><a class="btn btn-success" href="update.php?edit=<?php echo $data['id']; ?>">Edit</a></td>
                            <td class="text-center fw-bold"><a class="btn btn-danger" href="delete.php?delete=<?php echo $data['id']; ?>">Delete</a></td>
                        </tr>
                    <?php
                        $sn++;
                    }
                } else {

                    ?>
                    <tr>
                        <td class="mt-5 " colspan="7">No Data Found</td>
                    </tr>

                <?php
                }
                ?>

            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
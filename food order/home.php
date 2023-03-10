<?php
session_start();
require_once("config.php");
//code for Cart 
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
            //code for adding product in cart
        case "add":
            if (!empty($_POST["quantity"])) {
                $pid = $_GET["pid"];
                $result = mysqli_query($connection, "SELECT * FROM tblproduct WHERE id='$pid'");

                while ($productByCode = mysqli_fetch_array($result)) {
                    $itemArray = array($productByCode["code"] => array(
                        'name' => $productByCode["name"], 'code' => $productByCode["code"],
                        'quantity' => $_POST["quantity"], 'price' => $productByCode["price"], 'image' => $productByCode["image"]
                    ));
                    if (!empty($_SESSION["cart_item"])) {
                        if (in_array($productByCode["code"], array_keys($_SESSION["cart_item"]))) {
                            foreach ($_SESSION["cart_item"] as $k => $v) {
                                if ($productByCode["code"] == $k) {
                                    if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                }
                            }
                        } else {
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                        }
                    } else {
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
            }
            break;

            // code for removing product from cart
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
            // code for if cart is empty
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>
<?php
include('session.php');

?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <link href="style.css" rel="stylesheet">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    <title>www.prakash.com</title>
</head>

<body>

    <div class="container-fluid p-3" style="background-color: #490d4a;">
        <div class="row ">
            <div class="col-12 col-md-12">
                <nav class="navbar-brand">
                    <div class="float-start">
                        <img src="pizza1.png" class="" style="width:100px;height:50px;">
                    </div>
                    <div class="float-end">
                        <a href="userdetails.php" class="btn btn-success"><i class="fa fa-user-o fw-bold" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $loggedin_session; ?></a>

                        <a href="cart.php" class="btn btn-warning text-light">cart<i class="fa fa-cart-plus" aria-hidden="true"></i><span id="cart-item" class="badge badge-danger"></span></a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #8b798f;">
        <div class="row p-3">
            <div class="col">
                <a href="index.php"><i class="fa fa-arrow-left float-start text-dark" aria-hidden="true" style="font-size:20px;"></i>
                </a>
            </div>
            <div class="row">
                <h1 class="text-center fw-bold" style="color:#52334a;">Order Products</h1>
                <?php
                $product = mysqli_query($connection, "SELECT * FROM tblproduct ORDER BY id ASC");
                if (!empty($product)) {
                    while ($row = mysqli_fetch_array($product)) {
                ?>
                        <div class="col-sm-12 col-md-3  mt-4 mb-4">
                            <div class="card p-2" style="border-radius: 30px;background-color:#595f69;">
                                <form method="post" action="home.php?action=add&pid=<?php echo $row["id"]; ?>">
                                    <div class="product-image "><img class="" src="<?php echo $row["image"]; ?>" style="width:325px;height:200px;border-radius:30px;"></div>
                                    <div class="product-tile-footer m-3">
                                        <div class="product-title mt-3  fw-bold"><?php echo $row["name"]; ?></div>
                                        <div class="product-price mt-2 fw-bold"><?php echo "$" . $row["price"]; ?></div>
                                        <div class="cart-action mt-2"><input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                                            <input onClick='swal()' type="submit" value="Add to Cart" class="btn btn-danger float-end" />
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    <?php
                    }

                    ?>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div i d="product-grid">


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script>
            $("button").click(function() {
                swal("Success Message Title", "Well done, you pressed a button", "success")
            });
        </script>
</body>

</html>
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
					$itemArray = array($productByCode["code"] => array('name' => $productByCode["name"], 'code' => $productByCode["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode["price"], 'image' => $productByCode["image"]));
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
			//	code for if cart is empty
		case "empty":
			unset($_SESSION["cart_item"]);
			break;
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="author" content="Sahil Kumar">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
	<link href="style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<title>Cart</title>

</head>

<body>
	<div class="container-fluid" style="background-color:#40094a; height:100vh;">
		<div id="shopping-cart ">

			<div class="justify-content-between d-flex p-3 bg-secondary">
				<h3 class="txt-heading ">Shopping Cart</h3>
				<a class="btn btn-danger " id="btnEmpty" href="home.php?action=empty">Empty Cart</a>

			</div>
		</div>
		<?php
		if (isset($_SESSION["cart_item"])) {
			$total_quantity = 0;
			$total_price = 0;
		?>
			<div class="container" style="margin-top: 120px">
			<div class="row">
				<div class="coil-sm-12 col-md-12">

			
				<table class="table table-bordered " cellpadding="10" cellspacing="1">
					<tbody class="thead-dark ">
						<tr>
							<th style="text-align:left;">Image</th>
							<th style="text-align:left;">Name</th>
							<th style="text-align:left;">Code</th>
							<th style="text-align:right;" width="5%">Quantity</th>
							<th style="text-align:right;" width="10%">Unit Price</th>
							<th style="text-align:right;" width="10%">Price</th>
							<th style="text-align:center;" width="5%">Remove</th>
						</tr>
						<?php
						foreach ($_SESSION["cart_item"] as $item) {
							$item_price = $item["quantity"] * $item["price"];
						?>
							<tr class="text-light">
								<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" style="width:100px;" /></td>
								<td><?php echo $item["name"]; ?></td>
								<td><?php echo $item["code"]; ?></td>
								<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
								<td style="text-align:right;"><?php echo "$ " . $item["price"]; ?></td>
								<td style="text-align:right;"><?php echo "$ " . number_format($item_price, 2); ?></td>
								<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btn  btnRemoveAction"><i class="fa fa-trash text-light" aria-hidden="true" alt="Remove Item"></i></a></td>
							</tr>
						<?php
							$total_quantity += $item["quantity"];
							$total_price += ($item["price"] * $item["quantity"]);
						}
						?>
						<tr class="text-light">
							<td colspan="3" align="right">Total:</td>
							<td align="right"><?php echo $total_quantity; ?></td>
							<td align="right" colspan="2"><strong><?php echo "$ " . number_format($total_price, 2); ?></strong></td>
							<td></td>
						</tr>
						<tr class="bordered-less justify-content-between align-items-center">
							<td><a href="home.php" class="btn btn-success form-control float-start"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Continue shoping</a></td>
							<td><a href="checkout.php" colspan="1" class="btn btn-danger form-control"><i class="fa fa-credit-card-alt" aria-hidden="true"></i>&nbsp;
									Check out</a></td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>

			</div>
		<?php
		} else {
		?>
			<div class="no-records">Your Cart is Empty</div>
		<?php
		}
		?>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
</body>

</html>
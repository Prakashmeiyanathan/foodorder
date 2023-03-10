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
  <div class="container-fluid mt-3">
    <div class="conteiner">
      <div class="row">
        <div class="col">
          <a href="cart.php"><i class="fa fa-arrow-left float-start text-dark" aria-hidden="true" style="font-size:20px;"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <?php
      $sql = "SELECT * FROM member where mem_id=$loggedin_id";
      $result = mysqli_query($connection, $sql);
      ?>
      <?php
      while ($rows = mysqli_fetch_array($result)) {
      ?>
        <div class="col-sm-12 col-md-5 mb-3">
          <div class="card p-3  text-light" style="background-color:#423e42;">
            <form action="" method="POST" id="signin" id="reg">
              <h6 class=" text-center fw-bold ">Account details</h6>
              <hr>
              <table class="mt-3 " border="0" align="center" cellpadding="2" cellspacing="0">
                <tr id="lg-1">
                  <td class="tl-1">
                    <div class="fw-bold" align="left" id="tb-name">Username:</div>
                  </td>
                  <td class="form-control mt-2"><?php echo $rows['username']; ?></td>
                </tr>
                <tr id="lg-1">
                  <td class="tl-1">
                    <div class="fw-bold" align="left" id="tb-name">Name:</div>
                  </td>
                  <td class="form-control mt-2"><?php echo $rows['fname']; ?> <?php echo $rows['lname']; ?></td>
                </tr>
                <tr>
                  <td class="tl-1 mt-2">
                    <div class="fw-bold" align="left" id="tb-name">Phone number:</div>
                  </td>
                  <td class="form-control mt-2"><?php echo $rows['number']; ?></td>
                </tr>
                <tr>
                  <td class="tl-1 mt-2">
                    <div class="fw-bold" align="left" id="tb-name">Email id:</div>
                  </td>
                  <td class="form-control mt-2"><?php echo $rows['address']; ?></td>
                </tr>
                <tr>
                  <td class="tl-1 mt-2">
                    <div class="fw-bold" align="left" id="tb-name">Address:</div>
                  </td>
                  <td class="form-control mt-2"><?php echo $rows['details']; ?></td>
                </tr>
              </table>
            </form>


            <div class="container-fluid mt-4">

              <?php
              if (isset($_SESSION["cart_item"])) {
                $total_quantity = 0;
                $total_price = 0;
              ?>
                <div class="container">

                  <table class="table table-border text-light" cellpadding="10" cellspacing="1">
                    <tbody class="thead-dark">
                      <tr>
                        <th style="text-align:left;">Name</th>
                        <th style="text-align:right;" width="10%">Price</th>

                      </tr>
                      <?php
                      foreach ($_SESSION["cart_item"] as $item) {
                        $item_price = $item["quantity"] * $item["price"];

                      ?>
                        <tr>
                          <td><?php echo $item["name"]; ?></td>
                          <td style="text-align:right;"><?php echo "$ " . number_format($item_price, 2); ?></td>
                        </tr>
                      <?php
                        $total_quantity += $item["quantity"];
                        $total_price += ($item["price"] * $item["quantity"]);
                      }
                      ?>
                      <tr>
                        <td class="fw-bold" align="left">Total:</td>
                        <td class="d-flex" align="left"><strong><?php echo "$ " . number_format($total_price, 2); ?></strong></td>
                        <td></td>
                      </tr>
                      <tr class="bordered-less justify-content-between align-items-center">

                      </tr>

                    </tbody>
                  </table>
                  <div class="form-group">
                    <select name="pmode" class="form-control">
                      <option class="fw-bold" value="">-Select Payment Mode-</option>
                      <option value="cod">Cash On Delivery</option>
                      <option value="netbanking">Net Banking</option>
                      <option value="cards">Debit/Credit Card</option>
                    </select>
                  </div>
                  <div class="mt-3">
                    <td><a href="orderfood.php" colspan="1" class="btn btn-danger form-control"><i class="fa fa-credit-card-alt" aria-hidden="true"></i>&nbsp;
                        Place Order</a></td>
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
          </div>
        </div>

      <?php
        // close while loop 
      }
      ?>
    </div>
  </div>
  </br>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>



</body>

</html>
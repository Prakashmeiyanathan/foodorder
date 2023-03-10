<?php
include('config.php');
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $editData = edit_data($connection, $id);
}
if (isset($_POST['update']) && isset($_GET['edit'])) {
  $id = $_GET['edit'];
  update_data($connection, $id);
}
function edit_data($connection, $id)
{
  $query = "SELECT * FROM tblproduct WHERE id= $id";
  $exec = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($exec);
  return $row;
}
// update data query
function update_data($connection, $id)
{
  $name = ($_POST['name']);
  $code = ($_POST['code']);
  $price = ($_POST['price']);
  $image = ($_POST['image']);
  $query = "UPDATE tblproduct 
            SET name='$name',
                code='$code',
                price= '$price',
                image='$image' WHERE id=$id";
  $exec = mysqli_query($connection, $query);

  if ($exec) {
    header('location:menudb.php');
  } else {
    $msg = "Error: " . $query . "<br>" . mysqli_error($connection);
    echo $msg;
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <title>Update</title>
  <style>
    body {
      overflow-x: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    * {
      box-sizing: border-box;
    }

    .user-detail form {
      height: 100vh;
      border: 2px solid #f1f1f1;
      padding: 16px;
      background-color: white;
    }

    .user-detail {
      width: 30%;
      float: left;
    }

    input {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    button[type=submit] {
      background-color: #434140;
      color: #ffffff;
      padding: 10px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
      font-size: 20px;
    }

    label {
      font-size: 18px;
      ;
    }

    button[type=submit]:hover {
      background-color: #3d3c3c;
    }

    .form-title a,
    .form-title h2 {
      display: inline-block;

    }

    .form-title a {
      text-decoration: none;
      font-size: 20px;
      background-color: green;
      color: honeydew;
      padding: 2px 10px;
    }
  </style>
</head>

<body>

  <div class="user-detail">

    <div class="form-title">
      <h2 class="center">Update</h2>
    </div>

    <p style="color:red">
      <?php if (!empty($msg)) {
        echo $msg;
      } ?>
    </p>
    <form method="post" action="">
      <label>Name</label>

      <input type="text" name="name" required value="<?php echo isset($editData) ? $editData['name'] : '' ?>">

      <label>Details</label>
      <input type="address" name="code" required value="<?php echo isset($editData) ? $editData['code'] : '' ?>">

      <label>Price</label>

      <input type="text" name="price" value="<?php echo isset($editData) ? $editData['price'] : '' ?>">

      <label>Image</label>

      <input type="file" name="image" value="<?php echo isset($editData) ? $editData['image'] : '' ?>">





      <button id="b3" type="submit" name="update" value="submit">Submit</button>
    </form>
  </div>
  </div>
  <script>
    document.getElementById('b3').onclick = function() {
      swal("Good job!", "You clicked the button!", "success");
    };
  </script>

</body>

</html>
<?php
/*
} else{ 
header('Location: menudb.php');
} 
}
*/
?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
	<link href="style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>

	<title>Add</title>


</head>

<body>

	<div class="conteiner mt-3">
		<div class="row" >
			<div class="col">
				<a href="dashboard.php"><i class="fa fa-arrow-left float-start text-dark" aria-hidden="true" style="font-size:20px;margin-left:30px;"></i>
				</a>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row justify-content-center align-items-center d-flex" style="margin-left: 5px;">
			<h2 class="text-center fw-bold">ADD PRODUCTS</h2>
			<div class="col-sm-12 col-md-4">
				<p style="color:red">

					<!-- <?php if (!empty($msg)) {
								echo $msg;
							} ?> -->
				</p>
				<div class="card " style="background-color: rgb(141, 141, 134);border-radius:30px 30px;">


					<div class="justify-content-center align-items-center d-flex mt-3">
						<form method="post" action="add.php">
							<label class="fw-bold">Name</label>

							<input class="form-control-lg form-control " type="text" name="name" required value="<?php echo isset($editData) ? $editData['name'] : '' ?>"><br>

							<label class="fw-bold">Price</label>

							<input class="form-control-lg form-control" type="text" name="price" required value="<?php echo isset($editData) ? $editData['price'] : '' ?>"><br>

							<label class="fw-bold">Image</label>

							<input class="form-control-lg form-control" type="file" name="image" required value="<?php echo isset($editData) ? $editData['image'] : '' ?>"><br>
							<label class="fw-bold">pcode</label>

							<input class="form-control-lg form-control" type="text" name="code" required value="<?php echo isset($editData) ? $editData['code'] : '' ?>"><br><br>

							<div class="justify-content-center align-items-center d-flex">
								<button class="btn btn-warning  btn-lg" type="submit" name="add" value="submit">Save</button>
							</div>

						</form>
						<?php
						include_once 'config.php';
						if (isset($_POST['add'])) {
							$name = $_POST['name'];
							$price = $_POST['price'];
							$image = $_POST['image'];
							$code = $_POST['code'];
							$sql = "INSERT INTO tblproduct (name,price,image,code)
	 VALUES ('$name','$price','$image','$code')";
							if (mysqli_query($connection, $sql)) {
							}

						?>
							<script>
								Swal.fire({
									icon: 'success',
									title: 'SUCESS',
									text: 'Your record added sucesfully'
								})
							</script>

						<?php
						
						}
						?>

					</div>
				</div>
			</div>
		</div>


	</div>
	</div>


</body>

</html>
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
    <div class="container-fluid ">
        <div class="image vh-100 bg-image" style="background-image:url('https://pngimg.com/d/pizza_PNG44049.png');position: relative;">
        </div>

        <div class="bg-text row">
            <div class="col-sm-12 col-md-12">
                <div class="nav float-start mt-3">
                    <input type="hidden" class="p-2 text-danger text-decoration-none" style="border-radius: 10px;border:1px solid black;" placeholder="" />
                    <a href="login.php" class="p-2 text-light bg-dark text-decoration-none" style="border-radius: 10px;border:1px solid black;">User Login</a>
                </div>
                <div class="nav float-end mt-3">
                    <input type="hidden" class="p-2 text-light text-decoration-none" style="border-radius: 10px;border:1px solid black;" placeholder="" />
                    <a href="admin.php" class="p-2 text-light bg-dark text-decoration-none" style="border-radius: 10px;border:1px solid black;">Admin Login</a>
                </div>
                <h1 class="mern text-center" style="font-size: 90px;margin-top: 200px;letter-spacing: 4px;font-weight:50rem;color: rgb(39, 31, 35);">
                    PIZZA World</h1>

                <div class="row justify-content-center">
                    <div class="col-md-6 " style="margin-top: 100px;">
                        <div class="justify-content-between align-items-center d-flex">
                            <div class="">
                                <i class="fa fa-map-marker" aria-hidden="true" style="font-size:30px;color:chartreuse"></i>
                                <h4>1.Choose location</h4>
                            </div>
                            <div class="">
                                <i class="fa fa-sort" aria-hidden="true" style="font-size:30px;color:chartreuse;"></i>

                                <h4>2.order food</h4>
                            </div>
                            <div class="">
                                <i class="fa fa-motorcycle " aria-hidden="true" style="font-size:30px;color:chartreuse;"></i>
                                <h4>3.Delivery or take out</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#hide").click(function() {
                $("a").hide();
            });
            $("#show").click(function() {
                $("a").show();
            });
        });
    </script>

</body>

</html>
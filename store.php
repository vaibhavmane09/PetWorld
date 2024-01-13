<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store | ThePetWorld</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/store.css">


    <link rel="shortcut icon" href="./IMG/fevicon.jpg" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- --------------------------Navbar start ---------------------------- -->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <!-- <img src="../IMG/logo.png" width="230px"> -->
                    <a href="#"><i class="fa fa-paw" aria-hidden="true"></i> Pet<span>World</span>
                    </a>
                </div>
                <nav>
                    <ul>
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-lg"></i> HOME</a>
                        </li>
                        <li>
                            <a href="#" class="activeted">SERVICES <i class="fa fa-caret-down"></i></a>
                            <div class="sub-menu">
                                <ul>
                                    <li><a href="training.php">Training</a></li>
                                    <li><a href="store.php" class="activeted">Store</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="#">MORE <i class="fa fa-caret-down"></i></a>
                            <div class="sub-menu">
                                <ul>
                                    <li><a href="about_us.php">About Us</a></li>
                                    <li><a href="contact_us.php">Contact Us</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="user_login_signup.php"><i class="fa fa-shopping-cart fa-lg"></i></a>
                        </li>
                        <li>
                            <h1>|</h1>
                        </li>
                        <li>
                            <a href="user_login_signup.php"><i class="fa fa-sign-in fa-lg"></i> LOGIN</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <hr>
        </div>
    </div>
    <!-- ----------------------- End Navbar --------------------- -->

    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="./IMG/Products/playing_item1.jpeg">
                </div>

                <div class="col-3">
                    <img src="./IMG/Products/medicine.jpeg">
                </div>

                <div class="col-3">
                    <img src="./IMG/Products/food_1.jpeg">
                </div>
            </div>
        </div>
    </div>
    <!-- Products -->


    <div class="small-container">
        <h2 class="title">Our Products</h2>

        <div class="row">
            <?php
            // $conn = mysqli_connect("localhost", "root", "", "petworld");
            include "conn.php";

            $fquery = "select *from addproduct";
            $result = mysqli_query($conn, $fquery) or die("could not execute query");

            while ($row = mysqli_fetch_array($result)) {


            ?>
                <div class="col-4">
                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['pimg']) . '"width="300" height="250"/>' ?>
                    <h4><input type="text" name="pname" value="<?php echo $row['pname']; ?>" readonly></h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <div class="price-buy">
                        <p>&#8377;<input type="text" name="pprice" value="<?php echo $row['pprice']; ?>" readonly></p>
                        <a href="user_login_signup.php">Add To Cart</a>
                        <!-- <input type="submit" name="add" id="cart" value="Add To Cart"> -->
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>





    <!-- ---------------------- Footer ----------------- -->
    <div class="footer">
        <div class="container">
            <p class="copyright">Find Us On-
                <a href="#"><i class="fa fa-facebook-square"> </i></a>

                <a href="#"><i class="fa fa-twitter"></i></a>

                <a href="#"><i class="fa fa-instagram"></i></a>

                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <br>
                Copyright &copy; 2023 - ThePetWorld | All Rights Reserved!
            </p>
        </div>
    </div>
</body>

</html>
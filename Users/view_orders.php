<?php
ob_start();
session_start();
if (isset($_SESSION['mobno'])) {
    // $conn = mysqli_connect("localhost", "root", "", "petworld");
    include "conn.php";

    $mobno = $_SESSION['mobno'];


?>




    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ThePetWorld-User | View Orders</title>
        <link rel="stylesheet" href="./CSS/Home-CSS/style.css">
        <link rel="stylesheet" href="./CSS/Home-CSS/navbar_footer.css">
        <link rel="stylesheet" href="./CSS/view-pet.css">

        <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Sweet alert Box Script code -->
        <script src="../JS/sweetalert2.all.min.js"></script>

        <!-- Payment Script JS Code -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body>
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <!-- <img src="./IMG/logo.png" width="230px"> -->
                        <a href="#"><i class="fa fa-paw" aria-hidden="true"></i> Pet<span>World</span>
                        </a>
                    </div>
                    <nav>
                        <ul>
                            <li>
                                <a href="./Home-HTML/index.php"><i class="fa fa-home fa-lg"></i> HOME</a>
                            </li>
                            <li>
                                <a href="#">SERVICES <i class="fa fa-caret-down"></i></a>
                                <div class="sub-menu">
                                    <ul>
                                        <li><a href="./Home-HTML/training.php">Training</a></li>
                                        <li><a href="./Home-HTML/store.php">Store</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#">MORE <i class="fa fa-caret-down"></i></a>
                                <div class="sub-menu">
                                    <ul>
                                        <li><a href="./Home-HTML/about_us.php">About Us</a></li>
                                        <li><a href="./Home-HTML/contact_us.php">Contact Us</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-shopping-cart fa-lg"></i></a>
                            </li>
                            <li>
                                <h1>|</h1>
                            </li>
                            <li>
                                <a href="user-profile.php" class="activeted"><i class="fa fa-user"></i> My Profile</a>

                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- End of Navigation -->

                <!-- ---------Body of View Pet Details--------- -->

                <div class="view-feedback-container">

                    <div class="view-feedback">

                        <h2 class="title">
                            Orders
                            <hr>
                        </h2>


                        <table class="view-feedback-table">

                            <tr>

                                <th>Sr.No</th>

                                <th>Order ID</th>

                                <th>Order Date</th>

                                <th>Mobile No.</th>

                                <th>Address</th>

                                <th>Product ID</th>

                                <th>Product Name</th>

                                <th>Product Price</th>

                                <th>Quantity</th>

                                <th>Total Amount</th>

                                <th>Payment Status</th>

                                <th>Delivery Status</th>

                            </tr>

                            <?php
                            $query = "select *from orders where user_mobno='$mobno'";
                            $result = mysqli_query($conn, $query);
                            $slno = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $slno++;

                            ?>

                                <tr>

                                    <td><?php echo $slno; ?></td>

                                    <td><?php echo $row['order_id']; ?></td>

                                    <td><?php echo $row['order_date']; ?></td>

                                    <td><?php echo $row['user_mobno']; ?></td>

                                    <td><?php echo $row['address']; ?></td>

                                    <td><?php echo $row['product_id']; ?></td>

                                    <td><?php echo $row['product_name']; ?></td>

                                    <td><?php echo $row['product_price']; ?></td>

                                    <td><?php echo $row['quantity']; ?></td>

                                    <td><?php echo $row['total_amt']; ?></td>

                                    <td><?php echo $row['pay_status']; ?></td>

                                    <td><?php echo $row['delivery_status']; ?></td>

                                </tr>
                            <?php
                            }
                            ?>
                            </form>


                        </table>

                    </div>

                </div>


                <!-- ---------Body of View Pet Details--------- -->

                <!-- ------------- Footer -------------- -->
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



<?php

}
?>
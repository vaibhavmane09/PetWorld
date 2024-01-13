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
        <title>ThePetWorld-User | Pay Training Fees</title>
        <link rel="stylesheet" href="./CSS/Home-CSS/style.css">
        <link rel="stylesheet" href="./CSS/Home-CSS/navbar_footer.css">
        <link rel="stylesheet" href="./CSS/training_pay.css">

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
                                <a href="add-pet.php"> Add Pets</a>
                            </li>
                            <li>
                                <a href="view-pet.php"> View Pet</a>
                            </li>
                            <li>
                                <a href="view-pet-progress.php"> Check Pet Progress</a>
                            </li>
                            <!-- <li>
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
                            </li> -->
                            <li>
                                <a href="./view_orders.php"><i class="fa fa-shopping-cart fa-lg"></i></a>
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
                <?php
                $petid = $_GET['petid'];
                $get_qyery = "select *from pets where petid='$petid'";
                $result = mysqli_query($conn, $get_qyery);
                $rows = mysqli_fetch_array($result);


                ?>
                <!-- ---------Body of View Pet Details--------- -->
                <div class="pay-training-container">
                    <div class="main">
                        <form action="#" method="post">
                            <div class="container">
                                <div class="right-box">
                                    <div class="main-image-box">
                                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($rows['petimage']) . '"width="350" height="400"/>' ?>
                                    </div>
                                </div>
                                <div class="details-box">
                                    <!-- <h1>Glad to meet you here</h1> -->
                                    <h1>Pay Training Fee's Here</h1>
                                    <table cellspacing="0" class="inputs">
                                        <tr>
                                            <td>Pet ID</td>
                                            <td align="right"><input type="text" id="petid" value="<?php echo $rows['petid']; ?>" readonly /></td>
                                        </tr>
                                        <tr>
                                            <td>Pet Name</td>
                                            <td align="right"><input type="text" id="pet_name" value="<?php echo $rows['pname']; ?>" readonly /></td>
                                        </tr>
                                        <tr>
                                            <td>Pet Gender</td>
                                            <td align="right"><input type="text" id="pet_gender" value="<?php echo $rows['pgender']; ?>" readonly /></td>
                                        </tr>
                                        <tr>
                                            <td>Owner Mobile</td>
                                            <td align="right"><input type="text" id="user_mobno" value="<?php echo $rows['mobno']; ?>" readonly /></td>
                                        </tr>
                                        <tr>
                                            <td>Training Type</td>
                                            <td align="right"><input type="text" id="train_type" value="<?php echo $rows['traintype']; ?>" readonly /></td>
                                        </tr>
                                        <tr>
                                            <td>Duration</td>
                                            <td align="right"><input type="text" id="duration" value="<?php echo $rows['duration']; ?>" readonly /></td>
                                        </tr>
                                        <tr>
                                            <td>Price</td>
                                            <td align="right"><input type="text" id="train_price" value="<?php echo $rows['train_price']; ?>" readonly /></td>
                                        </tr>
                                    </table>
                                    <!-- <button type="submit">Pay Now</button> -->
                                    <button type="button" onclick="pay_now()" id="cart">Pay Now</button>
                                    <button type="button" id="dlt-btn"> <a href="view-pet.php">Cancel</a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Payment Code -->
                <script>
                    function pay_now() {


                        var petid = jQuery('#petid').val();

                        jQuery.ajax({
                            type: 'post',
                            url: 'training_payment.php',
                            data: "petid=" + petid,
                            success: function(result) {
                                var options = {
                                    "key": "rzp_live_kk5tGkTaooRTd0",
                                    "amount": 1 * 100,
                                    "currency": "INR",
                                    "name": "ThePetWorld",
                                    "description": "Test Transaction",
                                    "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                                    "handler": function(response) {
                                        jQuery.ajax({
                                            type: 'post',
                                            url: 'training_payment.php',
                                            data: "payment_id=" + response.razorpay_payment_id,
                                            success: function(result) {

                                                window.location.href = "training_thank.php";
                                            }
                                        });
                                    }
                                };
                                var rzp1 = new Razorpay(options);
                                rzp1.open();
                            }
                        });


                    }
                </script>
                <!-- Payment Code end here -->

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

} else {
    header('Location:../index.php');
    exit();
}
?>
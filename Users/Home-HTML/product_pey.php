<?php

session_start();
if (isset($_SESSION['mobno'])) {
    // $conn = mysqli_connect("localhost", "root", "", "petworld");
    include "./conn.php";

    $mobno = $_SESSION['mobno'];
    $fquery1 = "select * from users where mobno='$mobno'";
    $result1 = mysqli_query($conn, $fquery1);
    $row1 = mysqli_fetch_array($result1);
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ThePetWorld-User | Store</title>
        <link rel="stylesheet" href="../CSS/Home-CSS/style.css">
        <link rel="stylesheet" href="../CSS/Home-CSS/product_pay.css">


        <link rel="shortcut icon" href="../../IMG/fevicon.jpg" type="image/x-icon">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
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
                                <a href="../view_orders.php"><i class="fa fa-shopping-cart fa-lg"></i></a>
                            </li>
                            <li>
                                <h1>|</h1>
                            </li>
                            <li>
                                <a href="../user-profile.php"><i class="fa fa-user"></i> My Profile</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <hr>
            </div>
        </div>
        <!-- ----------------------- End Navbar --------------------- -->

        <?php
        
            $pid = $_GET['pid'];
            $query="select *from addproduct where pid='$pid'";
            
            $result = mysqli_query($conn, $query );
            $row= mysqli_fetch_array($result);
        
            


        ?>
               <input type="hidden" name="user_mobno" id="user_mobno" value="<?php echo $row1['mobno']; ?>" />
                    <input type="hidden" name="user_name" id="user_name" value="<?php echo $row1['fname']; ?>" />
                    <input type="hidden" name="address" id="address" value="<?php echo $row1['address']; ?>" />

        <div class="buy-container">
            <div class="main">
                <form action="#" method="post">
                    <div class="container">
                        <div class="right-box">
                            <div class="main-image-box">
                            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['pimg']) . '"width="350" height="400"/>' ?>
                        </div>
                        </div>
                        <div class="details-box">
                            <h1>Glad to meet you here</h1>
                            <table cellspacing="0" class="inputs">
                                <tr>
                                    <td>Product ID</td>
                                    <td align="right"><input type="text" id="product_id" value="<?php echo $pid;?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td>Product Type</td>
                                    <td align="right"><input type="text" id="product_type" value="<?php echo $row['ptype'];?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td>Product Name</td>
                                    <td align="right"><input type="text" id="product_name" value="<?php echo $row['pname'];?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td>Product Price</td>
                                    <td align="right"><input type="text" id="product_price" value="<?php echo $row['pprice'];?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td>Quantity</td>
                                    <td align="right"><input type="text" id="qty" onchange="myfunc()"></td>
                                </tr>
                                <tr>
                                    <td>Total Amount</td>
                                    <td align="right"><input type="text" id="total_amt" readonly /></td>
                                </tr>
                            </table>
                            <!-- <button type="submit">Pay Now</button> -->
                            <button type="button" onclick="pay_now()" id="cart">Pay Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
       

        <!--Payment Code -->
        <script>
            function pay_now() {

                var user_mobno = jQuery('#user_mobno').val();
                var product_id = jQuery('#product_id').val();
                var user_name = jQuery('#user_name').val();
                var address = jQuery('#address').val();
                var product_name = jQuery('#product_name').val();
                var product_price = jQuery('#product_price').val();
                var qty = jQuery('#qty').val();
                var total_amt = jQuery('#total_amt').val();

                jQuery.ajax({
                    type: 'post',
                    url: 'payment_process.php',
                    data: "user_mobno=" + user_mobno + "&product_id=" + product_id + "&user_name=" + user_name + "&address=" + address + "&product_name=" + product_name + "&product_price=" + product_price + "&qty=" + qty + "&total_amt=" + total_amt,
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
                                    url: 'payment_process.php',
                                    data: "payment_id=" + response.razorpay_payment_id,
                                    success: function(result) {

                                        window.location.href = "thank_you.php";
                                    }
                                });
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                    }
                });


            }


            function myfunc(){
                var price=document.getElementById('product_price').value;
                var qty=document.getElementById('qty').value;
                let total = document.getElementById('total_amt').value = price*qty;
                

            }
        </script>


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


<?php
}
?>
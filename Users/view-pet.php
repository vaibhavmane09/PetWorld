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
        <title>ThePetWorld-User | View Pets</title>
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
                                <a href="add-pet.php"> Add Pet's</a>
                            </li>
                            <li>
                                <a href="view-pet-progress.php"> Check Pet Progress</a>
                            </li>
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

                <!-- ---------Body of View Pet Details--------- -->

                <div class="view-feedback-container">

                    <div class="view-feedback">

                        <h2 class="title">
                            Manage Pet's
                            <hr>
                        </h2>


                        <table class="view-feedback-table">

                            <tr>

                                <th>Sr.No</th>

                                <th>Category</th>

                                <th>Breed</th>

                                <th>Name</th>

                                <th>Owner Mobile</th>

                                <th>Pet Gender</th>

                                <th>Pet Age</th>

                                <th>Weight</th>

                                <th>Completed Vaccination</th>

                                <th>Training Type</th>

                                <th>Training Duration</th>

                                <th>Training Price</th>

                                <th>Address</th>

                                <th>Image</th>

                                <th colspan="2">Payment</th>

                                <th colspan="2">Action</th>

                                <th>Allocated Trainer</th>

                                <th>Trainer Mobile</th>

                                <th>Training Status</th>
                            </tr>

                            <?php
                            $petquery = "select *from pets where mobno='$mobno'";
                            $result = mysqli_query($conn, $petquery) or die("could not execute query");
                            $slno = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $slno++;
                            ?>
                                <form action="#" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="petid" id="petid" value="<?php echo $row['petid']; ?>" />

                                    <tr>
                                        <td><?php echo $slno; ?></td>
                                        <td><input type="text" name="pet" value="<?php echo $row['pet']; ?>"></td>
                                        <td><input type="text" name="breed" value="<?php echo $row['breed']; ?>"></td>
                                        <td><input type="text" name="pname" value="<?php echo $row['pname']; ?>"></td>
                                        <td><input type="text" name="mobno" value="<?php echo $row['mobno']; ?>" readonly></td>
                                        <td><input type="text" name="pgender" value="<?php echo $row['pgender']; ?>"></td>
                                        <td><input type="text" name="petage" value="<?php echo $row['petage']; ?>"></td>
                                        <td><input type="text" name="pweight" value="<?php echo $row['pweight']; ?>"></td>
                                        <td><input type="text" name="vaccine" value="<?php echo $row['vaccine']; ?>"></td>
                                        <td><input type="text" name="traintype" value="<?php echo $row['traintype']; ?>"></td>
                                        <td><input type="text" name="duration" value="<?php echo $row['duration']; ?>"></td>
                                        <td><input type="text" name="train_price" value="<?php echo $row['train_price']; ?>" readonly /></td>

                                        <td><input type="text" name="address" value="<?php echo $row['address']; ?>" readonly></td>
                                        <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['petimage']) . '"width="100" height="100"/>' ?></td>

                                        <td><input type="text" name="payment_status" value="<?php echo $row['payment_status']; ?>" readonly /></td>

                                        <!-- <td><input type="submit" value="Pay" name="payamt"  id="send-btn"/></td> -->

                                        <!-- <td><button type="button" onclick="pay_now()" id="send-btn">Pay Now</button></td> -->

                                        <?php
                                        if ($row['payment_status'] == 'Paid') {
                                        ?>
                                            <td><a id="pay-btn" style="pointer-events: none">PayNow</a></td>
                                        <?php
                                        } 
                                        else {

                                        ?>
                                            <td><a href="training_pay.php?petid=<?php echo $row['petid']; ?>" id="pay-btn">PayNow</a></td>
                                        <?php
                                        }
                                        ?>

                                        <td><input type="submit" value="Update" name="update" id="send-btn" /></td>

                                        <td><input type="submit" value="Delete" name="delete" id="dlt-btn" /></td>

                                        <td><input type="text" name="allocated_trainer" value="<?php echo $row['allocated_trainer']; ?>" readonly /></td>

                                        <td><input type="text" name="tmobno" value="<?php echo $row['tmobno']; ?>" readonly /></td>
                                        
                                        <td><input type="text" name="training_status" value="<?php echo $row['training_status']; ?>" readonly /></td>


                                    </tr>
                                </form>
                            <?php
                            }

                            ?>

                            <!-- update pet details code -->
                            <?php
                            if (isset($_POST['update'])) {
                                $conn = mysqli_connect("localhost", "root", "", "petworld");

                                $petid = $_POST['petid'];
                                $pet = $_POST['pet'];
                                $breed = $_POST['breed'];
                                $pname = $_POST['pname'];
                                $mobno = $_POST['mobno'];
                                $pgender = $_POST['pgender'];
                                $petage = $_POST['petage'];
                                $pweight = $_POST['pweight'];
                                $vaccine = $_POST['vaccine'];
                                $traintype = $_POST['traintype'];
                                $duration = $_POST['duration'];
                                $train_price = $_POST['train_price'];
                                $address = $_POST['address'];


                                $updatequery = "update pets set pet='$pet', breed='$breed', pname='$pname',pgender='$pgender',petage='$petage',pweight='$pweight',vaccine='$vaccine',traintype='$traintype',duration='$duration',address='$address',petimage='$petimage' where petid='$petid'";

                                $result = mysqli_query($conn, $updatequery) or die("could not execute query");
                                if ($result == 1) {
                                    echo '<script>';
                                    echo 'swal("Thank You","Pet Details Updated Successfully!", "success")';
                                    echo '</script>';
                                    header("refresh:2");
                                } else {
                                    echo '<script>';
                                    echo 'swal("Sorry","Cannot Update the Pet details, Please try again!", "error")';
                                    echo '</script>';
                                    header("refresh:2");
                                }
                            }

                            // Delete Pet query
                            elseif (isset($_POST['delete'])) {
                                $petid = $_POST['petid'];

                                $delete = "delete from pets where petid='$petid'";
                                $result = mysqli_query($conn, $delete);
                                if ($result) {
                                    echo '<script>';
                                    echo 'swal( "Good Job","Pet Details Deleted Sucessfully","success")';
                                    echo '</script>';
                                    header('refresh:2');
                                } else {
                                    echo '<script language="javascript">';
                                    echo 'swal( "Sorry","Could not deleted the Pet Details!","error")';
                                    echo '</script>';
                                }
                            }
                            ?>

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
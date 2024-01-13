<?php
ob_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetWorld-Admin | Feedback</title>

    <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Sweet alert Box Script code -->
    <script src="../JS/sweetalert2.all.min.js"></script>



    <link rel="stylesheet" href="./CSS/style.css">
    <!-- <link rel="stylesheet" href="./CSS/feedback.css"> -->

</head>

<body>
    <div class="side-bar">

        <div class="profile-img">

            <i class="fa fa-user"></i>

            <h5>Admin</h5>
            <hr>
        </div>

        <!--Profile CODE ENDED HERE-->

        <div class="item">

            <a href="admin-home.php">

                <i class="fas fa-chart-line"></i>Dashborad

            </a>

        </div>

        <div class="item">

            <a class="dropdown-toggle">
                <i class="fa fa-users"></i>Trainers<i class="fas fa-chevron-down"></i>
            </a>
            <ul class="dropdown">
                <li>
                    <a class="item" href="add-trainer.php">
                        <i class="fa fa-plus"></i>Add Trainer
                    </a>

                </li>

                <li>

                    <a class="item" href="view_trainer.php">
                        <i class="fa fa-eye"></i>View Trainers
                    </a>

                </li>

            </ul>

        </div>

        <div class="item">

            <a class="dropdown-toggle">
                <i class="fa-brands fa-shopify"></i>Products<i class="fas fa-chevron-down"></i>
            </a>
            <ul class="dropdown">
                <li>
                    <a class="item" href="add_products.php">
                        <i class="fa fa-plus"></i>Add Products
                    </a>

                </li>

                <li>

                    <a class="item" href="view_products.php">
                        <i class="fa fa-eye"></i>View Products
                    </a>

                </li>

            </ul>

        </div>

        <div class="item">

            <a class="item" href="view-orders.php">

                <i class="fa fa-shopping-cart"></i>Orders

            </a>

        </div>

        <div class="item">

            <a class="item" href="view_customers.php">

                <i class="fa fa-users"></i>Customers

            </a>

        </div>

        <div class="item">

            <a class="item" href="pet-allocate.php">

                <i class="fa fa-dog"></i>Pet's

            </a>

        </div>

        <div class="item">

            <a class="item activeted" href="feedback.php">

                <i class="fa fa-comments"></i>Feedback

            </a>

        </div>

        <div class="item">

            <a class="item" href="queries.php">

                <i class="fa fa-clipboard"></i>Queries

            </a>

        </div>

        <div class="item">

            <a class="dropdown-toggle">
                <i class="fa fa-folder"></i>Reports<i class="fas fa-chevron-down"></i>
            </a>
            <ul class="dropdown">
                <li>
                    <a class="item" href="sales_reports.php">
                        <i class="fa fa-file"></i>Sales Report
                    </a>

                </li>

                <li>

                    <a class="item" href="training_report.php">
                        <i class="fa fa-file"></i>Training Report
                    </a>

                </li>

            </ul>

        </div>

        <div class="item">
            <a class="dropdown-toggle">
                <i class="fa fa-gear"></i>Settings<i class="fas fa-chevron-down"></i>
            </a>

            <ul class="dropdown">
                <li>

                    <a class="item" href="change_pass.php">
                        <i class="fas fa-lock"></i>Change Password
                    </a>

                </li>

                <li>

                    <a class="item" href="../Users/logout.php">
                        <i class="fas fa-sign-out"></i>Logout
                    </a>

                </li>

            </ul>

        </div>

    </div>
    <div class="main-content">
        <header>
            <marquee behavior="alternate" scrollamount="10">
                <h2>
                    <a href="#"><i class="fa fa-paw"></i> Pet<span>World</span>
                </h2>
            </marquee>

        </header>


        <!-- ==============================================================
                                start of feddback table
             ============================================================== -->



        <div class="view-feedback-container">

            <div class="view-feedback">

                <h2 class="title">
                    Feedback View
                </h2>


                <table class="view-feedback-table">

                    <tr>

                        <th>Sr.No</th>

                        <th>User Name</th>

                        <th>User Phone</th>

                        <th>Feedback On</th>

                        <th>Feedback Message</th>

                        <th>Ratings</th>

                        <th>Replay Message</th>

                        <th colspan="2">Action</th>

                    </tr>

                    <?php
                    // $conn = mysqli_connect("localhost", "root", "", "petworld");
                    include "conn.php";

                    $fquery = "select *from feedback ";
                    $result = mysqli_query($conn, $fquery) or die("could not execute query");
                    $slno = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        $slno++;
                    ?>
                        <form action="#" method="post">
                            <input type="hidden" name="fid" value="<?php echo $row['fid']; ?>" />
                            <tr>
                                <td><?php echo $slno; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['mobno']; ?></td>
                                <td><?php echo $row['fon']; ?></td>
                                <td><?php echo $row['fmsg']; ?></td>
                                <td><?php echo $row['frate']; ?></td>
                                <td><textarea name="replaymsg"><?php echo $row['replaymsg']; ?></textarea></td>
                                <td><input type="submit" value="send" name="send" id="send-btn" /></td>
                            </tr>
                        </form>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_POST['send'])) {
                        // $conn = mysqli_connect("localhost", "root", "", "petworld");
                        include "conn.php";

                        $fid = $_POST['fid'];
                        $replymsg = $_POST['replaymsg'];
                        $rquery = "update feedback set replaymsg='$replymsg' where fid='$fid'";
                        $result = mysqli_query($conn, $rquery) or die("could not execute query");
                        if ($result == 1) {
                            echo '<script>';
                            echo 'swal("Thank You","Your feedback is sent successfully!", "success")';
                            echo '</script>';
                            header("refresh:2");
                        } else {
                            echo '<script>';
                            echo 'swal("Sorry","Your feedback is not sent, Please sent again!", "error")';
                            echo '</script>';
                            header("refresh:2");
                        }
                    }
                    ?>

                </table>

            </div>

        </div>

        <!-- ==============================================================
                                end of feddback table
             ============================================================== -->


        <!-- custom javascript link -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

        <script src="./js/script.js"></script>

    </div>

</body>

</html>
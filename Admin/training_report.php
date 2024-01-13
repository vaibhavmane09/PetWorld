<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetWorld- Admin | Trainig Reports</title>

    <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="./CSS/style.css">
    <!-- <link rel="stylesheet" href="./CSS/reports.css"> -->
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

                <i class="fas fa-line-chart"></i>Dashborad

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

            <a class="item" href="feedback.php">

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
        <!-- Main Card Start  -->
        <div class="main-report-container">
            <h2>Trainnig Report -
                <hr>
            </h2>
            

            <div class="report-result" id="training">

                <table border="1px solid">

                    <tr>
                        <th>Sr. No</th>
                        <th>Pet Id</th>
                        <th>Pet Category</th>
                        <th>Pet Breed</th>
                        <th>Pet Name</th>
                        <th>Owner Mobile</th>
                        <th>Training Type</th>
                        <th>Duration</th>
                        <th>Training Price</th>
                    </tr>

                    <?php

                        // $conn = mysqli_connect('localhost', 'root', '', 'petworld');
                        include "conn.php";

                        $order_report = "select *from pets where payment_status='Paid'";
                        $result = mysqli_query($conn, $order_report);
                        $slno = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $slno++;

                    ?>

                            <form action="#" method="post">
                                <tr>

                                    <td><?php echo $slno; ?></td>

                                    <td><?php echo $row['petid']; ?></td>

                                    <td><?php echo $row['pet']; ?></td>

                                    <td><?php echo $row['breed']; ?></td>

                                    <td><?php echo $row['pname']; ?></td>

                                    <td><?php echo $row['mobno']; ?></td>

                                    <td><?php echo $row['traintype']; ?></td>

                                    <td><?php echo $row['duration']; ?></td>

                                    <td><?php echo $row['train_price']; ?></td>

                                </tr>
                            </form>
                    <?php
                        }
                
                    ?>
                    <tr>
                        <td colspan="8">Total Amount</td>
                        <?php
                        $sum = "select sum(train_price) as total from pets where payment_status='Paid'";
                        $res = mysqli_query($conn, $sum);
                        $rows = mysqli_fetch_array($res)

                        ?>

                        <td><?php echo $rows['total']; ?></td>
                    </tr>


                </table>

            </div>

        </div>




        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>




        <script src="./JS/script.js"></script>


    </div>
    </main>
    </div>

</body>

</html>
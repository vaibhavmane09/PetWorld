<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetWorld- Admin | Sales Reports</title>

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
            <h2>Sales Report -
                <hr>
            </h2>
            <div class="report-container">
                <form action="#" method="post">
                    <div class="input-field">

                        <label for="from-date">From Date:</label>

                        <input type="date" name="fdate" />

                    </div>

                    <div class="input-field">

                        <label for="from-date">To Date:</label>

                        <input type="date" name="tdate" />

                    </div>

                    <div class="input-btn">

                        <input type="submit" name="genarate" value="Generate Reports" />

                    </div>
                </form>
            </div>

            <hr>

            <div class="report-result">

                <table border="1px solid">

                    <tr>
                        <th>Sr. No</th>
                        <th>Order Id</th>
                        <th>Customer Name</th>
                        <th>Mobile No.</th>
                        <th>Product Name</th>
                        <th>Product Id</th>
                        <th>Product Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>

                    <?php
                    if (isset($_POST['genarate'])) {
                        // $conn = mysqli_connect('localhost', 'root', '', 'petworld');
                        include "conn.php";

                        $fdate = $_POST['fdate'];
                        $tdate = $_POST['tdate'];

                        $orderview = "select *from orders where DATE(order_date) between '$fdate' and '$tdate'";
                        $result = mysqli_query($conn, $orderview) or die("Could not execute query");

                        // Query for total sum of the total_amt from a perticular date
                        $total_query = "select sum(total_amt) as total from orders where DATE(order_date) between '$fdate' and '$tdate'";
                        $res = mysqli_query($conn, $total_query);
                        $rows = mysqli_fetch_array($res);
                        $total_sum = $rows['total'];
                        $total_amount = 0;

                        $slno = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $slno++;
                    ?>

                            <form action="#" method="post">
                                <tr>

                                    <td><?php echo $slno; ?></td>

                                    <td><?php echo $row['order_id']; ?></td>

                                    <td><?php echo $row['user_name']; ?></td>

                                    <td><?php echo $row['user_mobno']; ?></td>

                                    <td><?php echo $row['product_name']; ?></td>

                                    <td><?php echo $row['product_id']; ?></td>

                                    <td><?php echo $row['product_price']; ?></td>

                                    <td><?php echo $row['quantity']; ?></td>

                                    <td><?php echo $row['total_amt']; ?></td>


                                </tr>

                            </form>
                        <?php
                        }
                    } else {

                        // $conn = mysqli_connect('localhost', 'root', '', 'petworld');
                        include "conn.php";

                        $order_report = "select *from orders";
                        $result = mysqli_query($conn, $order_report);

                        // Query for total sum of the total_amt 
                        $total_query = "select sum(total_amt) as total from orders";
                        $res = mysqli_query($conn, $total_query);
                        $rows = mysqli_fetch_array($res);
                        $total_sum = $rows['total'];

                        $total_amount = 0;
                        $slno = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $slno++;

                        ?>

                            <form action="#" method="post">
                                <tr>

                                    <td><?php echo $slno; ?></td>

                                    <td><?php echo $row['order_id']; ?></td>

                                    <td><?php echo $row['user_name']; ?></td>

                                    <td><?php echo $row['user_mobno']; ?></td>

                                    <td><?php echo $row['product_name']; ?></td>

                                    <td><?php echo $row['product_id']; ?></td>

                                    <td><?php echo $row['product_price']; ?></td>

                                    <td><?php echo $row['quantity']; ?></td>

                                    <td><?php echo $row['total_amt']; ?></td>


                                </tr>

                            </form>
                    <?php
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="8">Total Amount</td>

                        <td><?php echo $total_sum; ?></td>
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
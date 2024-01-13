<?php

session_start();
if (isset($_SESSION['aname'])) {
    // $conn = mysqli_connect("localhost", "root", "", "petworld");
    include "conn.php";

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PetWorld | Admin</title>

        <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

        <link rel="stylesheet" href="./CSS/style.css">
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

                <a href="#" class="activeted">

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
            <main>
                <div class="cards">
                    <div class="card-single">
                        <div>
                            <?php
                            $trainers = "select *from addtrainer";
                            $trainer_res = mysqli_query($conn, $trainers);
                            $trainer_num = mysqli_num_rows($trainer_res);
                            ?>
                            <h1><?php echo $trainer_num; ?> </h1>
                            <span>Total Trainers</span>
                        </div>
                        <div>
                            <span class="las la-clipboard-list"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <?php
                            $product = "select *from addproduct";
                            $product_res = mysqli_query($conn, $product);
                            $product_num = mysqli_num_rows($product_res);
                            ?>
                            <h1><?php echo $product_num; ?>+</h1>
                            <span>Products</span>
                        </div>
                        <div>
                            <span class="las la-shopping-bag"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <?php
                            $pets = "select *from pets";
                            $total_pets = mysqli_query($conn, $pets);
                            $pets_num = mysqli_num_rows($total_pets);
                            ?>
                            <h1><?php echo $pets_num; ?></h1>
                            <span>Total Pet's</span>
                        </div>
                        <div>
                            <span class="lab la-dog"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <?php
                            $trainedpets = "select *from pets where training_status='Completed'";
                            $trainer_pets_res = mysqli_query($conn, $trainedpets);
                            $trained_pets_num = mysqli_num_rows($trainer_pets_res);
                            ?>
                            <h1><?php echo $trained_pets_num; ?></h1>
                            <span>Pets Trained</span>
                        </div>
                        <div>
                            <span class="las la-dog"></span>
                        </div>
                    </div>

                    <div class="card-single">
                        <div>
                            <?php
                            $orders = "select *from orders";
                            $order_res = mysqli_query($conn, $orders);
                            $order_num = mysqli_num_rows($order_res);
                            ?>
                            <h1><?php echo $order_num; ?>+</h1>
                            <span>Orders</span>
                        </div>
                        <div>
                            <span class="las la-shopping-bag"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <?php
                            $users = "select *from users";
                            $user_res = mysqli_query($conn, $users);
                            $users_num = mysqli_num_rows($user_res);
                            ?>
                            <h1><?php echo $users_num; ?>+</h1>
                            <span>Regular Customers</span>
                        </div>
                        <div>
                            <span class="fa fa-users"></span>
                        </div>
                    </div>

                    <div class="card-single">
                        <div>
                            <?php
                            $feedback = "select *from feedback";
                            $feedback_res = mysqli_query($conn, $feedback);
                            $feedback_num = mysqli_num_rows($feedback_res);
                            ?>
                            <h1><?php echo $feedback_num; ?>+</h1>
                            <span>Feedbacks</span>
                        </div>
                        <div>
                            <span class="las la-clipboard-list"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <?php
                            $order_amt = "select sum(total_amt) from orders";
                            $query1 = mysqli_query($conn, $order_amt);
                            while ($row1 = mysqli_fetch_array($query1)) {
                                $total_order = $row1['sum(total_amt)'];
                            }

                            $train_amt = "select sum(train_price) from pets";
                            $query2 = mysqli_query($conn, $train_amt);

                            while ($row2 = mysqli_fetch_array($query2)) {
                                $total_train = $row2['sum(train_price)'];
                            }

                            $total = $total_order + $total_train;
                            ?>
                            <h1>&#8377;<?php echo $total; ?>+</h1>
                            <span>Total Profit</span>
                        </div>
                        <div>
                            <span class="fa fa-credit-card"></span>
                        </div>
                    </div>
                </div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
                <?php
                $contact_query = "select *from contactus";
                $contact_res = mysqli_query($conn, $contact_query);
                $contact_us_num = mysqli_num_rows($contact_res);

                ?>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                <canvas id="myChart" style="margin-top:120px; margin-left: 350px;width:100%;max-width:500px"></canvas>

                <script>
                    var xValues = ["Users", "Orders", "Feedbacks", "Queries", "Products", ""];
                    var yValues = [<?php echo $users_num; ?>, <?php echo $order_num; ?>, <?php echo $feedback_num; ?>, <?php echo $contact_us_num; ?>, <?php echo $product_num; ?>, ""];
                    var barColors = ["red", "green", "blue", "orange", "brown", ""];

                    new Chart("myChart", {
                        type: "bar",
                        data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                            }]
                        },
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: "Graphical Details of the Company"
                            }
                        }
                    });
                </script>
            </main>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <div id="myChart1" style="margin-top:-300px; margin-left: 600px;width:100%; max-width:400px; height:300px;">
            </div>

           
            <script src="./JS/script.js"></script>


        </div>
        </main>
        </div>

    </body>

    </html>

<?php
}
?>
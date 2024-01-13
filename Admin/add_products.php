<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetWorld-Admin | Add Products</title>

    <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Sweet alert Box Script code -->
    <script src="../JS/sweetalert2.all.min.js"></script>

    <link rel="stylesheet" href="./CSS/style.css">
    <!-- <link rel="stylesheet" href="./CSS/add-products.css"> -->
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

            <a class="dropdown-toggle activeted">
                <i class="fa-brands fa-shopify"></i>Products<i class="fas fa-chevron-down"></i>
            </a>
            <ul class="dropdown">
                <li>
                    <a class="item activeted1" href="add_products.php">
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

        <!-- ======================== start of add-products ======================== -->

        <div class="product-container">
            <fieldset>
                <legend>
                    <h2>Enter Product Details</h2>
                </legend>
                <form action="#" method="post" autocomplete="off" enctype="multipart/form-data">

                    <div class="grid-inputs">
                        <div class="input-field">

                            <label for="pet">Select Pet -</label>
                            <select name="pet" id="pet">
                                <option value="">Choose Pet</option>
                                <option value="dog">Dog</option>
                                <option value="cat">Cat</option>
                            </select>

                        </div>

                        <div class="input-field">
                            <label for="ptype">Product Type -</label>
                            <select name="ptype" id="type">
                                <option value="">Choose Product</option>
                                <option value="food">Food Items</option>
                                <option value="playing">Playing Items</option>
                                <option value="medicine">Medicines</option>
                            </select>

                        </div>

                        <div class="input-field">

                            <label for="pname">Product Name -</label><br>
                            <input type="text" name="pname">

                        </div>

                        <div class="input-field">

                            <label for="pid">Product Id -</label> <br>
                            <input type="text" name="pid" value="<?php echo "P" . rand(1111, 9999); ?>" readonly>

                        </div>

                        <div class="input-field">

                            <label for="pprice">Product Price -</label> <br>
                            <input type="text" name="pprice">

                        </div>

                        <div class="input-field">

                            <label for="pimg">Upload Image -</label> <br>
                            <input type="file" name="pimg" class="img" style="height: 3rem;">

                        </div>

                        <div class="input-field">

                            <label for="pdesc">Description -</label> <br>
                            <textarea name="pdesc" id="" cols="35" rows="4"></textarea>

                        </div>

                        <div class="input-field">

                            <label for="puse">How to Use?</label> <br>
                            <textarea name="puse" id="" cols="35" rows="4"></textarea>

                        </div>


                    </div>

                    <div class="flex-input">
                        <input type="submit" name="submit" value="Save">
                        <input type="reset" name="reset" value="Clear">
                    </div>

                </form>


                <?php
                if (isset($_POST['submit'])) {
                    // $conn = mysqli_connect("localhost", "root", "", "petworld");
                    include "conn.php";
                    
                    $pet = $_POST['pet'];
                    $ptype = $_POST['ptype'];
                    $pname = $_POST['pname'];
                    $pid = $_POST['pid'];
                    $pprice = $_POST['pprice'];
                    $pimg = addslashes(file_get_contents($_FILES['pimg']['tmp_name']));
                    $pdesc = $_POST['pdesc'];
                    $puse = $_POST['puse'];

                    $addproduct = "insert into addproduct(pid, pet, ptype, pname, pprice, pimg, pdesc, puse) values('$pid','$pet','$ptype','$pname','$pprice','$pimg','$pdesc','$puse')";
                    $result = mysqli_query($conn, $addproduct);

                    if ($result == 1) {
                        echo '<script>';
                        echo 'swal( "Good Job","Product Added Sucessfully","success")';
                        echo '</script>';
                    } else {
                        echo '<script language="javascript">';
                        echo 'swal( "Sorry","Could not Add the Product, Please Check all Fields","error")';
                        echo '</script>';
                    }
                }

                ?>

            </fieldset>
        </div>

        <!-- ======================== end of add-trainers ======================== -->




        <!-- custom javascript link -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

        <script src="./js/script.js"></script>

    </div>

</body>

</html>
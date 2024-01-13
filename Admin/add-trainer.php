<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetWorld-Admin | Add Trainers</title>

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

            <a class="dropdown-toggle activeted">
                <i class="fa fa-users"></i>Trainers<i class="fas fa-chevron-down"></i>
            </a>
            <ul class="dropdown">
                <li>
                    <a class="item activeted1" href="add-trainer.php">
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

        <!-- ======================== start of add-trainer ======================== -->

        <div class="trainer-container">
            <fieldset>
                <legend>
                    <h2>Enter Trainer Details</h2>
                </legend>
                <form action="#" autocomplete="off" method="post" name="myForm" onsubmit="return trainerValidate()">

                    <div class="grid-inputs">

                        <div class="input-field">

                            <label for="tname">Trainer Name -</label> <br>
                            <input type="text" name="tname" id="tname">

                        </div>

                        <div class="input-field">

                            <label for="mail">Email -</label> <br>
                            <input type="email" name="mail" id="email">

                        </div>

                        <div class="input-field">

                            <label for="mobno">Mobile -</label> <br>
                            <input type="text" name="mobno" id="mobno" required>

                        </div>
                        <div class=" gender-field">

                            <label for="gender">Gender -</label> <br>
                            <input type="radio" name="gender" value="Male"><label for="male">Male</label>
                            <input type="radio" name="gender" value="Female"><label for="female">Female</label>
                            <input type="radio" name="gender" value="Other"><label for="other">Other</label>

                        </div>


                        <div class="input-field">

                            <label for="speciality">Speciality -</label> <br>
                            <input type="text" name="speciality" id="speciality">

                        </div>

                        <div class="input-field">

                            <label for="exp">Work Experience -</label> <br>
                            <input type="text" name="exp" id="experience">

                        </div>

                        <div class="input-field">

                            <label for="pass">Password -</label> <br>
                            <input type="text" name="pass" id="pwd">

                        </div>

                    </div>

                    <div class="package-desc">

                        <label for="address">Address -</label> <br>
                        <textarea name="address" id="address" cols="118" rows="6"></textarea>

                    </div>

                    <div class="flex-input">

                        <input type="submit" name="tsave" value="Save">
                        <input type="reset" name="reset" value="Clear">

                    </div>

                </form>

                <!-- ======================== PHP Code For Add Trainers ======================== -->


                <?php
                if (isset($_POST['tsave'])) {
                    // $conn = mysqli_connect("localhost", "root", "", "petworld");
                    include "conn.php";

                    $mobno = $_POST['mobno'];
                    $tname = $_POST['tname'];
                    $email = $_POST['mail'];
                    $gender = $_POST['gender'];
                    $speciality = $_POST['speciality'];
                    $exp = $_POST['exp'];
                    $pass = $_POST['pass'];
                    $address = $_POST['address'];

                    $addtrainer = "insert into addtrainer(mobno, tname, email,gender, speciality, exp, pass, address) values('$mobno','$tname','$email','$gender','$speciality','$exp','$pass','$address')";
                    $result = mysqli_query($conn, $addtrainer);

                    if ($result) {
                        echo '<script>';
                        echo 'swal( "Good Job","Trainer Added Sucessfully","success")';
                        echo '</script>';
                    } 
                    else {
                        echo '<script language="javascript">';
                        echo 'swal( "Sorry","Could not add a Trainer, Please Check all Fields","error")';
                        echo '</script>';
                    }
                }

                ?>

            </fieldset>
        </div>

        <!-- ======================== end of add-trainer ======================== -->




        <!-- ------------ custom javascript link ------------ -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

        <script src="./js/script.js"></script>
        <script src="./js/add_trainer_validation.js"></script>

    </div>

</body>

</html>
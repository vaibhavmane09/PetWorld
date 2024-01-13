<?php
ob_start();
session_start();
if (isset($_SESSION['mobno'])) {
    // $conn = mysqli_connect("localhost", "root", "", "petworld");
    include  "conn.php";

    $mobno = $_SESSION['mobno'];
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PetWorld-Trainer | Profile</title>

        <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">


        <!-- Sweet alert Box Script code -->
        <script src="../JS/sweetalert2.all.min.js"></script>


        <link rel="stylesheet" href="./CSS/trainer_style.css">

    </head>

    <body>
        <div class="side-bar">

            <div class="profile-img">

                <i class="fa fa-user"></i>

                <h5>Trainer</h5>
                <hr>
            </div>

            <!--Profile CODE ENDED HERE-->

            <div class="item">

                <a href="trainer_home.php">

                    <i class="fas fa-home"></i>Home

                </a>

            </div>

            <div class="item">

                <a class="dropdown-toggle">
                    <i class="fa fa-tasks"></i>Pet Progress<i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown">
                    <li>
                        <a class="item" href="pet_progress.php">
                            <i class="fa fa-plus"></i>Add Pet Progress
                        </a>

                    </li>

                    <li>

                        <a class="item" href="view_petprogress.php">
                            <i class="fa fa-eye"></i>View Pet Progress
                        </a>

                    </li>

                </ul>

            </div>

            <div class="item">

                <a class="item" href="./allocated_pet.php">

                    <i class="fas fa-dog"></i>Allocated Pet's

                </a>

            </div>

            <div class="item">

                <a class="item" href="./trainerFeedback.php">

                    <i class="fa fa-users"></i>Feedback

                </a>

            </div>

        </div>
        <div class="main-content">
            <header>
                <marquee behavior="alternate" scrollamount="10">
                    <h2>
                        <a href="#"><i class="fa fa-paw"></i> Pet<span>World</span>
                    </h2>
                </marquee>
                <div class="profile">
                    <a href="" class="activated1"><i class="fa fa-user"></i> MyProfile</a>
                </div>

            </header>
            <main>

                <!-- Body of Trainerr Profile -->

                <!--  Display trainer profile code---->
                <?php
                $sql = "select * from addtrainer where mobno='$mobno'";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($res);

                ?>

                <div class="profile-container">
                    <div class="col-1">

                        <div class="profile-img-and-name">

                            <h3>Hello, <span><input type="text" name="tname" value="<?php echo $row['tname']; ?>" readonly /></span></h3>

                            <i class="fa fa-user"></i>

                        </div>

                        <div class="chg-out">
                            <div class="chg-pwd-link">

                                <a href="trainer-change-pass.php">
                                    Change Password
                                </a>

                            </div>

                            <div class="logout-link">

                                <a href="../Users/logout.php">Log Out <i class="fa fa-sign-out"></i></a>

                            </div>
                        </div>

                    </div>


                    <!--  Display trainer profile code---->
                    <?php
                    $sql = "select * from addtrainer where mobno='$mobno'";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($res);

                    ?>
                    <div class="col-2">
                        <form action="#" method="post">
                            <div class="grid-inputs">

                                <div class="grid-input-field">
                                    <i class="fa fa-user fa-lg"></i>
                                    <input type="text" name="tname" value="<?php echo $row['tname']; ?>">
                                </div>

                                <div class="grid-input-field">
                                    <i class="fa fa-envelope fa-lg"></i>
                                    <input type="email" name="email" value="<?php echo $row['email']; ?>">
                                </div>

                                <div class="grid-input-field">
                                    <i class="fa fa-phone fa-lg"></i>
                                    <input type="text" name="mobno" value="<?php echo $row['mobno']; ?>" readonly>
                                </div>

                                <div class="grid-gender-field">
                                    <i class="fa fa-user fa-lg"></i>
                                    <input type="radio" name="gender" value="Male"><label for="male">Male</label>
                                    <input type="radio" name="gender" value="Female"><label for="female">Female</label>
                                    <input type="radio" name="gender" value="Other"><label for="other">Other</label>
                                </div>

                                <div class="grid-input-field">
                                    <i class="fa fa-address-book fa-lg"></i>
                                    <input type="text" name="speciality" value="<?php echo $row['speciality']; ?>">
                                </div>

                                <div class="grid-input-field">
                                    <i class="fa fa-address-book fa-lg"></i>
                                    <input type="text" name="exp" value="<?php echo $row['exp']; ?>">
                                </div>



                            </div>
                            <div class="address">
                                <textarea name="address" cols="30" rows="10" placeholder="Your Address"><?php echo $row['address']; ?></textarea>
                            </div>

                            <div class="profile-btn">
                                <input type="submit" name="update" value="Update" class="update-btn">
                                <input type="reset" name="clear" value="Cancel" class="clear-btn">
                            </div>

                    </div>
                    </form>
                </div>


                <!-- ---------End of Trainer Profile--------- -->



                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

            </main>




            <script src="../Admin/JS/script.js"></script>


        </div>
        </main>
        </div>

    </body>

    </html>


<?php
    if (isset($_POST['update'])) {
        $tname = $_POST['tname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $speciality = $_POST['speciality'];
        $exp = $_POST['exp'];
        $address = $_POST['address'];

        $sql = "update addtrainer set tname='$tname',email='$email',gender='$gender',speciality='$speciality',exp='$exp',address='$address' where mobno='$mobno'";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo '<script>';
            echo 'swal( "Good Job","Profile Updated Sucessfully","success")';
            echo '</script>';
            header("Refresh:3");
        } else {
            echo '<script>';
            echo 'swal( "Sorry","Your Profile not updated","error")';
            echo '</script>';
        }
    }
} else {

    header("location:../index.php");
}
?>
<?php
session_start();
if (isset($_SESSION['mobno'])) {
    include  "conn.php";

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PetWorld-Trainer | Change Passwrd</title>

        <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Sweet alert Box Script code -->
        <script src="../JS/sweetalert2.all.min.js"></script>

        <!-- Validation Codes Link -->
        <script src="../JS/change_pass_validate.js"></script>


        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

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
                    <a href="trainer-profile.php" class="activated1"><i class="fa fa-user"></i> MyProfile</a>
                </div>

            </header>
            <main>

                <!-- Body of Trainerr Change Password -->

                <div class="chg-pwd">

                    <form action="#" method="post" class="chg-pwd-form" autocomplete="off" name="myForm" onsubmit="return changePassword()">

                        <h2 class="title">Change Password</h2>

                        <div class="input-field">

                            <i class="fas fa-lock"></i>

                            <input type="password" name="oldpwd" placeholder="Old Password" id="oldpwd">

                        </div>

                        <div class="input-field">

                            <i class="fas fa-lock"></i>

                            <input type="password" name="newpwd" placeholder="New Password" id="newpwd">

                        </div>

                        <div class="input-field">

                            <i class="fas fa-lock"></i>

                            <input type="password" name="confpwd" placeholder="Confirm Password" id="confpwd">

                        </div>

                        <div class="chg-buttons">

                            <input type="submit" name="change" class="btns" value="Change">

                            <input type="Reset" class="btns" value="Clear">

                        </div>

                    </form>

                    <?php

                    if (isset($_POST['change'])) {
                        // $conn = mysqli_connect("localhost", "root", "", "petworld");

                        $oldpwd = $_POST['oldpwd'];
                        $newpwd = $_POST['newpwd'];
                        $confpwd = $_POST['confpwd'];
                        $mobno = $_SESSION['mobno'];
                        $cpquery = "select pass from addtrainer where mobno='$mobno'";
                        $result = mysqli_query($conn, $cpquery) or die('Could not execute query');
                        $row = mysqli_fetch_array($result);
                        $dbpwd = $row['pass'];
                        if ($oldpwd == $dbpwd) {
                            if ($newpwd == $confpwd && $oldpwd != $newpwd) {
                                $upquery = "update addtrainer set pass='$newpwd' where mobno='$mobno'";
                                $result = mysqli_query($conn, $upquery) or die("Could not execute the Query!");
                                if ($result == 1) {
                                    echo '<script>';
                                    echo 'swal("Good Job","Your Password is Updated Successfully!","success")';
                                    echo '</script>';
                                } else {
                                    echo '<script>';
                                    echo 'swal("Sorry","Your Password is Not Updated, Please Re-enter the Fields!","error")';
                                    echo '</script>';
                                }
                            } else {
                                echo '<script>';
                                echo 'swal("Sorry","Entered New Password and Confirm Password does not Matches!","error")';
                                echo '</script>';
                            }
                        } else {
                            echo '<script>';
                            echo 'swal("Sorry","Entered Old Password does not Matches!","error")';
                            echo '</script>';
                        }
                    }


                    ?>

                </div>


                <!-- ---------End of Trainer Change Password--------- -->



                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

            </main>




            <script src="../Admin/JS/script.js"></script>


        </div>
        </main>
        </div>

    </body>

    </html>

<?php

} else {

    header("location:../index.php");
}
?>
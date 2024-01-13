<?php
ob_start();
session_start();
if (isset($_SESSION['aname'])) {
    header("location:Admin/admin-home.php");
} elseif (isset($_SESSION['mobno'])) {
    header("location:Trainer/trainer_home.php");
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin / Trainer LogIn | ThePetWorld</title>
        <link rel="stylesheet" href="./CSS/style.css">
        <link rel="stylesheet" href="./CSS/admin_trainer_login.css">

        <!-- Sweet alert Box Script code -->
        <script src="JS/sweetalert2.all.min.js"></script>

        <link rel="shortcut icon" href="./IMG/fevicon.jpg" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <a href="#"><i class="fa fa-paw" aria-hidden="true"></i> Pet<span>World</span>
                        </a>
                    </div>
                    <nav>
                        <ul>
                            <li>
                                <a href="index.php"><i class="fa fa-home fa-lg"></i> HOME</a>
                            </li>
                            <li>
                                <a href="#">SERVICES <i class="fa fa-caret-down"></i></a>
                                <div class="sub-menu">
                                    <ul>
                                        <li><a href="training.php">Training</a></li>
                                        <li><a href="store.php">Store</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#">MORE <i class="fa fa-caret-down"></i></a>
                                <div class="sub-menu">
                                    <ul>
                                        <li><a href="about_us.php">About Us</a></li>
                                        <li><a href="contact_us.php">Contact Us</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="user_login_signup.php"><i class="fa fa-shopping-cart fa-lg"></i></a>
                            </li>
                            <li>
                                <h1>|</h1>
                            </li>
                            <li>
                                <a href="user_login_signup.php"><i class="fa fa-sign-in fa-lg"></i> LOGIN</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <hr>
            </div>
        </div>
        <!-- ------------ Body of Trainer and Admin LogIN ------------------ -->

        <div class="login-container" id="container">
            <div class="form-container sign-up-container">

                <form action="#" method="post" autocomplete="off">
                    <h1>Trainer LogIn</h1>
                    <div class="input-field">
                        <i class="fa fa-phone fa-lg"></i>

                        <input type="text" name="mobno" placeholder="Mobile">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock fa-lg"></i>

                        <input type="password" name="pass" placeholder="Password">
                    </div>
                    <input type="submit" name="tlogin" value="Sign In" class="login-btn">
                    <br>
                    <a class="forget-pass" href="./Trainer/send_otp.php">forget password?</a>

                </form>
            </div>

            <!-- Admin LogIn Starts Here -->

            <div class="form-container sign-in-container">
                <form action="#" method="post" autocomplete="off">
                    <h1>Admin LogIn</h1>
                    <div class="input-field">
                        <i class="fa fa-user fa-lg"></i>

                        <input type="text" name="aname" placeholder="Admin Name">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock fa-lg"></i>

                        <input type="password" name="pwd" placeholder="Password">
                    </div>
                    <input type="submit" name="alogin" value="Sign In" class="login-btn">
                    <br>
                </form>
            </div>

            <div class="overlay-container">

                <div class="overlay">

                    <div class="overlay-panel overlay-left">
                        <h1>Wel-Come Buddy!</h1>
                        <p>Please Enter Your Details and Let's Start Training!</p>
                        <h3>Are you a Admin?</h3><br>
                        <button class="ghost" id="signIn">Log In</button>
                    </div>

                    <div class="overlay-panel overlay-right">
                        <h1>Hello!</h1>
                        <p>Enter Your Details and See How we Grown!</p>
                        <h3>Are you a Trainer?</h3><br>
                        <button class="ghost" id="signUp">Log In</button>
                    </div>

                </div>

            </div>
        </div>

        <script type="text/javascript">
            const signUpButton = document.getElementById('signUp');
            const signInButton = document.getElementById('signIn');
            const container = document.getElementById('container');

            signUpButton.addEventListener('click', () => {
                container.classList.add("right-panel-active");
            });
            signInButton.addEventListener('click', () => {
                container.classList.remove("right-panel-active");
            });
        </script>

        <!-- End of Trainer and Admin LogIn -->


        <!-- =========  PHP Code for Admin LogIn  ========= -->
        <?php
        if (isset($_POST['alogin'])) {
            // $conn = mysqli_connect("localhost", "root", "", "petworld");
            include "conn.php";

            $aname = $_POST['aname'];

            $pwd = $_POST['pwd'];

            $select = "select *from admin where aname = '$aname' and pwd='$pwd'";

            $result = mysqli_query($conn, $select) or die("Counld not execute query!");


            if (mysqli_num_rows($result) == 1) {
                $_SESSION['aname'] = $aname;
                header("location:admin/admin-home.php");
                exit();
            } else {
                echo '<script>';
                echo 'swal("Sorry","Your Name or Password is wrong, Please check the deatils!", "error")';
                echo '</script>';
            }
        } elseif (isset($_POST['tlogin'])) {
            // $conn = mysqli_connect("localhost", "root", "", "petworld");
            include "conn.php";


            $mobno = $_POST['mobno'];

            $pass = $_POST['pass'];

            $select = "select *from addtrainer where mobno = '$mobno' and pass='$pass'";

            $result = mysqli_query($conn, $select) or die("Counld not execute query!");
            $row = mysqli_fetch_array($result);

            $blockstatus = $row['blockstatus'];
            if ($blockstatus == 'Block') {
                echo '<script>';
                echo 'swal("Sorry","Your account has been Blocked by the Admin","error")';
                echo '</script>';
            } else {

                if (mysqli_num_rows($result) == 1) {
                    $_SESSION['mobno'] = $mobno;
                    header("location:trainer/trainer_home.php");
                    exit();
                } else {
                    echo '<script>';
                    echo 'swal("Sorry","Your Name or Password is wrong, Please check the deatils!", "error")';
                    echo '</script>';
                }
            }
        }

        ?>

    </body>

    </html>


<?php

}
?>
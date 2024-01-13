<?php
ob_start();
session_start();
if (isset($_SESSION['mobno'])) {
    header("location:Users/Home-HTML/index.php");
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User LogIn/SignUp | ThePetWorld</title>
        <!-- CSS stylesheet link -->
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/user_login_signup.css">
        <!-- Favicon Image Link -->
        <link rel="shortcut icon" href="IMG/fevicon.jpg" type="image/x-icon">
        <!-- Fonts Link -->
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <!-- Sweet alert Box Script code -->
        <script src="JS/sweetalert2.all.min.js"></script>

        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <!-- header starts  -->
        <div class="header">
            <div class="container">
                <!-- navigation bar starts -->
                <div class="navbar">
                    <div class="logo">
                        <!-- <img src="IMG/logo.png" width="230px"> -->
                        <a href="#"><i class="fa fa-paw" aria-hidden="true"></i>Pet<span>World</span>
                        </a>
                    </div>
                    <nav>
                        <ul>
                            <li>
                                <a href="index.php"><i class="fa fa-home fa-lg"></i> HOME</a>
                            </li>
                            <li>
                                <a href="user_login_signup.php"><i class="fa fa-shopping-cart fa-lg"></i></a>
                            </li>
                            <li>
                                <h1>|</h1>
                            </li>
                            <li>
                                <a href="#" class="activeted"><i class="fa fa-sign-in fa-lg"></i> LOGIN</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <hr>
            </div>
        </div>
        <!-- <hr> -->

        <!-- ======================================================================== 
                                SIGN-IN section starts here 
    ========================================================================= -->


        <div class="sign-in-wrapper">

            <div class="forms-container">

                <div class="sign-in-sign-up">

                    <!-- ======================== user login form ======================== -->

                    <form action="#" class="user-sign-in-form" method="post" autocomplete="off">

                        <h2 class="title">User Log In</h2>

                        <div class="input-field">

                            <i class="fa fa-phone"></i>

                            <input type="text" name="mobno" placeholder="Mobile">

                        </div>

                        <div class="input-field">

                            <i class="fa fa-lock"></i>

                            <input type="password" name="pwd" placeholder="Password">

                        </div>

                        <input type="submit" name="usignin" value="Login" class="log-btn solid">

                        <a class="forget-pass" href="./Users/user_send_otp.php">

                            forget password?

                        </a>
                        <div class="admin-trainer">
                            <p>
                                <a href="admin_trainer_login.php">Are you Admin / Trainer ?</a>
                            </p>
                        </div>

                    </form>

                    <?php
                    if (isset($_POST['usignin'])) {
                        // $conn = mysqli_connect("localhost", "root", "", "petworld");
                        include "conn.php";

                        if (!$conn) {
                            die("Not connected");
                        } else {
                            $mobno = $_POST['mobno'];
                            $pwd = $_POST['pwd'];

                            $ulogin = "select *from users where mobno='$mobno' and pwd='$pwd'";
                            $result = mysqli_query($conn, $ulogin);
                            $row = mysqli_fetch_array($result);
                            $blockstatus = $row['blockstatus'];
                            if ($blockstatus == 'Block') {
                                echo '<script>';
                                echo 'swal("Sorry","Your account has been Blocked by the Admin","error")';
                                echo '</script>';
                            } else {
                                if (mysqli_num_rows($result) == 1) {
                                    $_SESSION['mobno'] = $mobno;
                                    header("location:Users/Home-HTML/index.php");
                                    exit;
                                } else {
                                    echo '<script>';
                                    echo 'swal("Sorry","Check your Mobile No. and Password again","error")';
                                    echo '</script>';
                                }
                            }
                        }
                    }
                    ?>




                    <!-- ======================== user signup form ======================== -->


                    <form action="#" method="post" class="user-sign-up-form" autocomplete="off" name="myForm" onsubmit="return formValidate()">
                        <h2 class="title">Create Account</h2>


                        <div class="grid-inputs">

                            <!-- first name -->
                            <div class="input-field">

                                <i class="fas fa-user"></i>

                                <input type="text" name="fname" placeholder="First Name" id="fname">

                            </div>

                            <!-- last name -->
                            <div class="input-field">

                                <i class="fa fa-user"></i>

                                <input type="text" name="lname" placeholder="Last Name" id="lname">

                            </div>

                            <!-- phone -->
                            <div class="input-field">

                                <i class="fas fa-phone"></i>

                                <input type="tel" name="mobno" placeholder="Phone" id="mobno">

                            </div>

                            <!-- email -->
                            <div class="input-field">

                                <i class="fas fa-envelope"></i>

                                <input type="email" name="email" placeholder="Email" id="email">

                            </div>

                            <!-- date of birth -->
                            <div class="input-field">

                                <i class="fa-solid fa-calendar"></i>

                                <input type="date" name="dob" id="dob">

                            </div>

                            <!-- dob -->
                            <div class="input-field">

                                <i class="fa fa-user"></i>

                                <input type="text" name="uname" id="uname" placeholder="User Name">


                            </div>

                            <!-- password -->
                            <div class="input-field">

                                <i class="fas fa-unlock"></i>

                                <input type="password" name="pwd" placeholder="Password" id="pwd">

                            </div>

                            <!-- confirm password -->
                            <div class="input-field">

                                <i class="fas fa-lock"></i>

                                <input type="password" name="conf-pwd" placeholder="Confirm Password" id="cpwd">

                            </div>

                        </div>

                        <div class="address">

                            <textarea name="address" cols="72" rows="3" placeholder="Address" id="address"></textarea>

                        </div>

                        <div class="flex-inputs">

                            <div class="t-c">

                                <input type="checkbox" name="t-c" id="t-c" required> I agree with Terms & Conditions

                            </div>

                            <input type="submit" name="usignup" value="Create Account" class="btn solid" id="sign-up-btn">


                        </div>

                    </form>



                </div>

            </div>

            <!-- ======================== PHP Code For The Create Form ======================== -->


            <?php
            if (isset($_POST['usignup'])) {
                // $conn = mysqli_connect("localhost", "root", "", "petworld");
                include "conn.php";

                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $mobno = $_POST['mobno'];
                $address = $_POST['address'];
                $dob = $_POST['dob'];
                $uname = $_POST['uname'];
                $pwd = $_POST['pwd'];

                $alreadyaccount = "select *from users where mobno='$mobno'";
                $result = mysqli_query($conn, $alreadyaccount) or die("Could not execute alredyaccount query");

                if (mysqli_num_rows($result) >= 1) {
                    echo '<script>';
                    echo 'swal("Sorry","Your Account Already present, Please Use SignIn","error")';
                    echo '</script>';
                } else {

                    $insertquery = "insert into users(mobno, fname, lname, email, address, dob, uname, pwd) values('$mobno','$fname','$lname','$email','$address','$dob','$uname','$pwd')";
                    $result = mysqli_query($conn, $insertquery);

                    if ($result == 1) {
                        echo '<script>';
                        echo 'swal( "Good Job","Registration Done Successfully","success")';
                        echo '</script>';
                    } else {
                        echo '<script language="javascript">';
                        echo 'swal( "Sorry","Could not Registration, Please Check Filled Details","error")';
                        echo '</script>';
                    }
                }
            }


            ?>


            <div class="panels-container">


                <!-- ===== left panel for admin login button ===== -->
                <div class="panel left-panel">

                    <div class="content">

                        <h3 class="title">

                            <!-- Are you <strong class="title">Admin</strong>? -->
                            Don't have an Account?

                        </h3>

                        <p>

                            If you don't have an account then click below button to SignUp

                        </p>

                        <button class="btn transparent" id="user-sign-up-btn">Sign Up</button>

                        <img class="img" src="./IMG/passing_by.svg" alt="">

                    </div>

                </div>


                <!-- ===== right panel for user login button ===== -->
                <div class="panel right-panel">

                    <div class="content">

                        <h3 class="title">

                            One of us?

                        </h3>

                        <p>

                            If you have already an account, then please click on below button to Login

                        </p>

                        <button class="btn transparent" id="user-sign-in-btn">Sign In</button>

                        <img class="img" src="./IMG/dog_walking.svg" alt="">

                    </div>

                </div>




            </div>


        </div>


        <!-- ======================================================================== 
                            SIGN-IN section ends here 
========================================================================= -->

        <script src="./JS/style.js"></script>
        <script src="./JS/validation.js"></script>

    </body>

    </html>
<?php
}

?>
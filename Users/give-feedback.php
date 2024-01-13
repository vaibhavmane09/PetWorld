<?php
ob_start();
session_start();
if (isset($_SESSION['mobno'])) {
    include "conn.php";
    $mobno  = $_SESSION['mobno'];


?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ThePetWorld-User | Feedback</title>
        <link rel="stylesheet" href="./CSS/Home-CSS/style.css">
        <link rel="stylesheet" href="./CSS/Home-CSS/navbar_footer.css">
        <link rel="stylesheet" href="./CSS/give-feedback.css">

        <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Sweet alert Box Script code -->
        <script src="../JS/sweetalert2.all.min.js"></script>


        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <!-- <img src="./IMG/logo.png" width="230px"> -->
                        <a href="#"><i class="fa fa-paw" aria-hidden="true"></i> Pet<span>World</span>
                        </a>
                    </div>
                    <nav>
                        <ul>
                            <li>
                                <a href="./Home-HTML/index.php"><i class="fa fa-home fa-lg"></i> HOME</a>
                            </li>
                            <li>
                                <a href="#">SERVICES <i class="fa fa-caret-down"></i></a>
                                <div class="sub-menu">
                                    <ul>
                                        <li><a href="./Home-HTML/training.php">Training</a></li>
                                        <li><a href="./Home-HTML/store.php">Store</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#" class="activeted">MORE <i class="fa fa-caret-down"></i></a>
                                <div class="sub-menu">
                                    <ul>
                                        <li><a href="./Home-HTML/about_us.php">About Us</a></li>
                                        <li><a href="./Home-HTML/contact_us.php">Contact Us</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="./view_orders.php"><i class="fa fa-shopping-cart fa-lg"></i></a>
                            </li>
                            <li>
                                <h1>|</h1>
                            </li>
                            <li>
                                <a href="user-profile.php"><i class="fa fa-user"></i> My Profile</a>

                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- End of Navigation -->

                <!-- ======================================================================== 
                                GIVE FEEDBACK section starts here 
    ========================================================================= -->

                <div class="give-feedback-container">

                    <div class="give-feedback-form">

                        <h2 class="title">Give Feedback
                            <hr>
                        </h2>


                        <?php
                        $sql = "select * from users where mobno='$mobno'";
                        $res = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($res);

                        ?>

                        <form action="#" method="post">

                            <div class="flex-inputs">

                                <div class="flex-input-field">

                                    <label for="name">Name:</label>

                                    <input type="text" name="name" value="<?php echo $row['fname'];
                                                                            echo " ";
                                                                            echo $row['lname']; ?>" id="name" readonly>

                                </div>

                                <div class="flex-input-field">

                                    <label for="mobno">Mobile:</label>

                                    <input type="tel" name="mobno" value="<?php echo $row['mobno']; ?>" id="phone" readonly>

                                </div>

                            </div>


                            <div class="feedback-on">

                                <label for="fon">Feedback On:</label>

                                <textarea name="fon" id="feedback-on" cols="150" rows="2"></textarea>

                            </div>

                            <div class="feedback-msg">

                                <label for="fmsg">Feedback Message:</label>

                                <textarea name="fmsg" id="feedbackmsg" cols="150" rows="4"></textarea>

                            </div>

                            <div class="rate">

                                <span>Ratings:</span>

                                <input type="radio" id="star5" name="frate" value="★★★★★" />
                                <label for="star5" title="text">5 stars</label>

                                <input type="radio" id="star4" name="frate" value="★★★★" />
                                <label for="star4" title="text">4 stars</label>

                                <input type="radio" id="star3" name="frate" value="★★★" />
                                <label for="star3" title="text">3 stars</label>

                                <input type="radio" id="star2" name="frate" value="★★" />
                                <label for="star2" title="text">2 stars</label>

                                <input type="radio" id="star1" name="frate" value="★" />
                                <label for="star1" title="text">1 star</label>

                            </div>

                            <div class="form-btns">

                                <input class="btn" type="submit" name="submit" value="Submit">

                                <input class="btn" type="reset" name="reset" value="Clear">

                            </div>


                        </form>

                        <?php
                        if (isset($_POST['submit'])) {
                            // $conn = mysqli_connect("localhost", "root", "", "petworld");
                            include "conn.php";
                            {
                                $name = $_POST['name'];
                                $mobno = $_POST['mobno'];
                                $fon = $_POST['fon'];
                                $fmsg = $_POST['fmsg'];
                                $frate = $_POST['frate'];

                                $insertquery = "insert into feedback(mobno, name, fon, fmsg, frate) values('$mobno','$name','$fon','$fmsg','$frate')";
                                $result = mysqli_query($conn, $insertquery);

                                if ($result == 1) {
                                    echo '<script>';
                                    echo 'swal( "Good Job","Your Message Sent Sucessfully","success")';
                                    echo '</script>';
                                } else {
                                    echo '<script language="javascript">';
                                    echo 'swal( "Sorry","Could not Send your Message, Please Check Filled Details","error")';
                                    echo '</script>';
                                }
                            }
                        }

                        ?>

                    </div>

                </div>

                <!-- ======================================================================== 
                                GIVE FEEDBACK section ends here 
    ========================================================================= -->



                <!-- ------------- Footer -------------- -->
                <div class="footer">
                    <div class="container">
                        <p class="copyright">Find Us On-
                            <a href="#"><i class="fa fa-facebook-square"> </i></a>

                            <a href="#"><i class="fa fa-twitter"></i></a>

                            <a href="#"><i class="fa fa-instagram"></i></a>

                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <br>
                            Copyright &copy; 2023 - ThePetWorld | All Rights Reserved!
                        </p>
                    </div>
                </div>
    </body>

    </html>

<?php
} else {
    header('Location:../index.php');
}

?>
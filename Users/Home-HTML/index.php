<?php

session_start();
if(isset($_SESSION['mobno']))
{
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThePetWorld | Training and Boarding</title>
    <!-- CSS stylesheet link -->
    <link rel="stylesheet" href="../CSS/Home-CSS/style.css">
    <!-- Favicon Image Link -->
    <link rel="shortcut icon" href="../../IMG/fevicon.jpg" type="image/x-icon">
    <!-- Fonts Link -->
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                            <a href="index.php" class="activeted"><i class="fa fa-home fa-lg"></i> HOME</a>
                        </li>
                        <li><a href="#">SERVICES <i class="fa fa-caret-down"></i></a>
                            <div class="sub-menu">
                                <ul>
                                    <li><a href="training.php">Training</a></li>
                                    <li><a href="store.php">Store</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="#">MORE <i class="fa fa-caret-down"></i></a>
                            <div class="sub-menu">
                                <ul>
                                    <li><a href="about_us.php">About Us</a></li>
                                    <li><a href="contact_us.php">Contact Us</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="../view_orders.php"><i class="fa fa-shopping-cart fa-lg"></i></a>
                        </li>
                        
                        <li>
                            <h1>|</h1>
                        </li>
                        <li>
                            <a href="../user-profile.php"><i class="fa fa-user"></i> My Profile</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <hr>
        </div>
    </div>
    <!-- <hr> -->
    <!-- First container -->
    <div class="container-1">
        <div class="row">
            <div class="col-2">
                <h1>Give Your <span>Pet's</span><br> A New Style!</h1>
                <p>It may be challenging to continuously prvide your pet's the attention and care <br> they may
                    require when your need a busy life!</p>
            </div>
            <div class="col-2">
                <!-- <img src="IMG/bg2.jpg"> -->
                <!-- <img src="./IMG/passing_by.svg"> -->
                <img src="../../IMG/shutterstock.webp">
            </div>
        </div>
    </div>
    <hr>
    <!-- ---------------  services ------------------ -->
    <div class="services">
        <h1> The Pet<span>World</span></h1>
        <div class="service-row">
            <img src="../../IMG/cat.jpg" class="service-1">
            <h3> ☆ Quality Dog and Cat Training</h3>
            <p>For over 5 years, we have been serving the pets and families of our local area. We love and connecting with animals and creating everlasting relationships. We provide training for your fur baby as if they were our own, and ensure that they receive the highest quality training.</p>
        </div>
        <div class="service-row">
            <img src="../../IMG/DogTraining.jpg" class="service-2">
            <h3> ☆ Reliable and Trustworthy Care Takers</h3>
            <p>For boarding and training: When you live a busy life, it is hard to consistently provide the attention and care that your pets can demand. With years of satisfied owners and loved pets, you can rely on us to care for your pets when you're away.</p>
        </div>
    </div>



    <!-- -------------- footer ------------- -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-3">
                    <h3>Usefull Links</h3>
                    <ul>
                        <li><a href="#">Customer Feedback</a></li>
                        <li><a href="#">Pet Caring</a></li>
                        <li><a href="#">Return Policy</a></li>
                        <li><a href="#">Wikipedia</a></li>
                    </ul>
                </div>
                <div class="footer-col-2">
                    
                    <a href="#"><i class="fa fa-paw" aria-hidden="true"></i>Pet<span>World</span>
                    </a>
                    <p>Our Purpose is to Sustainably Make the Plasure and<br> Benifits of Pet Accessible to the Many.</p>

                </div>

                <div class="footer-col-4">
                    <h3>Follow Us On</h3>
                    <ul>
                        <li><a href="https://www.facebook.com/">Facebook</a></li>
                        <li><a href="https://twitter.com/">Twitter</a></li>
                        <li><a href="https://www.instagram.com/">Instagram</a></li>
                        <li><a href="https://www.pinterest.com/">Pinterest</a></li>
                        <li><a href="https://www.youtube.com/">YouTube</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright &copy; 2023 - ThePetWorld | All Rights Reserved! </p>
        </div>
    </div>

    <!-- <script>
        function openNav() {
          document.getElementById("mySidebar").style.width = "250px";
          document.getElementById("main").style.marginRight = "250px";
        }
        
        function closeNav() {
          document.getElementById("mySidebar").style.width = "0";
          document.getElementById("main").style.marginRight= "0";
        }
        </script> -->
</body>

</html>
<?php

    }else{

        header("location:../../index.php");

    }?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | ThePetWorld</title>
    <link rel="stylesheet" href="./CSS/style.css">

    <link rel="shortcut icon" href="./IMG/fevicon.jpg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Sweet alert Box Script code -->
    <script src="JS/sweetalert2.all.min.js"></script>

    <!-- javascript Validation code link -->
    <script src="./JS/validation.js"></script>

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
                            <a href="index.php"><i class="fa fa-home fa-lg"></i> HOME</a>
                        </li>
                        <li><a href="#">SERVICES <i class="fa fa-caret-down"></i></a>
                            <div class="sub-menu">
                                <ul>
                                    <li><a href="training.php">Training</a></li>
                                    <li><a href="store.php">Store</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="#" class="activeted">MORE <i class="fa fa-caret-down"></i></a>
                            <div class="sub-menu">
                                <ul>
                                    <li><a href="about_us.php">About Us</a></li>
                                    <li><a href="contact_us.php" class="activeted">Contact Us</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="user_login_signup.php"><i class="fa fa-shopping-cart fa-lg"></i></a></li>
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
    <!-- ------------ Body of Contact Us ------------------ -->
    <section>
        <div class="ContactContainer">
            <div class="contactInfo">
                <div>
                    <h2> Contact Info</h2>
                    <hr>
                    <ul class="info">
                       <li>
                            <p><i class="fa fa-envelope-o fa-lg"></i> </p>
                            <span> thepetworld@gmail.com </span>
                            <br>
                        </li>
                        <li>
                            <p><i class="fa fa-phone fa-2x"></i></p>
                            <span> +91- 9985859090 </span>
                        </li>
                    </ul>
                    
                    <ul class="sci">
                        <li><a href="#"> <i class="fa fa-facebook-square"></i></a></li>
                        
                        <li><a href="#"> <i class="fa fa-twitter"></i></a></li>
                        
                        <li><a href="#"> <i class="fa fa-instagram"></i></a></li>
                        
                        <li><a href="#"> <i class="fa fa-telegram"></i></a></li>

                        <li><a href="#"> <i class="fa fa-pinterest"></i></a></li>
                        
                        <li><a href="#"> <i class="fa fa-youtube-play"></i></a></li>
                        
                    </ul>

                    
                </div>
                
                <div class="map">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3829.5533912651804!2d74.52697957500966!3d16.294644484417965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc094f166cf6d71%3A0xfd9fba3e675c5744!2sNidasoshi%20Gate%20Bus%20Stop!5e0!3m2!1sen!2sin!4v1687805965886!5m2!1sen!2sin" width="300" height="150" style="border:0;" allowfullscreen=""  referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
            </div>

            <div class="contactForm">
                <h2>We Eagar to Here From You ...</h2>
                <form class="formBox" action="#" autocomplete="off" method="post" name="myForm" onsubmit="return contactValidate()">

                    <div class="inputBox w50">
                        <input type="text" name="fname" id="fname" placeholder="First Name" />
                    </div>

                    <div class="inputBox w50">
                        <input type="text" name="lname" id="lname" placeholder="Last Name"/>
                    </div>
                    <div class="inputBox w50">
                        <input type="text" name="email" id="email" placeholder="E-Mail Address" />
                    </div>
                    <div class="inputBox w50">
                        <input type="tel" name="mobno" id="mobno" placeholder="Mobile Number"/>
                    </div>
                    <div class="inputBox w100">
                        <textarea name="msg" id="msg" placeholder="Leave A Note Here... " ></textarea>
                    </div>
                    <div class="inputBox w100">
                        <input type="submit" name="contact" value="Send" />
                    </div>
                </form>

                <!-- ======================== PHP Code For Contact US ======================== -->


<?php
if(isset($_POST['contact']))
{
	// $conn = mysqli_connect("localhost","root","","petworld");
    include "conn.php";

    {
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$mobno=$_POST['mobno'];
		$msg=$_POST['msg'];
		
		$insertquery = "insert into contactus(fname, lname, email, mobno, msg) values('$fname','$lname','$email','$mobno','$msg')";
        $result = mysqli_query($conn,$insertquery);

		if($result)
		{
			echo '<script>';
		        echo 'swal( "Good Job","Your Message Sent Sucessfully","success")';   
            echo '</script>';
		}
        else
        {
			echo '<script language="javascript">';
		        echo 'swal( "Sorry","Could not Send your Message, Please Check Filled Details","error")';   
            echo '</script>';

		}
		
	}
		
}

?>


            </div>
        </div>
    </section>

    <!-- -------------- Footer ------------- -->
    <div class="footer">
        <div class="container">
            <p class="copyright">
                Copyright &copy; 2023 - ThePetWorld | All Rights Reserved!
            </p>
        </div>
    </div>

</body>

</html>
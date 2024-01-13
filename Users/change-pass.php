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
    <title>ThePetWorld-User | Change Password</title>
    <link rel="stylesheet" href="./CSS/Home-CSS/style.css">
    <link rel="stylesheet" href="./CSS/Home-CSS/navbar_footer.css">
    <link rel="stylesheet" href="./CSS/change-pass.css">

    <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

     <!-- Sweet alert Box Script code -->
     <script src="../JS/sweetalert2.all.min.js"></script>
     <!-- Validation Codes Link -->
     <script src="../JS/change_pass_validate.js"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                            <a href="#">MORE <i class="fa fa-caret-down"></i></a>
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
                            <a href="./user-profile.php" class="activeted"><i class="fa fa-user"></i> My Profile</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- End of Navigation -->

            <!-- ---------Body of Change Password--------- -->

            <div class="chg-pwd">

                <form action="#" class="chg-pwd-form" autocomplete="off " method="post" name="myForm" onsubmit="return changePassword()" >
                
                    <h2 class="title">Change Password</h2>
            
                    <div class="input-field">
            
                        <i class="fas fa-lock"></i>
                        
                        <input type="password" name="oldpwd" placeholder="Old Password" id="
                        oldpwd">
                        
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

                    if(isset($_POST['change']))
                    {
                    //    $conn= mysqli_connect("localhost","root","","petworld");
                    include "conn.php";
                      
                       {
                            $oldpwd=$_POST['oldpwd'];
                            $newpwd=$_POST['newpwd'];
                            $confpwd=$_POST['confpwd'];
                            $mobno=$_SESSION['mobno'];
                            $cpquery="select pwd from users where mobno='$mobno'";
                            $result=mysqli_query($conn,$cpquery) or die('Could not execute query');
                            $row=mysqli_fetch_array($result);
                            $dbpwd=$row['pwd'];
                            if($oldpwd == $dbpwd)
                            {
                                if($newpwd == $confpwd && $oldpwd!=$newpwd)
                                {
                                    $upquery="update users set pwd='$newpwd' where mobno='$mobno'";
                                    $result=mysqli_query($conn,$upquery) or die("Could not execute the Query!");  
                                    if($result==1)
                                    {
                                        echo '<script>';
                                            echo 'swal("Good Job","Your Password is Updated Successfully!","success")';		 
                                        echo '</script>';
                                    }
                                    else{
                                        echo '<script>';
                                            echo 'swal("Sorry","Your Password is Not Updated, Please Re-enter the Fields!","error")';		 
                                        echo '</script>';
                                    }

                                }
                                else{
                                    echo '<script>';
                                        echo 'swal("Sorry","Entered New Password and Confirm Password does not Matches!","error")';		 
                                    echo '</script>';
                                }
                            }
                            else{
                                echo '<script>';
                                    echo 'swal("Sorry","Entered Old Password does not Matches!","error")';		 
                                echo '</script>';
                            }

                       }
                    }

                ?>

            
            </div>


            <!-- ---------Body of Change Password--------- -->

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

    }
    else{

        header("location:../index.php");

    }
?>

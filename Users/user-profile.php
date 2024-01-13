<?php
ob_start();
session_start();
if(isset($_SESSION['mobno']))
{   
   include "conn.php";
   $mobno  = $_SESSION['mobno'];


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThePetWorld-User | Profile</title>
    <link rel="stylesheet" href="./CSS/Home-CSS/style.css">
    <link rel="stylesheet" href="./CSS/Home-CSS/navbar_footer.css">
    <link rel="stylesheet" href="./CSS/user-profile.css">

    <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                            <a href="user-profile.php" class="activeted"><i class="fa fa-user"></i> My Profile</a>
                            
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- End of Navigation -->

            <!-- ---------Body of User Profile--------- -->
<?php
 $sql="select * from users where mobno='$mobno'";
 $res = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($res);

?>

            <div class="profile-container">
                <div class="col-1">

                    <div class="profile-img-and-name">

                        <h3>Hello,<span><input type="text" name="fname" value="<?php echo $row['fname'];?>" readonly /></span></h3>

                        <i class="fa fa-user"></i>

                    </div>

                    <div class="add-pet">

                        <p>
                            Pet Details
                        </p>
                        <a href="add-pet.php">Add</a>
                        <a href="view-pet.php">View</a><br><br>
                        <a href="view-pet-progress.php">Check Pet Progress</a>

                    </div>

                    <div class="add-pet">

                        <p>
                            Feeedback
                        </p>
                        <a href="give-feedback.php">Give</a>
                        <a href="view-feedback.php">View</a><br>

                    </div>
                    
                    
                    <div class="chg-out">
                        <div class="chg-pwd-link">

                            <a href="./change-pass.php">
                                Change Password
                            </a>
    
                        </div>
    
                        <div class="logout-link">
    
                            <a href="logout.php">Log Out <i class="fa fa-sign-out"></i></a>
    
                        </div>
                    </div>

                </div>

<!--  Display user profile code---->
<?php
 $sql="select * from users where mobno='$mobno'";
 $res = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($res);

?>

                <div class="col-2">
                <form method="POST">
                    <div class="grid-inputs">

                        <div class="grid-input-field">
                            <i class="fa fa-user fa-lg"></i>
                            <input type="text" name="fname" value="<?php echo $row['fname'];?>">
                        </div>
                        <div class="grid-input-field">
                            <i class="fa fa-user fa-lg"></i>
                            <input type="text" name="lname" value="<?php echo $row['lname'];?>">
                        </div>
                        <div class="grid-input-field">
                            <i class="fa fa-address-book fa-lg"></i>
                            <input type="text" name="uname" value="<?php echo $row['uname'];?>">
                        </div>
                        <div class="grid-input-field">
                            <i class="fa fa-calendar fa-lg"></i>
                            <input type="text" name="dob" value="<?php echo $row['dob'];?>">
                        </div>
                        <div class="grid-input-field">
                            <i class="fa fa-envelope fa-lg"></i>
                            <input type="email" name="email" value="<?php echo $row['email'];?>">
                        </div>
                        <div class="grid-input-field">
                            <i class="fa fa-phone fa-lg"></i>
                            <input type="text" name="mobno" value="<?php echo $row['mobno'];?>" readonly>
                        </div>

                    </div>
                    <div class="address">
                        <textarea name="address" cols="30" rows="10"><?php echo $row['address'];?></textarea>
                    </div>

                    <div class="profile-btn">
                        <input type="submit" name="update" value="Update" class="update-btn">
                        <input type="reset" name="clear" value="Cancel" class="clear-btn">
                    </div>
                </div>
            </form>
            </div>


            <!-- ---------End of User Profile--------- -->

           
</body>

</html>

<?php
if(isset($_POST['update']))
{
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $uname = $_POST['uname'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $address = $_POST['address'];

  $sql = "update users set fname='$fname',lname='$lname',uname='$uname',dob='$dob',email='$email',address='$address' where mobno='$mobno'";
  $res = mysqli_query($conn,$sql);
  if($res)
  {
    echo '<script>';
        echo 'swal( "Good Job","Profile Updated Sucessfully","success")';   
    echo '</script>';
     header("Refresh:3");

  }
  else
  {
    echo '<script>';
        echo 'swal( "Sorry","Your Profile not updated","error")';   
    echo '</script>';
  }


}

}
else
{
    header('Location:../index.php');
}





?>
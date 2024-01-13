<?php
    session_start();
    if(isset($_SESSION['aname']))
    {
        include "conn.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetWorld | Change-Password</title>

    <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Sweet alert Box Script code -->
    <script src="../JS/sweetalert2.all.min.js"></script>


    <link rel="stylesheet" href="./CSS/style.css">
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
            
            <a class="dropdown-toggle">
                <i class="fa fa-users"></i>Trainers<i class="fas fa-chevron-down"></i>
            </a>
            <ul class="dropdown">
                <li>
                    <a class="item" href="add-trainer.php">
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
            <a class="dropdown-toggle activeted">
                <i class="fa fa-gear"></i>Settings<i class="fas fa-chevron-down"></i>
            </a>
    
            <ul class="dropdown">
                <li>
                    
                    <a class="item activeted1" href="#">
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

        <!-- ======================== start of change-password ======================== -->



<div class="chg-pwd">

    <form action="#" method="post" class="chg-pwd-form" autocomplete="off ">
    
        <h2 class="title">Change Password</h2>

        <div class="input-field">

            <i class="fas fa-lock"></i>
            
            <input type="password" name="oldpwd" placeholder="Old Password">
            
        </div>
        
        <div class="input-field">

            <i class="fas fa-lock"></i>
            
            <input type="password" name="newpwd" placeholder="New Password">
            
        </div>
        
        <div class="input-field">

            <i class="fas fa-lock"></i>
            
            <input type="password" name="confpwd" placeholder="Confirm Password">

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
        $aname=$_SESSION['aname'];
        $cpquery="select pwd from admin where aname='$aname'";
        $result=mysqli_query($conn,$cpquery) or die('Could not execute query');
        $row=mysqli_fetch_array($result);
        $dbpwd=$row['pwd'];
        if($oldpwd == $dbpwd)
        {
            if($newpwd == $confpwd && $oldpwd!=$newpwd)
            {
                $upquery="update admin set pwd='$newpwd' where aname='$aname'";
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



<!-- ======================== end of change-password ======================== -->




<!-- custom javascript link -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script src="./js/script.js"></script>

    </div>

</body>

</html>

<?php

    }
    else{

        header("location:../index.php");

    }
?>
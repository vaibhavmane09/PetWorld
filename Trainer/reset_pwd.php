<?php
ob_start();
session_start();
// $mobno= $_SESSION['mobno'];
// $conn = mysqli_connect("localhost", "root", "", "petworld");
include  "conn.php";


?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>PetWorld - Forgot Password</title>
    <link rel="stylesheet" href="CSS/forgot_pass.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Sweet alert Box Script code -->
    <script src="../JS/sweetalert2.all.min.js"></script>

    <!-- Validation Codes Link -->
    <script src="../JS/change_pass_validate.js"></script>


</head>

<body>
    <!-- New Password Set Code -->
    <form action="" method="post" name="myForm" onsubmit="return changePassword()">
        <div class="wrapper">
            <div class="logo">
                <a href="#"><i class="fa fa-paw" aria-hidden="true"></i>Pet<span>World</span></a>
            </div>
            <hr>
            <h1>Forgot Password</h1>
            <h3>Reset the Password</h3>
            <div class="inputs">
                <div class="field">
                    <span class="material-icons">lock</span>
                    <input type="text" placeholder="Enter New Password" name="pass" id="newpwd">
                    <br><br>
                    <span class="material-icons">lock</span>
                    <input type="text" placeholder="Confirm New Password" name="cpass" id="confpwd">
                </div><br><br>
                <button type="submit" name="submit">Submit</button>
            </div>
            <div class="link1">
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $mobno = $_GET['mobno'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        if ($pass == $cpass) {
            $sql = "update addtrainer set pass='$pass' where mobno='$mobno'";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                echo '<script>';
                echo 'swal("Good Job","Your Password is Reset Successfully!","success")';
                echo '</script>';
            }
        } else {
            echo '<script>';
            echo 'swal("Sorry","Entered New Password and Confirm Password does not Matches!","error")';
            echo '</script>';
        }
    }
    ?>
</body>

</html>
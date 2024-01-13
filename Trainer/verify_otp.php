<?php

ob_start();
session_start();
// $mobno= $_SESSION['mobno'];
// $conn = mysqli_connect("localhost", "root", "", "petworld");
include  "conn.php";





if (isset($_POST['verify'])) {
    $otp = $_POST['otp'];
    $mobno = $_GET['mobno'];
    $query = "select *from otp_mapping where mobile_no='$mobno'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $otp_number = $row['otp_number'];

    if ($otp == $otp_number) {
        $query = "delete from otp_mapping where mobile_no='$mobno'";
        mysqli_query($conn, $query);
        header("location:reset_pwd.php?mobno=$mobno");
        exit;
    } else {
        echo "
            <script>
            alert('enter correct otp');
            </script>";
    }
}


?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>PetWorld - Forgot Password</title>
    <link rel="stylesheet" href="CSS/forgot_pass.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



</head>

<body>

    <!-- OTP Configuration -->
    <div class="wrapper">
        <div class="logo">
            <a href="#"><i class="fa fa-paw" aria-hidden="true"></i>Pet<span>World</span></a>
        </div>
        <hr>
        <h1>Forgot Password</h1>
        <h3>Verify the Account</h3>
        <div class="inputs">
            <div class="field">
                <form action="#" method="post">
                    <span class="material-icons">transcribe</span>
                    <input type="text" name="otp" placeholder="Enter OTP">
            </div>
            <!-- <input type="submit" name="verify" value="Verify"> -->
            <button type="submit" name="verify">Verify</button>
            </form>
        </div>
        <div class="link1">
            <p>Back to Login &gt; &nbsp;<a href="../admin_trainer_login.php">Click Here!</a></p>
        </div>
    </div>




</body>

</html>
<?php

ob_start();
session_start();
// $mobno= $_SESSION['mobno'];
// $conn = mysqli_connect("localhost", "root", "", "petworld");
include "conn.php";

?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>PetWorld - Forgot Password</title>
    <link rel="stylesheet" href="CSS/forgot_pass.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

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
                <form action="#" method="post" autocomplete="off">
                    <span class="material-icons">transcribe</span>
                    <input type="text" name="otp" placeholder="Enter OTP">
            </div>
            <input type="submit" id="resend_otp" name="resend_otp" value="Resend Otp">
            <button type="submit" id="verify_otp" name="verify">Verify</button>
            </form>
        </div>
        <div class="link1">
            <p>Back to Login &gt; &nbsp;<a href="../user_login_signup.php">Click Here!</a></p>
        </div>
    </div>
    <?php
    if (isset($_POST['resend_otp'])) {
        $mobno = $_GET['mobno'];

        $query1="delete from otp_mapping where mobile_no='$mobno'";
        mysqli_query($conn,$query1);

        include_once 'textlocal.class.php';

        $conn = mysqli_connect("localhost", "root", "", "petworld");

        $mobileNumber = $mobno;
        $otpNumber = mt_rand(1999, 9999);
        // $_SESSION['mobno']=$mobileNumber;


        // $createdDate=date("Y/m/d");       						
        // $createdDate= date('Y/m/d H:i:s-a');     						 
        //$date =date_default_timezone_set('Asia/Kolkata');
        //If you want Day,Date with time AM/PM						
        // $createdDate= date("Y/m/d g:i:s A");
        // $createdDate= date("Y-m-d g:i:s");	



        $Textlocal = new Textlocal(false, false, 'NzllNjkxZDJhZGFkMTExYzA1OTRkZTlkMWE3ZWRhNzc=');
        //Sending OTP to Customer Mobile Number						
        //$numbers = array(919325105363);
        $numbers = array("91" . $mobileNumber);

        //Dont Change $sender and $message it approved from template

        $sender = 'CODPLX';
        $message = 'OTP Mangeshi Aqua App is ' . $otpNumber . ' do not share - Codeplux Technologies';

        $Textlocal->sendSms($numbers, $message, $sender);
        $sql = "INSERT INTO  otp_mapping(mobile_no,otp_number) 
        VALUES(
        '$mobileNumber',
        '$otpNumber')";
        mysqli_query($conn, $sql);


        header("location:user_verify_otp.php?mobno=$mobno");
        exit;
    } 
    else if (isset($_POST['verify'])) {
        $otp = $_POST['otp'];
        $mobno = $_GET['mobno'];
        $query = "select *from otp_mapping where mobile_no='$mobno'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $otp_number = $row['otp_number'];

        if ($otp == $otp_number) {
            $query = "delete from otp_mapping where mobile_no='$mobno'";
            mysqli_query($conn, $query);
            header("location:user_reset_pwd.php?mobno=$mobno");
            exit;
        } 
        else {
            echo "
                <script>
                alert('enter correct otp');
                </script>";
        }
    }

    ?>



</body>

</html>
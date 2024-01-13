<?php
ob_start();
session_start();
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



</head>

<body>
    <div class="wrapper">
        <div class="logo">
            <a href="#"><i class="fa fa-paw" aria-hidden="true"></i>Pet<span>World</span></a>
        </div>
        <hr>
        <h1>Forgot Password</h1>
        <h3>Recover your Account.</h3>
        <div class="inputs">
            <form action="#" method="post">
                <div class="field">
                    <!-- <span><i class="fa fa-phone"></i></span> -->
                    <span class="material-icons">phone</span>
                    <input type="text" name="mobno" placeholder="Enter your Mobile Number">
                </div>
                <!-- <button type="submit" name="submit">Send</button> -->
                <input type="submit" name="send" value="Send" id="send-btn">
            </form>

            <?php
            if (isset($_POST['send'])) {
                $mobno = $_POST['mobno'];
                include_once 'textlocal.class.php';

                // $conn = mysqli_connect("localhost", "root", "", "petworld");
                include  "conn.php";


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


                header("location:verify_otp.php?mobno=$mobno");
                exit;
            }


            ?>

        </div>
        <div class="link1">
            <p>Back to Login &gt; &nbsp;<a href="../admin_trainer_login.php">Click Here!</a></p>
        </div>
    </div>

</body>

</html>
<?php
session_start();
//  $conn=mysqli_connect("localhost","root","","petworld");
include "conn.php";

	
	$petid=$_POST['petid'];

	
	$query1="update pets set payment_status='Paid' where petid='$petid'";
	mysqli_query($conn,$query1) or die ('could not perfrom query');
   


?>
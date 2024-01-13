<?php
session_start();
//  $conn=mysqli_connect("localhost","root","","petworld");
include "./conn.php";

if(isset($_POST['product_id']) && isset($_POST['user_name'])){
	
	$added_on=date('Y-m-d h:i:s');
    $user_mobno=$_POST['user_mobno'];
    $product_id=$_POST['product_id'];
	$user_name=$_POST['user_name'];
    $address=$_POST['address'];
    $product_name=$_POST['product_name'];
	$product_price=$_POST['product_price'];
	$qty=$_POST['qty'];
	$total_amt=$_POST['total_amt'];
    
    $payment_status="pending";
    $delivery_status="pending";
	$payment_id=$_POST['payment_id'];
    
	
	$query1="insert into orders(order_date,user_mobno,user_name,address,product_id,product_name,product_price,quantity,total_amt,pay_status,delivery_status) values('$added_on','$user_mobno','$user_name','$address','$product_id','$product_name','$product_price','$qty','$total_amt','Complete','Pending')";
	mysqli_query($conn,$query1) or die ('could not perfrom query');
   
		
}



?>
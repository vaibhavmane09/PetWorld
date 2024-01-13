<?php
$tname=$_REQUEST['tname'];
   //  $conn = mysqli_connect("localhost", "root", "", "petworld");
   include "conn.php";

	$query="select *from addtrainer where tname='$tname'";

	$result=mysqli_query($conn,$query);
   $data="";
   while($row=mysqli_fetch_array($result))
   {
	
	$data=":".$row['mobno'];
   }
	
	echo $data;
?>
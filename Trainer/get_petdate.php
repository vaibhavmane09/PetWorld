<?php
$petid=$_REQUEST['petid'];
    // $conn = mysqli_connect("localhost", "root", "", "petworld");
    include  "conn.php";

	$query="select *from pets where petid='$petid'";

	$result=mysqli_query($conn,$query);

    




   $data="";
   while($row=mysqli_fetch_array($result))
   {

    $mobno=$row['mobno'];
    $query1="select *from users where mobno='$mobno'";

	$result1=mysqli_query($conn,$query1);
    $row1=mysqli_fetch_array($result1);

    $fulname=$row1['fname']." ".$row1['lname'];
   
	
	$data=":".$row['pet'].":".$row['pname'].":".$row['breed'].":".$row['mobno'].":".$row['traintype'].":".$fulname.":".$row['duration'];
   }
	
	echo $data;
?>
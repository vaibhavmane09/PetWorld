		
		<?php		
		/*
		 * Following code will ganerate a otp for mobileNumber
		 * All user details details are read from HTTP Post Request
		 */		
		 		// array for JSON response
		 		$response = array();
				 // include db connect class
		 		require_once __DIR__ . '/cofig.php';
		 		
		 		// include Textlocal class
				//require('Textlocal.class.php'); 
				include_once 'textlocal.class.php';	 		
 		
 		
				// check for required fields
				if (true)  //_REQUEST	
						{
     				
     						  $mobileNumber=9008859518; 
     						  $otpNumber=mt_rand(1999,9999);    						  
     						  
     						  
     						  
     						 // $createdDate=date("Y/m/d");       						
     						// $createdDate= date('Y/m/d H:i:s-a');     						 
     					//$date =date_default_timezone_set('Asia/Kolkata');
						//If you want Day,Date with time AM/PM						
						// $createdDate= date("Y/m/d g:i:s A");
						// $createdDate= date("Y-m-d g:i:s");	
						 
						date_default_timezone_set('Asia/Kolkata');
						$createdDate = date("Y-m-d h:i:s");					
						 
     						 		 		 
 					          $false=0;
     						  $true=1;     						  
     						  
     						  	
     						  	$Textlocal = new Textlocal(false, false, 'NzllNjkxZDJhZGFkMTExYzA1OTRkZTlkMWE3ZWRhNzc='); 
			     						  //Sending OTP to Customer Mobile Number						
								//$numbers = array(919325105363);
									$numbers = array("91".$mobileNumber);	
                                
								     //Dont Change $sender and $message it approved from template
									 
									$sender = 'CODPLX';										
									$message ='OTP Mangeshi Aqua App is '.$otpNumber.' do not share - Codeplux Technologies';
								  
									$Textlocal->sendSms($numbers, $message, $sender);					
									
									
			
					     				
     				      

						// Check connection
						if (mysqli_connect_errno())
						  {
						  echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}
						else
						
						
						{
						
						 				
						
						   $sqlRowExit="SELECT * FROM otp_mapping WHERE mobile_no='$mobileNumber' ";
						   
						   $resultExit = mysqli_query($con,$sqlRowExit);						   
						   
							$num_rows = mysqli_num_rows($resultExit);
							
							if ($num_rows > 0) {
							  //----------------Update Record 							  
							// echo "Update Record !";
							
							
						$sql_update = "UPDATE otp_mapping SET  is_active='$false' WHERE mobile_no='$mobileNumber'";
			
			                              if(mysqli_query($con,$sql_update ))
			                              {
								    // echo "Data Saved Successfully!"; 
								    
								   //echo "UpdateInsertRecord ";
									
									$sqlUpdateInsert="INSERT INTO  otp_mapping(mobile_no,otp_number,created_at,is_active) 
									VALUES(
									'$mobileNumber',
									'$otpNumber',
									'$createdDate',							
									'$true')";
									
								 						
								if(mysqli_query($con,$sqlUpdateInsert))
								{
								    // echo "Data Saved Successfully!";  
								    
								   
								    
								    
								    // successfully inserted into database
		       							 $response["success"] = 1;
		       							 $response["message"] = "Successfully Update-Inserted OTP  Record ."; 
		       							   // echoing JSON response
		       							 echo json_encode($response);             
								}
								
								else
								{
								// failed to UpdateInsertRecord row
		       						 $response["success"] = 0;
		       						 $response["message"] = "Error While Update-Inserting OTP  Record .";        
		        					// echoing JSON response
		        					echo json_encode($response);
								}
				
					          }
							  
					   }
							
					else 
					  {
							
							  //--------- Insert Record 
							//echo "Insert Record ";
							
		                                   $sql="INSERT INTO  otp_mapping(mobile_no,otp_number,created_at,is_active) 
							VALUES(
							'$mobileNumber',
							'$otpNumber',
							'$createdDate',							
							'$true')";
							
						 						
						if(mysqli_query($con,$sql))
							{
							    // echo "Data Saved Successfully!";  
							
							    
							    // successfully inserted into database
	       							 $response["success"] = 1;
	       							 $response["message"] = "Successfully Inserted OTP Record."; 
	       							   // echoing JSON response
	       							 echo json_encode($response);             
							}
							
							else
							{
							// failed to insert row
	       						 $response["success"] = 0;
	       						 $response["message"] = "Error While Inserting OTP Record .";        
	        					// echoing JSON response
	        					echo json_encode($response);
							}
						
					      }	
					   }	
					
					}
					else {
				    // required field is missing
				    $response["success"] = 0;
				    $response["message"] = "Required field(s) is missing";
				
				    // echoing JSON response
				    echo json_encode($response);
				}		
					
					
					
			?>

  

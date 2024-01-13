<?php
    ob_start();
    session_start();
    if(isset($_SESSION['mobno']))
    {
        // $conn= mysqli_connect("localhost","root","","petworld");
        include  "conn.php";

        $mobno = $_SESSION['mobno'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetWorld-Trainer | View Pet Progress</title>

    <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="./CSS/trainer_style.css">

    <!-- Sweet alert Box Script code -->
    <script src="../JS/sweetalert2.all.min.js"></script>



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

            <a href="./trainer_home.php" >

                <i class="fas fa-home"></i>Home

            </a>

        </div>

        <div class="item ">

            <a class="dropdown-toggle activeted">
                <i class="fa fa-tasks"></i>Pet Progress<i class="fas fa-chevron-down"></i>
            </a>
            <ul class="dropdown">
                <li>
                    <a class="item " href="./pet_progress.php">
                        <i class="fa fa-plus"></i>Add Pet Progress
                    </a>

                </li>

                <li>

                    <a class="item activeted1" href="./view_petprogress.php">
                        <i class="fa fa-eye"></i>View Pet Progress
                    </a>

                </li>

            </ul>

        </div>

        <div class="item">

            <a class="item" href="./allocated_pet.php">

                <i class="fas fa-dog"></i>Allocated Pet's

            </a>

        </div>

        <div class="item">

            <a class="item" href="./trainerFeedback.php">

                <i class="fa fa-users"></i>Feedback

            </a>

        </div>

       

        

    </div>
    <div class="main-content">
        <header>
            <marquee behavior="alternate" scrollamount="10">
                <h2>
                    <a href="#"><i class="fa fa-paw"></i> Pet<span>World</span>
                </h2>
            </marquee>

            <div  class="profile">
                <a href="trainer-profile.php"><i class="fa fa-user"></i> MyProfile</a>
            </div>

        </header>

        <!-- ======================== start of add-products ======================== -->
        <div class="pet-progress-container">
            <div class="progress">
                <h2>Pet Progress Details</h2>
                <table border="1px solid red">
                    <tr>
                        <th>Sr.</th>
                        <th>Pet Name</th>
                        <th>Pet Owner</th>
                        <th>Pet Category</th>
                        <th>Package Name</th>
                        <th>Start Date</th>
                        <th>Duration-</th>
                        <th>Progress Status</th> 
                        <th>Package Description</th>    
                        <th colspan="2">Action</th>
                    </tr>

                    <?php
                        $fquery="select *from petprogress where trainer_mobno='$mobno'";
                        $result=mysqli_query($conn,$fquery)or die("could not execute query");
                        $slno=0;
                        while($row=mysqli_fetch_array($result))
                        {
                            $slno++;
					?> 

                        <form action="#" method="post">
                        <input type="hidden" name="petid" id="petid" value="<?php echo $row['petid'];?>" />
                    <tr>
                        
                        <td><?php echo $slno;?></td>
                        <td><?php echo $row['pet_name'];?></td>
                        <td><?php echo $row['pet_owner'];?></td>
                        <td><?php echo $row['pet_type'];?></td>
                        <td><?php echo $row['train_type'];?></td>
                        <td><?php echo $row['start_date'];?></td>
                        <td><?php echo $row['duration'];?></td>
                        <td><input type="text" name="progress_status" value="<?php echo $row['progress_status'];?>"></td>
                        <td> <textarea name="train_desc" id="" cols="30" rows="5"><?php echo $row['train_desc'];?></textarea> </td>
                    
                        <td><input type="submit" name="update" class="send-btn" value="Update"></td>

                        <td><input type="submit" name="delete" class="dlt-btn" value="Delete"></td>
                        
                    </tr> 
                    </form>
                    <?php
				        }
                    ?>
                </table>
            </div>
            <?php
                if(isset($_POST['update']))
                {
                $progress_status=$_POST['progress_status'];
                $petid=$_POST['petid'];
                $train_desc=$_POST['train_desc'];
                
                $sql = "update petprogress set progress_status='$progress_status', train_desc='$train_desc' where petid='$petid'";
                $res = mysqli_query($conn,$sql);
                if($res)
                {
                    echo '<script>';
                        echo 'swal( "Good Job","Pet Pprogress Updated Sucessfully","success")';   
                    echo '</script>';
                    header("Refresh:2");
                
                }
                else
                {
                    echo '<script>';
                        echo 'swal( "Sorry","Your Pet Progress not updated","error")';   
                    echo '</script>';
                }
                
                
                }


                if(isset($_POST['delete']))
                        {                            
                                $petid=$_POST['petid'];
                                
                                $dltpet = "delete from petprogress where petid='$petid'";
                                $result = mysqli_query($conn,$dltpet);
                    
                                if($result==1)
                                {
                                    echo '<script>';
                                        echo 'swal( "Good Job","Pet Progress Details Deleted Sucessfully","success")';   
                                    echo '</script>';
                                    header('refresh:2');
                                }
                                else
                                {
                                    echo '<script language="javascript">';
                                        echo 'swal( "Sorry","Could not deleted the Pet Progress Details!","error")';   
                                    echo '</script>';
                    
                                }
                                

                        }
            ?>

        <!-- ======================== end of add-trainers ======================== -->




        <!-- custom javascript link -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

        <script src="../Admin/JS/script.js"></script>

    </div>

</body>

</html>


<?php
}
?>
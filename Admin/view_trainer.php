 <?php
    ob_start();
    session_start();
    if (isset($_SESSION['aname'])) {
        // $conn = mysqli_connect("localhost", "root", "", "petworld");
        include "conn.php";

        $aname = $_SESSION['aname'];

    ?>


     <!DOCTYPE html>
     <html lang="en">

     <head>
         <meta charset="UTF-8">
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>PetWorld-Admin | View Trainers</title>

         <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

         <!-- Sweet alert Box Script code -->
         <script src="../JS/sweetalert2.all.min.js"></script>


         <link rel="stylesheet" href="./CSS/style.css">
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

                 <a href="admin-home.php">

                     <i class="fas fa-chart-line"></i>Dashborad

                 </a>

             </div>

             <div class="item">

                 <a class="dropdown-toggle activeted">
                     <i class="fa fa-users"></i>Trainers<i class="fas fa-chevron-down"></i>
                 </a>
                 <ul class="dropdown">
                     <li>
                         <a class="item" href="add-trainer.php">
                             <i class="fa fa-plus"></i>Add Trainer
                         </a>

                     </li>

                     <li>

                         <a class="item activeted1" href="#">
                             <i class="fa fa-eye"></i>View Trainers
                         </a>

                     </li>

                 </ul>

             </div>

             <div class="item">

                 <a class="dropdown-toggle">
                     <i class="fa-brands fa-shopify"></i>Products<i class="fas fa-chevron-down"></i>
                 </a>
                 <ul class="dropdown">
                     <li>
                         <a class="item" href="add_products.php">
                             <i class="fa fa-plus"></i>Add Products
                         </a>

                     </li>

                     <li>

                         <a class="item" href="view_products.php">
                             <i class="fa fa-eye"></i>View Products
                         </a>

                     </li>

                 </ul>

             </div>

             <div class="item">

                 <a class="item" href="view-orders.php">

                     <i class="fa fa-shopping-cart"></i>Orders

                 </a>

             </div>

             <div class="item">

                 <a class="item" href="view_customers.php">

                     <i class="fa fa-users"></i>Customers

                 </a>

             </div>

             <div class="item">

                 <a class="item" href="pet-allocate.php">

                     <i class="fa fa-dog"></i>Pet's

                 </a>

             </div>

             <div class="item">

                 <a class="item" href="feedback.php">

                     <i class="fa fa-comments"></i>Feedback

                 </a>

             </div>

             <div class="item">

                 <a class="item" href="queries.php">

                     <i class="fa fa-clipboard"></i>Queries

                 </a>

             </div>

             <div class="item">

                 <a class="dropdown-toggle">
                     <i class="fa fa-folder"></i>Reports<i class="fas fa-chevron-down"></i>
                 </a>
                 <ul class="dropdown">
                     <li>
                         <a class="item" href="sales_reports.php">
                             <i class="fa fa-file"></i>Sales Report
                         </a>

                     </li>

                     <li>

                         <a class="item" href="training_report.php">
                             <i class="fa fa-file"></i>Training Report
                         </a>

                     </li>

                 </ul>

             </div>

             <div class="item">
                 <a class="dropdown-toggle">
                     <i class="fa fa-gear"></i>Settings<i class="fas fa-chevron-down"></i>
                 </a>

                 <ul class="dropdown">
                     <li>

                         <a class="item" href="change_pass.php">
                             <i class="fas fa-lock"></i>Change Password
                         </a>

                     </li>

                     <li>

                         <a class="item" href="../Users/logout.php">
                             <i class="fas fa-sign-out"></i>Logout
                         </a>

                     </li>

                 </ul>

             </div>

         </div>
         <div class="main-content">
             <header>
                 <marquee behavior="alternate" scrollamount="10">
                     <h2>
                         <a href="#"><i class="fa fa-paw"></i> Pet<span>World</span>
                     </h2>
                 </marquee>

             </header>

             <!-- ======================== start of view-trainer ======================== -->

             <div class="view-trainer-container">

                 <div class="view-trainer">

                     <h2 class="title">
                         Manage Trainers
                     </h2>


                     <table class="view-trainer-table">

                         <tr>

                             <th>Sr.No</th>

                             <th>Trainer Name</th>

                             <th>Email</th>

                             <th>Mobile</th>

                             <th>Gender</th>

                             <th>Speciality</th>

                             <th>Work Experience</th>

                             <th>Address</th>

                             <th colspan="3">Action</th>

                         </tr>

                         <?php
                            $fquery = "select *from addtrainer";
                            $result = mysqli_query($conn, $fquery) or die("could not execute query");
                            $slno = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $slno++;
                            ?>
                             <form action="#" method="post">
                                 <input type="hidden" name="mobno" value="<?php echo $row['mobno']; ?>" />
                                 <tr>
                                     <td><?php echo $slno; ?></td>
                                     <td><?php echo $row['tname']; ?></td>
                                     <td><?php echo $row['email']; ?></td>
                                     <td><?php echo $row['mobno']; ?></td>
                                     <td><?php echo $row['gender']; ?></td>
                                     <td><?php echo $row['speciality']; ?></td>
                                     <td><?php echo $row['exp']; ?></td>
                                     <td><?php echo $row['address']; ?></td>

                                     <td><input type="submit" name="Block" value="Block" id="dlt-btn"></td>
                                     <td><input type="submit" name="Unblock" value="Unblock" id="send-btn"></td>
                                     <td><input type="submit" name="delete" value="Delete" id="dlt-btn"></td>
                                 </tr>
                             </form>
                         <?php
                            }
                            //   _--------- Block trainer Start here  ------------_                           


                            if (isset($_POST['Block'])) {
                                // $conn = mysqli_connect("localhost", "root", "", "petworld");
                                include "conn.php";

                                $mobno = $_POST['mobno'];

                                $blockuser = "update addtrainer set blockstatus='Block' where mobno='$mobno'";
                                $result = mysqli_query($conn, $blockuser);

                                if ($result == 1) {
                                    echo '<script>';
                                    echo 'swal( "Good Job","Trainer Blocked Sucessfully","success")';
                                    echo '</script>';
                                    header('refresh:2');
                                } else {
                                    echo '<script language="javascript">';
                                    echo 'swal( "Sorry","Could not block the Trainer Details!","error")';
                                    echo '</script>';
                                }
                            }

                            //   _--------- Block Trainer end here  ------------_ 


                            //   _--------- Unblock Trainer start here  ------------_ 

                            if (isset($_POST['Unblock'])) {
                                // $conn = mysqli_connect("localhost", "root", "", "petworld");
                                include "conn.php";

                                $mobno = $_POST['mobno'];

                                $blockuser = "update addtrainer set blockstatus='Unblock' where mobno='$mobno'";
                                $result = mysqli_query($conn, $blockuser);

                                if ($result == 1) {
                                    echo '<script>';
                                    echo 'swal( "Good Job","Trainer Unblocked Sucessfully","success")';
                                    echo '</script>';
                                    header('refresh:2');
                                } else {
                                    echo '<script language="javascript">';
                                    echo 'swal( "Sorry","Could not unblock the Trainer!","error")';
                                    echo '</script>';
                                }
                            }

                            //   _--------- Unblock Trainer end here  ------------_ 


                            //   _--------- Delete trainer start here  ------------_                           


                            if (isset($_POST['delete'])) {
                                // $conn = mysqli_connect("localhost", "root", "", "petworld");
                                include "conn.php";

                                $mobno = $_POST['mobno'];

                                $dltproduct = "delete from addtrainer where mobno='$mobno'";
                                $result = mysqli_query($conn, $dltproduct);

                                if ($result == 1) {
                                    echo '<script>';
                                    echo 'swal( "Good Job","Trainer Details Deleted Sucessfully","success")';
                                    echo '</script>';
                                    header('refresh:2');
                                } else {
                                    echo '<script language="javascript">';
                                    echo 'swal( "Sorry","Could not deleted the Trainer Details!","error")';
                                    echo '</script>';
                                }
                            }
                            ?>

                     </table>

                 </div>

             </div>

             <!-- ======================== end of view-trainer ======================== -->




             <!-- custom javascript link -->

             <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

             <script src="./js/script.js"></script>

         </div>

     </body>

     </html>


 <?php
    }
    ?>
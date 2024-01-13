<?php
ob_start();
session_start();
if (isset($_SESSION['mobno'])) {
    // $conn = mysqli_connect("localhost", "root", "", "petworld");
    include  "conn.php";
    $mobno = $_SESSION['mobno'];

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PetWorld-Trainer | Allocate Pet's</title>

        <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Sweet alert Box Script code -->
        <script src="../JS/sweetalert2.all.min.js"></script>

        <link rel="stylesheet" href="./CSS/trainer_style.css">


    </head>

    <body>
        <div class="side-bar">

            <div class="profile-img">

                <i class="fa fa-user"></i>

                <h5>Trainer</h5>
                <hr>
            </div>

            <!--Profile CODE ENDED HERE-->

            <div class="item">

                <a href="./trainer_home.php">

                    <i class="fas fa-home"></i>Home

                </a>

            </div>

            <div class="item ">

                <a class="dropdown-toggle ">
                    <i class="fa fa-tasks"></i>Pet Progress<i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown">
                    <li>
                        <a class="item " href="./pet_progress.php">
                            <i class="fa fa-plus"></i>Add Pet Progress
                        </a>

                    </li>

                    <li>

                        <a class="item " href="./view_petprogress.php">
                            <i class="fa fa-eye"></i>View Pet Progress
                        </a>

                    </li>

                </ul>

            </div>

            <div class="item">

                <a class="item activeted" href="./allocated_pet.php">

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

                <div class="profile">
                    <a href="trainer-profile.php"><i class="fa fa-user"></i> MyProfile</a>
                </div>

            </header>

            <!-- ======================== start of add-products ======================== -->
            <div class="allocated-pet-container">
                <div class="allocated">
                    <h2>Allocated Pets</h2>
                    <table border="1px solid red">
                        <tr>
                            <th>Sr.</th>
                            <th>Owner Name</th>
                            <th>Mobile</th>
                            <th>Pet Category</th>
                            <th>Breed</th>
                            <th>Pet Name</th>
                            <th>Pet Gender</th>
                            <th>Pet Age</th>
                            <th>Weight</th>
                            <th>Vaccination</th>
                            <th>Training Type</th>
                            <th>Training Duration</th>
                            <th>Address</th>
                            <th>Training Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <?php
                        $allocate_query = "select U.fname, P.mobno, p.pet, P.breed, P.pname, P.pgender, P.petage, P.pweight, P.vaccine, P.traintype, P.duration, U.address, P.training_status from users U, pets P where U.mobno=P.mobno and P.tmobno='$mobno'";

                        $result = mysqli_query($conn, $allocate_query);


                        $query1 = "select *from pets";
                        $result1 = mysqli_query($conn, $query1);
                        $row1 = mysqli_fetch_array($result1);


                        $slno = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $slno++;



                        ?>
                            <form action="#" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="petid" value="<?php echo $row1['petid']; ?>" />
                                <tr>

                                    <td><?php echo $slno; ?></td>
                                    <td><input type="text" name="owner_name" value="<?php echo $row[0]; ?>"></td>
                                    <td><input type="text" name="mobno" value="<?php echo $row[1]; ?>"></td>
                                    <td><input type="text" name="pet category" value="<?php echo $row[2] ?>"></td>
                                    <td><input type="text" name="Breed" value="<?php echo $row[3]; ?>"></td>
                                    <td><input type="text" name="pet name" value="<?php echo $row[4]; ?>"></td>
                                    <td><input type="text" name="pet gender" value="<?php echo $row[5]; ?>"></td>
                                    <td><input type="text" name="pet age" value="<?php echo $row[6]; ?>"></td>
                                    <td><input type="text" name="weight" value="<?php echo $row[7]; ?>"></td>
                                    <td><input type="text" name="vaccination" value="<?php echo $row[8]; ?>"></td>
                                    <td><input type="text" name="training_type" value="<?php echo $row[9]; ?>"></td>
                                    <td><input type="text" name="training_duration" value="<?php echo $row[10]; ?>"></td>
                                    <td><input type="text" name="address" value="<?php echo $row[11]; ?>"></td>
                                    <td><input type="text" name="training_status" value="<?php echo $row[12]; ?>"></td>

                                    <td><input type="submit" name="complete" class="send-btn" value="Completed"></td>

                                    <!-- <td><input type="submit" name="incomplete" class="dlt-btn" value="Not-Completed"></td> -->

                                </tr>
                            </form>
                        <?php
                        }

                        ?>
                    </table>

                </div>
                <?php
                if (isset($_POST['complete'])) {
                    $petid = $_POST['petid'];
                    $query = "update pets set training_status='Completed' where petid='$petid'";

                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        echo '<script>';
                        echo 'swal( "Good Job","Training Status Updated Sucessfully","success")';
                        echo '</script>';
                        header('refresh:2');
                    } else {
                        echo '<script language="javascript">';
                        echo 'swal( "Sorry","Could not update the Training Status!","error")';
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
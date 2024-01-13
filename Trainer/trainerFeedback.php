<?php
session_start();
if (isset($_SESSION['mobno'])) {
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
        <title>PetWorld-Trainer | Feedback</title>

        <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

                        <a class="item" href="./view_petprogress.php">
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

                <a class="item activeted" href="#">

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

            <!-- ======================== start of Feedback ======================== -->
            <div class="view-feedback-container">

                <div class="view-feedback">

                    <h2 class="title">
                        Feedback View
                    </h2>


                    <table class="view-feedback-table">

                        <tr>

                            <th>Sr.No</th>

                            <th>User Name</th>

                            <th>User Phone</th>

                            <th>Feedback On</th>

                            <th>Feedback Message</th>

                            <th>Ratings</th>

                        </tr>

                        <?php
                        $fquery = "select *from feedback";
                        $result = mysqli_query($conn, $fquery) or die("could not execute query");
                        $slno = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $slno++;
                        ?>
                            <tr>
                                <td><?php echo $slno; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['mobno']; ?></td>
                                <td><?php echo $row['fon']; ?></td>
                                <td><?php echo $row['fmsg']; ?></td>
                                <td><?php echo $row['frate']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>

                </div>

            </div>









            <!-- ======================== end of add-trainers ======================== -->




            <!-- custom javascript link -->

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

            <script src="../Admin/JS/script.js"></script>

        </div>

    </body>

    </html>


<?php

} else {

    header("location:../index.php");
}
?>
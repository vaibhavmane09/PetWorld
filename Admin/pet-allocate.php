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
        <title>PetWorld-Admin | Pet Allocation</title>

        <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Sweet alert Box Script code -->
        <script src="../JS/sweetalert2.all.min.js"></script>

        <!-- Css File link -->
        <link rel="stylesheet" href="./CSS/style.css">


        <!-- Ajax Code  -->
        <script>
            var xmlHttp;
            var xmlHttp;
            var str1 = "";

            function showState2(str, str2) {

                str1 = str2;
                xmlHttp = GetXmlHttpObject();
                if (xmlHttp == null) {
                    alert("Browser does not support HTTP Request");
                    return;
                }

                var url = "get_mobno.php";
                url += "?tname=" + str;
                xmlHttp.onreadystatechange = stateChange2;
                xmlHttp.open("GET", url, true);
                xmlHttp.send(null);
            }

            function stateChange2() {
                if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
                    var showdata = xmlHttp.responseText;


                    var strar = showdata.split(":");
                    if (strar.length > 1) {
                        var strname = strar[1];
                        var x = "mobno" + str1;

                        document.getElementById(x).value = strar[1];



                    }

                }
            }

            function GetXmlHttpObject() {
                var xmlHttp = null;
                try {
                    // Firefox, Opera 8.0+, Safari
                    xmlHttp = new XMLHttpRequest();
                } catch (e) {
                    //Internet Explorer
                    try {
                        xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                }
                return xmlHttp;
            }
        </script>


        <!-- Ajax Code  end-->



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

                <a class="dropdown-toggle">
                    <i class="fa fa-users"></i>Trainers<i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown">
                    <li>
                        <a class="item" href="add-trainer.php">
                            <i class="fa fa-plus"></i>Add Trainer
                        </a>

                    </li>

                    <li>

                        <a class="item" href="view_trainer.php">
                            <i class="fa fa-eye"></i>View Trainers
                        </a>

                    </li>

                </ul>

            </div>

            <div class="item">

                <a class="dropdown-toggle ">
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

                <a class="item activeted" href="pet-allocate.php">

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

            <!-- ======================== start of Allocate Pets ======================== -->

            <div class="pet-allocation-container">
                <div class="pet-allocate">
                    <h2>Allocate a Trainer for Pet.</h2>
                    <table border="1px solid red">
                        <tr>
                            <th>Sr.</th>

                            <th>Owner Name</th>

                            <th>Mobile </th>

                            <th>Pet Category</th>

                            <th>Breed</th>

                            <th>Pet Name</th>

                            <th>Pet Gender</th>

                            <th>Pet Age</th>

                            <th>Weight</th>

                            <th>Vaccination</th>

                            <th>Training Package</th>

                            <th>Training Duration</th>

                            <th>Address</th>

                            <th>Image</th>

                            <th>Payment Status</th>

                            <th>Allocation Status</th>

                            <th>Allocated Trainer Name</th>

                            <th>Allocated Trainer Mobile</th>

                            <th colspan="2">Allocate Trainer</th>

                        </tr>

                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "petworld");

                        $fquery = "select U.fname, U.mobno, P.pet, P.petid, P.breed, P.pname, P.pgender, P.petage, P.pweight, P.vaccine, P.traintype,P.duration, U.address, P.petimage, P.payment_status,P.allocation_status,P.allocated_trainer, P.tmobno from users U, pets P where U.mobno=P.mobno ";
                        $result = mysqli_query($conn, $fquery) or die("could not execute query");
                        $slno = 0;

                        foreach ($result as $row) {
                            $slno++;
                        ?>
                            <form action="#" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="petid" value="<?php echo $row['petid']; ?>" />

                                <tr>
                                    <td><?php echo $slno; ?></td>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['mobno']; ?></td>
                                    <td><?php echo $row['pet']; ?></td>
                                    <td><?php echo $row['breed']; ?></td>
                                    <td><?php echo $row['pname']; ?></td>
                                    <td><?php echo $row['pgender']; ?></td>
                                    <td><?php echo $row['petage']; ?></td>
                                    <td><?php echo $row['pweight']; ?></td>
                                    <td><?php echo $row['vaccine']; ?></td>
                                    <td><?php echo $row['traintype']; ?></td>
                                    <td><?php echo $row['duration']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['petimage']) . '"width="80" height="80"/>' ?></td>
                                    <td><input type="text" name="payment_status" value="<?php echo $row['payment_status']; ?>" readonly /></td>
                                    <td><?php echo $row['allocation_status']; ?></td>
                                    <td><?php echo $row['allocated_trainer']; ?></td>
                                    <td><input type="text" name="mobno" id="mobno<?php echo $slno; ?>" value="<?php echo $row['tmobno']; ?>" readonly /></td>

                                    <td>
                                        <select name="tname" onchange="showState2(this.value,<?php echo $slno; ?>)">
                                            <option value="#">Select Trainer</option>
                                            <?php
                                            $query = "select *from addtrainer";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value="<?php echo $row['tname']; ?>"> <?php echo $row['tname']; ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>

                                    <td><input type="submit" name="allocate" value="Allocate" id="send-btn" /></td>
                                </tr>
                            </form>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <?php

                if (isset($_POST['allocate'])) {

                    $allocated_trainer = $_POST['tname'];
                    $payment_status = $_POST['payment_status'];
                    $tmobno = $_POST['mobno'];

                    if ($payment_status == 'Paid') {
                        $petid = $_POST['petid'];
                        
                        $query = "update pets set allocation_status='Allocated' , allocated_trainer='$allocated_trainer', tmobno='$tmobno' where petid='$petid'";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            echo '<script>';
                            echo 'swal( "Good Job","Trainer Allocated Sucessfully","success")';
                            echo '</script>';
                            header('refresh:2');
                        } else {
                            echo '<script language="javascript">';
                            echo 'swal( "Sorry","Could not Allocate the Trainer!","error")';
                            echo '</script>';
                        }
                    }
                    else{
                        echo '<script language="javascript">';
                            echo 'swal( "Payment Pending","Sorry! Payment is Pending, Cannot Allocate a Trainer!","error")';
                            echo '</script>';
                    }
                }
                ?>
            </div>

            <!-- ======================== end of Allocate Pets ======================== -->




            <!-- custom javascript link -->

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

            <script src="./js/script.js"></script>

        </div>

    </body>

    </html>


<?php
}
?>
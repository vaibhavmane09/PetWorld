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
        <title>PetWorld-Trainer | Add pet Progress</title>

        <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Sweet alert Box Script code -->
        <script src="../JS/sweetalert2.all.min.js"></script>


        <link rel="stylesheet" href="./CSS/trainer_style.css">

        <!-- Ajax Code start -->
        <script>
            var xmlHttp
            var xmlHttp

            function showState2(str) {

                xmlHttp = GetXmlHttpObject();
                if (xmlHttp == null) {
                    alert("Browser does not support HTTP Request")
                    return
                }

                var url = "get_petdate.php";
                url += "?petid=" + str;
                xmlHttp.onreadystatechange = stateChange2;
                xmlHttp.open("GET", url, true);
                xmlHttp.send(null);
            }

            function stateChange2() {
                if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
                    var showdata = xmlHttp.responseText;


                    var strar = showdata.split(":");
                    if (strar.length > 1) {

                        document.getElementById("pet").value = strar[1];
                        document.getElementById("pet_name").value = strar[2];
                        document.getElementById("breed").value = strar[3];
                        document.getElementById("mobno").value = strar[4];

                        document.getElementById("traintype").value = strar[5];
                        document.getElementById("owner").value = strar[6];
                        document.getElementById("duration").value = strar[7];



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

                <a class="dropdown-toggle activeted">
                    <i class="fa fa-tasks"></i>Pet Progress<i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown">
                    <li>
                        <a class="item activeted1 " href="#">
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

                <a class="item" href="trainerFeedback.php">

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

            <!-- ======================== start of add-petProgress ======================== -->


            <div class="progress-container">
                <fieldset>
                    <legend>
                        <h2>Enter Pet progress Details</h2>
                    </legend>
                    <form action="#" autocomplete="off" method="post">

                        <div class="grid-inputs">

                            <div class="input-field">
                                <label for="petid">Select PetID -</label><br>
                                <select id="petid" name="petid" onchange="showState2(this.value)">
                                    <option>select Petid</option>
                                    <?php
                                    $mobno = $_SESSION['mobno'];
                                    $query = "select *from pets  where tmobno='$mobno'";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?php echo $row['petid']; ?>" name="petid"> <?php echo $row['petid']; ?> </option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="input-field">
                                <label for="pet_name">Pet Name -</label><br>
                                <input type="text" name="pet_name" id="pet_name" readonly>

                            </div>

                            <div class="input-field">
                                <label for="pet_type">Pet Category -</label><br>
                                <input type="text" name="pet_type" id="pet" readonly>

                            </div>

                            <div class="input-field">
                                <label for="petbreed">pet breed -</label><br>
                                <input type="text" name="petbreed" id="breed" readonly>

                            </div>

                            <div class="input-field">
                                <label for="pet_owner">pet owner -</label><br>
                                <input type="text" name="pet_owner" id="owner" readonly>

                            </div>

                            <div class="input-field">
                                <label for="owner_mobno">Owner Mobile -</label><br>
                                <input type="text" name="owner_mobno" id="mobno" readonly>

                            </div>

                            <div class="input-field">
                                <label for="trainer_mobno">Trainer Mobile -</label><br>
                                <input type="text" name="trainer_mobno" id="tmobno" value="<?php echo $mobno; ?>" readonly />

                            </div>

                            <div class="input-field">

                                <label for="train_type">Training Type -</label> <br>
                                <input type="text" name="train_type" id="traintype">

                            </div>

                            <div class="input-field">

                                <label for="duration">Duration-</label> <br>
                                <input type="text" name="duration" id="duration" readonly />

                            </div>

                            <div class="input-field">

                                <label for="start_date">Start Date -</label> <br>
                                <input type="date" name="start_date">

                            </div>

                            <div class="input-field">

                                <label for="progress_status">Progress Status -</label> <br>
                                <input type="text" name="progress_status">

                            </div>

                        </div>

                        <div class="package-desc">

                            <label for="train_desc">Training Description -</label> <br>
                            <textarea name="train_desc" id="train_desc" cols="118" rows="6"></textarea>

                        </div>

                        <div class="flex-input">
                            <input type="submit" name="submit" value="Save">
                            <input type="reset" name="reset" value="Clear">
                        </div>

                    </form>

                </fieldset>
            </div>


            <!-- Insert Query -->
            <?php
            if (isset($_POST['submit'])) {
                $petid = $_POST['petid'];
                $pet_name = $_POST['pet_name'];
                $trainer_mobno = $_POST['trainer_mobno'];
                $pet_owner = $_POST['pet_owner'];
                $owner_mobno = $_POST['owner_mobno'];
                $pet_type = $_POST['pet_type'];
                $petbreed = $_POST['petbreed'];
                $train_type = $_POST['train_type'];
                $start_date = $_POST['start_date'];
                $duration = $_POST['duration'];
                $progress_status = $_POST['progress_status'];
                $train_desc = $_POST['train_desc'];

                $query = "insert into petprogress(progress_id, petid, pet_name, trainer_mobno, pet_owner, owner_mobno, pet_type, pet_breed, train_type, start_date, duration, progress_status, train_desc) values('','$petid','$pet_name','$trainer_mobno','$pet_owner','$owner_mobno','$pet_type','$petbreed','$train_type','$start_date','$duration','$progress_status','$train_desc')";
                $result = mysqli_query($conn, $query);

                if ($result == 1) {
                    echo '<script>';
                    echo 'swal( "Good Job","Pet Progress Added Sucessfully","success")';
                    echo '</script>';
                } else {
                    echo '<script language="javascript">';
                    echo 'swal( "Sorry","Could not add the Pet Progress, Please Check all Fields","error")';
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
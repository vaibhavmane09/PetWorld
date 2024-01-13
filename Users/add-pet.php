<?php
ob_start();
session_start();
if (isset($_SESSION['mobno'])) {

    // $conn = mysqli_connect("localhost", "root", "", "petworld");
    include "conn.php";

    $mobno  = $_SESSION['mobno'];


?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ThePetWorld-User | Add Pet</title>
        <link rel="stylesheet" href="./CSS/Home-CSS/style.css">
        <link rel="stylesheet" href="./CSS/Home-CSS/navbar_footer.css">
        <link rel="stylesheet" href="./CSS/add-pet.css">

        <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Sweet alert Box Script code -->
        <script src="../JS/sweetalert2.all.min.js"></script>

        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <!-- Dynamic Select JavaScript Code  -->

        <script type="text/javascript">
            //<![CDATA[ 
            // array of possible countries in the same order as they appear in the country selection list 
            var petLists = new Array(2)
            petLists["empty"] = ["Select a Country"];
            petLists["Dogs"] = ["Labrodor", "German Shaphard", "Rottwiler", "Beagal", "GrayHound", "Mudhol Hound"];
            petLists["Cats"] = ["Persian Cat", "Regdoll", "Birman", "Scottish Fond", "Sphynx Cat", "British Shorthair"];

            /* CountryChange() is called from the onchange event of a select element. 
             * param selectObj - the select object which fired the on change event. 
             */
            function petChange(selectObj) {
                // get the index of the selected option 
                var idx = selectObj.selectedIndex;
                // get the value of the selected option 
                var which = selectObj.options[idx].value;
                // use the selected option value to retrieve the list of items from the countryLists array 
                cList = petLists[which];
                // get the country select element via its known id 
                var cSelect = document.getElementById("pet_type");
                // remove the current options from the pet_type select 
                var len = cSelect.options.length;
                while (cSelect.options.length > 0) {
                    cSelect.remove(0);
                }
                var newOption;
                // create new options 
                for (var i = 0; i < cList.length; i++) {
                    newOption = document.createElement("option");
                    newOption.value = cList[i]; // assumes option string and value are the same 
                    newOption.text = cList[i];
                    // add the new option 
                    try {
                        cSelect.add(newOption); // this will fail in DOM browsers but is needed for IE 
                    } catch (e) {
                        cSelect.appendChild(newOption);
                    }
                }
            }
            //]]>
        </script>

        <!-- Dynamic Select JavaScript Code  -->


    </head>

    <body>
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <!-- <img src="./IMG/logo.png" width="230px"> -->
                        <a href="#"><i class="fa fa-paw" aria-hidden="true"></i> Pet<span>World</span>
                        </a>
                    </div>
                    <nav>
                        <ul>
                            <li>
                                <a href="./Home-HTML/index.php"><i class="fa fa-home fa-lg"></i> HOME</a>
                            </li>
                            <li>
                                <a href="view-pet.php"> View Pet's</a>
                            </li>
                            <li>
                                <a href="view-pet-progress.php"> Check Pet Progress</a>
                            </li>
                            <li>
                                <a href="./view_orders.php"><i class="fa fa-shopping-cart fa-lg"></i></a>
                            </li>
                            <li>
                                <h1>|</h1>
                            </li>
                            <li>
                                <a href="./user-profile.php" class="activeted"><i class="fa fa-user"></i> My Profile</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- End of Navigation -->

                <!-- ---------Body of Add-Pet Details--------- -->

                <div class="pet-container">
                    <fieldset>
                        <legend>
                            <h2>Enter Pet Details</h2>
                        </legend>

                        <?php

                        $sql = "select * from users where mobno='$mobno'";
                        $res = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($res);

                        ?>
                        <form action="#" method="post" autocomplete="off" enctype="multipart/form-data">

                            <div class="grid-inputs">
                                <div class="input-field">

                                    <label for="pet">Select Category -</label>
                                    <select name="pet" id="pet" onchange="petChange(this);">
                                        <option value="">Choose Pet</option>
                                        <option value="Dogs">Dogs</option>
                                        <option value="Cats">Cats</option>
                                    </select>

                                </div>

                                <!-- The below code is if user select the dog as Category then dog's will be display in the dropdown  -->

                                <div class="input-field">
                                    <label for="breed">Select Breed -</label>
                                    <select name="breed" id="pet_type">
                                        <option value="0">Choose Breed</option>
                                    </select>

                                </div>



                                <div class="input-field">

                                    <label for="pname">Pet Name -</label><br>
                                    <input type="text" name="pname" required>

                                </div>

                                <div class="input-field">
                                    <?php

                                    ?>
                                    <label for="petid">Pet Id -</label> <br>
                                    <input type="text" name="petid" value="<?php echo "Pet" . rand(1111, 9999); ?>" readonly />

                                </div>

                                <div class="input-field">

                                    <label for="mobno">User Mobile -</label> <br>
                                    <input type="text" name="mobno" value="<?php echo $row['mobno']; ?>" readonly>

                                </div>

                                <div class="gender-field">

                                    <label for="petgender">Pet Gender -</label> <br>
                                    <input type="radio" name="pgender" value="male"> <label for="male">Male</label>
                                    <input type="radio" name="pgender" value="female"> <label for="female">Female</label>

                                </div>

                                <div class="input-field">

                                    <label for="petage">Pet Age -</label> <br>
                                    <input type="text" name="petage" required>

                                </div>

                                <div class="input-field">

                                    <label for="pweight">Pet Weight -</label> <br>
                                    <input type="text" name="pweight" required >

                                </div>

                                <div class="input-field">

                                    <label for="vaccine">Completed Vaccination -</label> <br>
                                    <input type="text" name="vaccine" required >

                                </div>

                                <div class="input-field">

                                    <label for="traintype">Training Type -</label> <br>
                                    <select name="traintype" id="traintype" required>
                                        <option value="">Choose Training Type</option>
                                        <option value="Alpha Dog Training">Alpha/ Positive Training</option>
                                        <option value="Alpha Dog Training">Obedience Training</option>
                                        <option value="Behaviour Expert">Behaviour Expert</option>
                                        <option value="Running Training">Running Training</option>
                                        <option value="Huntting Training">Huntting Training</option>
                                    </select>

                                </div>

                                <div class="input-field">

                                    <label for="duration">Training Duration -</label> <br>
                                    <select name="duration" id="duration" onchange="payPrice()" required>
                                        <option value="">Choose Training Type</option>
                                        <option value="15">2 Weeks</option>
                                        <option value="30">1 Month</option>
                                        <option value="90">3 Months</option>
                                        <option value="180"> 6 Months</option>
                                    </select>

                                </div>

                                <div class="input-field">
                                    <label for="train_price">Training Price -</label> <br>
                                    <input type="text" name="train_price" id="total_price" readonly />

                                </div>

                                <div class="input-field">

                                    <label for="petimage">Uplode Image -</label> <br>
                                    <input type="file" name="petimage" required>

                                </div>

                                <div class="input-field">

                                    <label for="address">Address</label> <br>
                                    <textarea name="address" id="address" cols="105" rows="4" readonly required><?php echo $row['address']; ?></textarea>

                                </div>

                                <div id="input-btn">
                                    <input type="submit" name="submit" value="Save">
                                    <input type="reset" name="reset" value="Clear">
                                </div>

                            </div>

                        </form>

                        <!-- ======================== PHP Code For Add Trainers ======================== -->


                        <?php
                        if (isset($_POST['submit'])) {
                            // $conn = mysqli_connect("localhost", "root", "", "petworld"); {
                            include "conn.php";{

                                $pet = $_POST['pet'];
                                $breed = $_POST['breed'];
                                $pname = $_POST['pname'];
                                $petid = $_POST['petid'];
                                $mobno = $_POST['mobno'];
                                // $tmobno=$_POST['tmobno'];
                                $pgender = $_POST['pgender'];
                                $petage = $_POST['petage'];
                                $pweight = $_POST['pweight'];
                                $vaccine = $_POST['vaccine'];
                                $traintype = $_POST['traintype'];
                                $duration = $_POST['duration'];
                                $duration1 = '';
                                // Code for convert Days to Months
                                if ($duration == 15) {
                                    $duration1 = '2 Weeks';
                                } elseif ($duration == 30) {
                                    $duration1 = '1 Month';
                                } elseif ($duration == 90) {
                                    $duration1 = '3 Months';
                                } elseif ($duration == 180) {
                                    $duration1 = '6 Months';
                                }
                                $train_price = $_POST['train_price'];
                                $petimage = addslashes(file_get_contents($_FILES['petimage']['tmp_name']));
                                $address = $_POST['address'];

                                $addpet = "insert into pets(petid, pet, breed, pname, pgender, petage, pweight, vaccine, mobno, traintype,duration,train_price, petimage, address) values('$petid','$pet','$breed','$pname','$pgender','$petage','$pweight','$vaccine','$mobno','$traintype','$duration1','$train_price','$petimage','$address')";
                                $result = mysqli_query($conn, $addpet);

                                if ($result == 1) {
                                    echo '<script>';
                                    echo 'swal( "Good Job","Your Pet Details added Sucessfully","success")';
                                    echo '</script>';
                                } else {
                                    echo '<script language="javascript">';
                                    echo 'swal( "Sorry","Could not add the Pet Details, Please Check all Fields","error")';
                                    echo '</script>';
                                }
                            }
                        }

                        ?>


                    </fieldset>
                </div>


                <!-- ---------Body of Add-Pet Details--------- -->

                <!-- ------------- Footer -------------- -->
                <div class="footer">
                    <div class="container">
                        <p class="copyright">Find Us On-
                            <a href="#"><i class="fa fa-facebook-square"> </i></a>

                            <a href="#"><i class="fa fa-twitter"></i></a>

                            <a href="#"><i class="fa fa-instagram"></i></a>

                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <br>
                            Copyright &copy; 2023 - ThePetWorld | All Rights Reserved!
                        </p>
                    </div>
                </div>
    </body>

    </html>


<?php

} else {

    header("location:../index.php");
}
?>


<script>
    function payPrice() {
        var price = document.getElementById('duration').value;
        document.getElementById('total_price').value = price * 100;


    }
</script>
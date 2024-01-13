<?php

    session_start();
    if(isset($_SESSION['mobno']))
    {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetWorld | Trainer</title>

    <link rel="shortcut icon" href="../IMG/fevicon.jpg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

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

            <a href="#" class="activeted">

                <i class="fas fa-home"></i>Home

            </a>

        </div>

        <div class="item">

            <a class="dropdown-toggle">
                <i class="fa fa-tasks"></i>Pet Progress<i class="fas fa-chevron-down"></i>
            </a>
            <ul class="dropdown">
                <li>
                    <a class="item" href="./pet_progress.php">
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
        <main>
            
           <div class="train-rules">
            <h2>Trainer Guidelines - <hr></h2>

            <h3>As a trainer at a pet care and training center, your responsibilities are crucial in ensuring the well-being and development of the pets under your care. <br> <br>Here are some essential rules and guidelines to follow:</h3>

            <p> <span>Safety first: </span> Always prioritize the safety of the pets, yourself, and others in the facility. Follow safety protocols, use appropriate equipment, and handle animals with care and gentleness.</p>

            <p> <span>Positive reinforcement:</span> Use positive reinforcement techniques to train and encourage good behavior in the pets. Reward good behavior with treats, praise, or affection to reinforce their learning.</p>

            <p><span>No punishment:</span> Avoid using harsh punishments or physical force as a training method. Negative reinforcement can cause fear and anxiety in pets and hinder their progress.
            </p>

            <p><span>Individualized approach:</span> Recognize that each pet is unique and may respond differently to training methods. Tailor your approach to suit the individual needs and personality of each pet.</p>

            <p><span>Consistency is key:</span> Maintain a consistent training routine to help pets understand what is expected of them. Consistency in commands, rewards, and boundaries will aid in their learning process.</p>

            <p><span>Regular exercise and playtime:</span> Provide pets with adequate exercise and playtime to keep them physically and mentally stimulated. This helps prevent boredom and reduces undesirable behaviors.
            </p>

            <p><span>Health monitoring:</span> Keep a close eye on the pets' health and report any concerns or issues to the appropriate staff or veterinarian.
            </p>

            <p><span>Cleanliness and hygiene:</span> Maintain a clean and hygienic environment for the pets. Regularly clean their living areas and sanitize equipment to prevent the spread of diseases.</p>

            <p><span>Communication with pet owners:</span> Stay in touch with the owners to update them on their pets' progress and any concerns that arise during training or care.</p>
           </div>
            
            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
            
        </main>
        

        

        <script src="../Admin/JS/script.js"></script>


    </div>
    </main>
    </div>

</body>

</html>

<?php
}
?>
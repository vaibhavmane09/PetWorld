<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pets</title>
    <style>
        .container{
            width: 30rem;
            border: 1px solid;
            margin: 15rem 35rem;        
}
        .container form{
            margin: 1rem 0 1rem 5rem;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <form action="#" method="post">
            <h2>Add Pets</h2>
            <label for="name">Name:</label>
            <input type="text" name="name"> <br><br>

            <label for="nickname">Nick Name:</label>
            <input type="text" name="nickname"> <br><br>

            <label for="age">Age</label>
            <input type="text" name="age"><br><br>

            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $nickname=$_POST['nickname'];
            $age=$_POST['age'];

            if($name=="charli777" && $nickname=="777" && $age=="20"){
                echo "<script>";
                echo "alert ('Thank You!!')";
                echo "</script>";
            }
            else{
                echo "<script>";
                echo "alert ('Sorry Enter Valid Details')";
                echo "</script>";
            }
        }
        ?>

    </div>

</body>

</html>
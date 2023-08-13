<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $applicationno = $_POST['applicationno'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `querydb`.`entry` (`name`, `age`, `gender`, `email`, `phone`,`applicationno`,`query`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone','$applicationno', '$desc', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIIT Delhi admission query</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="iiit_delhi.jpg" alt="IIIT Delhi">
    <div class="container">
        <h1>Welcome to IIIT Delhi admission Qery Form</h1>
        <p>Enter your details and any query related to admission in IIIT Delhi </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your Query. We are Will get back to you in 1-2 working days</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" id="age" name="age" min="10" max="60" default="10" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <input type="text"  name="applicationno" id="applicationno" placeholder="Enter your Jee Application number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Your query related to admission"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>

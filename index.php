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
    $age = $_POST['age'];
    $occupation = $_POST['occupation'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $other = $_POST['other'];
    $sql = "INSERT INTO `trip`.`drip` (`name`, `age`, `occupation`, `gender`, `email`, `phone`, `service`, `other`, `dt`) VALUES ('$name', '$age', '$occupation', '$gender', '$email', '$phone', '$service', '$other', current_timestamp());";
    
    

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="mountain.jpg" alt="mountain">
    <div class="container">
        <h1>Welcome to our Travel Agency</h1>
            <p>Enter your details and submit this form to confirm your participation in the trip </p>
            <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We will contact you soon.</p>";
        }
    ?>
            <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <input type="text" name="age" id="age" placeholder="Enter your Age">
                <input type="text" name="occupation" id="occupation" placeholder="Enter your designation">
                <select id="gender" name="gender">
                    <option value="0"><span id="selection">Select Your Gender ...</span> </option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                </select>
                <input type="email" name="email" id="email" placeholder="Enter your email">
                <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
                <select id="service" name="service">
                    <option value="0"><span id="selection">Service you want ... </span></option>
                    <option value="room">Room</option>
                    <option value="kitchen">Kitchen</option>
                    <option value="parking">Parking</option>
                    <option value="guide">Tour guide</option>
                </select>
                <textarea name="other" id="other" cols="30" rows="10"
                    placeholder="Enter any other information here"></textarea>
                <button class="btn">Submit</button>
            </form>
    </div>
    <script src="index.js"></script>

</body>

</html>
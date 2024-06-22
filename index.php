<?php
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    // $database = "enquiry-form";

    // Create a connection
    $con = mysqli_connect($server, $username, $password);

    // Check the connection
    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }


    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $enquiryfor = $_POST['enquiryfor'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `enquiry_form` .`form` (`name`, `age`, `email`, `number`, `gender`, `purpose`, `other`, `dt`) VALUES ('$name', '$age', '$email', '$phone', '$gender', '$enquiryfor', '$desc', current_timestamp());";

    // echo $sql;

    if ($con->query($sql) === TRUE) {
        echo "Successfully inserted";
    } else {
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
    <title>Enquiry Form</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h3>Welcome to Enquiry Form</h3>
        <p>Enter your details and submit the form</p>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name" required>
            <input type="number" name="age" id="age" placeholder="Enter Your Age" required>
            <input type="email" name="email" id="email" placeholder="Enter Your Email" required>
            <input type="number" name="phone" id="phone" placeholder="Enter Your Phone Number" required>
            <br>
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <label for="enquiryfor">Enquiry-for</label>
            <select id="enquiryfor" name="enquiryfor" required>
                <option value="Fees">Fees</option>
                <option value="Admission">Admission</option>
                <option value="Campus-Visit">Campus Visit</option>
                <option value="Other">Other</option>
            </select>
            <br><br>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Please mention other enquiry if selected"></textarea>
            <br>
            <button class="btn" type="submit">Submit</button>
            <button class="btn" type="reset">Reset</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>

</html>

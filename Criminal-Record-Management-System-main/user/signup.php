<?php

include 'db_connect.php';
if (isset($_POST["loginbutton"])) {
    $full_name = $_POST["Fname"];
    $adar_num = $_POST["Aadharno"];
    $fon_num = $_POST["PhNo"];
    $mail_id = $_POST["EmailID"];
    $pass = $_POST["Cpass"];
    $vid=$_POST["voter_id"];


    $sql = "INSERT INTO `users` (`IDnumber`,`Pass`,`Full_Name`,`email`,`phno`,`voter_id`) VALUES ('$adar_num', '$pass', '$full_name', '$mail_id', '$fon_num','$vid')";

    $rs = mysqli_query($conn, $sql);

    if (!$rs) {
        echo mysqli_error($conn);
    }
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criminal Record Management System</title>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>

<body>
    <div class="loginbox">
        <img src="images/avatar.jpg" class="avatar">
        <!-- <h1>CRMS</h1> -->
        <form action="signup.php" method="POST">
            <h1>User Sign Up</h1>
            <label for="Fullname"><b>Name</b></label>
            <input type="text" name="Fname" placeholder="Enter the Full name" id="Fullname" required>
            <label for="idnumber"><b>ID number</b></label>
            <input type="text" name="Aadharno" placeholder="Enter IDNumber" id="IDNumber" required>
            <label for="Phone Number"><b>Phone Number</b></label>
            <input type="text" name="PhNo" placeholder="Enter the Phone Number" id="Phone Number" pattern="[0-9]{10}"  required>
            <label for="Email ID"><b>Email ID</b></label>
            <input type="text" name="EmailID" placeholder="Enter the Email ID" id="Email ID" required>
            <label for="password"><b>Password</b></label>
            <input type="password" name="Cpass" placeholder="Enter the Password" id="password" required>
            <label for="Number"><b>voter_id</b></label>
            <input type="text" name="voter_id" placeholder="Enter the voter_id" id="Number" required>
            <input type="submit" name="loginbutton" value="Sign Up">
            <p style="text-align: center">
                <a href="http://localhost/Criminal-Record-Management-System-main/">Click to go Back</a>
            </p>
        </form>
    </div>
</body>

</html>
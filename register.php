<?php

include('config.php');

$posted = false;
$empfirstname = $_GET['fname'];
$emplastname = $_GET['lname'];
$newUsername = $_GET['uname'];
$newPassword = hash("md5", $_GET['pass']);
$newEmail = $_GET['email'];
$empPhone = $_GET['phone'];
$empType = $_GET['admin'];

$sql = ("INSERT INTO employees (emp_firstname, emp_lastname, emp_username, emp_password, emp_type, emp_email, emp_phone) VALUES ('$fname', '$lname', '$uname', '$pass', '$admin', '$email', '$phone')");

// Note that we don't store the password, we store the hash of the password. Once this script is done executing, no one involved in the website (except for the original user) will know that the password is


if (mysqli_query($con, $sql)) {
    $posted = true;
 } else { 
    $posted = false;
}

if ($posted) {
    echo "<p style='position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * Registation Successfully!</p>";
    include('index.php');
} else {
    echo "<p style='position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * Registration Failed. Please try again!</p>";
    include('registerPage.php');
}
mysqli_close($con);
?>



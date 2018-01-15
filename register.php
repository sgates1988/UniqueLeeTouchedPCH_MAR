<?php

include('config.php');

$posted = false;
$empfirstname = $_POST['empfirstname'];
$emplastname = $_POST['emplastname'];
$newUsername = $_POST['newUsername'];
$newPassword = $_POST['newPassword'];
$newEmail = $_POST['newEmail'];
$empPhone = $_POST['newPhone'];
$empType = $_POST['empType'];


$sql = "INSERT INTO employees (emp_firstname, emp_lastname, emp_username, emp_password, emp_type, emp_email, emp_phone) VALUES ('$empfirstname', '$emplastname', '$newUsername', '$newPassword', '$empType', '$newEmail', '$empPhone')";

if (mysqli_query($con, $sql)) {
    $posted = true;
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



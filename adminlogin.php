<?php

include('config.php');
if (isset($_POST['empUsername'])) {
$myusername = $_POST['empUsername'];
$mypassword = $_POST['empPassword'];


$sql = "SELECT emp_firstname, emp_lastname FROM employees WHERE emp_username='$myusername' and emp_password='$mypassword' and emp_type='admin'";

$result = mysqli_query($con, $sql);

$count = mysqli_num_rows($result);
$row = mysqli_fetch_row($result);

if ($count == 1) {
    echo "<p style=' float:right; position:relative; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > Welcome: $row[0] $row[1]</p>";
    
    include('admin.php');
} else {
    echo "<p style=' position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > Incorrect Username or Password. Please try again!</p>";
    include('adminloginPage.php');
}
} else {
    include('adminloginPage.php');
}
?>

<?php
session_start();
define('MyConst', TRUE);
require('config.php');

if (isset($_POST['empUsername']) and isset($_POST['empPassword'])) {
    $myusername = $_POST['empUsername'];
    
    $mypassword = hash("md5", $_POST['newPassword']);
    

    $sql2 = "SELECT emp_password FROM employees WHERE emp_username = '$myusername'";

    $result2 = mysqli_query($con, $sql2);

    $count2 = mysqli_num_rows($result2);
    echo $count2;
    $row2 = mysqli_fetch_row($result2); 
  
    $sql = "SELECT emp_firstname, emp_lastname, emp_type FROM employees WHERE emp_username='$myusername' and emp_password='$mypassword'";

    $result = mysqli_query($con, $sql);

    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_row($result);
    $cookie_user = "user";
    $cookie_value = "$row[0] $row[1]";
    setcookie($cookie_user, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    
    
    if ($row[2] == "admin" && $capCheck = true){
        $_SESSION["admin"] = true;
    } else {
        $_SESSION["admin"] = false;
    }
    
    if (!isset($_COOKIE[$cookie_user])) {
        echo "";
    } else {
        echo "";
    }
 
    if ($count == 1) {
        
        $_SESSION['empUsername'] = $myusername;
        echo "<p style=' float:right; position:relative; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > Welcome: $row[0] $row[1]</p>";
        echo $mypassword;
        define('accessGranted', TRUE); include('mar.php');
    } else {
        echo "<p style='position:relative; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > Incorrect Username or Password. Please try again! </p>";
        echo $mypassword;
include('index.php');
    } 
    } else {
    include('index.php');
}

?>


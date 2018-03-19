<?php

session_start();
define('MyConst', TRUE);
include('config.php');

$posted = false;
$resident = $_GET['ResName'];
$bp = $_GET['bp'];
$temp = $_GET['temp'];
$weight = $_GET['weight'];
//$t = time();
//$timestamp = (date("m-d-Y", $t));

$sql = "INSERT INTO vitals (res_name, bp, temp, weight , timestamp)VALUES ('$resident', '$bp', '$temp', '$weight', NOW())";

if (mysqli_query($con, $sql)) {
    $posted = true;
} else {
    $posted = false;
}
mysqli_close($con);
?>

<?php

if ($posted) {
    echo "<p style=' position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:400px;' > * A new Vital Record was added Successfully</p>";
   
} else {
    echo "<p style='position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * Request Failed. Please try again!</p>";
}
?>
<?php

session_start();
define('MyConst', TRUE);
include('config.php');

$posted = false;
$resident = $_GET['ResName'];
$bp = $_GET['bp'];
$temp = $_GET['temp'];
$weight = $_GET['weight'];
$pulse = $_GET['pulse'];
$date = date("Y-m-d");
//$t = time();
//$timestamp = (date("m-d-Y", $t));

$sql = "INSERT INTO vitals (res_name, bp, temp, weight , pulse , timestamp , entryDate)VALUES ('$resident', '$bp', '$temp', '$weight', '$pulse' , NOW(), '$date')";

if (mysqli_query($con, $sql)) {
    $posted = true;
} else {
    $posted = false;
}
mysqli_close($con);
?>

<?php

if ($posted) {
    echo "<p style=' position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:400px;' > * A new Vital Record was added Successfully<br><span>Resident: $resident</span><br><span>Weight: $weight</span><br><span>Blood Pressure: $bp</span><br><span>Pulse: $pulse</span><br><span>Temperature: $temp</span></p>";
   
} else {
    echo "<p style='position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * Request Failed. Please try again!</p>";
}
?>
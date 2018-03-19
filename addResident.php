<?php

include('config.php');

$posted = false;
$residentname = $_GET['res'];
$res_allergies = $_GET['allergies'];
$res_diet = $_GET['diet'];


$sql = "INSERT INTO residents (res_name, res_allergies, res_diet, timestamp) VALUES ('$residentname', '$res_allergies', '$res_diet', DATE_FORMAT(NOW(),'%m-%d-%Y %H:%i:%s'))";

if (mysqli_query($con, $sql)) {
    $posted = true;
} else {
    $posted = false;
}
mysqli_close($con);
?>

<?php

if ($posted) {
    echo "<p style='position:relative; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * A new Resident was added Successfully!</p>";
    
} else {
    echo "<p style='position:relative; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * Request Failed. Please try again!</p>";
    
}
?>

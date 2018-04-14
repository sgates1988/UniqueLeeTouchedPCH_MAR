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
   echo "<div  style='text-align:center';>
<p style=' position:absolute; padding-left:10px; padding-right:10px; background-color: lightgrey; width:auto;' >
<h2>* Resident registration was completed successfully</h2>
<button role='button' style='background-color: grey; color:white;' onclick='getAdmin();return false'>Return to Admin Tool</button>
<br>
<h3>Your Information has been saved as: </h3>
<br>
<strong>Resident: </strong>$residentname
<br>
<strong>Diet: </strong>$res_diet
<br>
<strong>Allergies: </strong>$res_allergies
</p>
</div>";
} else {
    echo "<div>
<p style=' position:absolute; padding-left:10px; padding-right:10px; background-color: lightgrey; width:auto;' >
<h2>! Unable to complete registration. Please Try Again and check information</h2>
<button role='button' style='background-color: grey; margin-left: 35%; color:white;' onclick='getAdmin();return false'>Return to Admin Tool</button>
</p>
</div>";
}
?>

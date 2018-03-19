<?php

include('config.php');

$posted = false;
$id = $_GET['id'];
$resident = $_GET['res'];
$allergies = $_GET['allergies'];
$diet = $_GET['diet'];

//$date = $_GET['date'];
$sql = "UPDATE residents SET res_name = '$resident', res_diet = '$diet', res_allergies = '$allergies', timestamp = DATE_FORMAT(NOW(),'%m-%d-%Y %H:%i:%s') WHERE res_id = '$id'";

    if (mysqli_query($con, $sql)) {
        $posted = true;
    } else {
        $posted = false;
    }
mysqli_close($con);
?>

<?php

if ($posted) {
    echo "<div>
<p style=' position:absolute; padding-left:10px; padding-right:10px; background-color: lightgrey; width:auto;' >
<h2>* Resident information was updated Successfully</h2>
<button role='button' style='background-color: grey; margin-left: 35%; color:white;' onclick='getAdmin();return false'>Return to Admin Tool</button>
<br>
<h3>Your Information has been saved as: </h3>
<br>
<span>Resident: $resident</span>
<br>
<span>Diet: $diet</span>
<br>
<span>Allergies: $allergies</span>
</p>
</div>";
} else {
    echo "<div>
<p style=' position:absolute; padding-left:10px; padding-right:10px; background-color: lightgrey; width:auto;' >
<h2>! Unable to complete update. Please Try Again and check information</h2>
<button role='button' style='background-color: grey; margin-left: 35%; color:white;' onclick='getAdmin();return false'>Return to Admin Tool</button>
</p>
</div>";}
?>
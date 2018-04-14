<?php

include('config.php');

$posted = false;

$sql = "SELECT * FROM prn_records WHERE response is null or response = '';";
$result = mysqli_query($con, $sql);



if ($result == false) {
    echo "No results Found";
} else {
    $count = mysqli_num_rows($result);
    while ($row = $result->fetch_assoc()) {
        $i = 0;
        $names = $row['res_name'];
        if ($i < $count) {
            $posted = true;
        } else {
            $posted = false;
        }
    }
}

?>

<?php

if ($posted) {
    echo "<p style=' position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:auto;' > * Alert: You have PRN responses to complete!!</p>";
} else {
    }
?>
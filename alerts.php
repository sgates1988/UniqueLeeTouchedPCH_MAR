<?php

include('config.php');

$posted = false;

$sql = "SELECT * FROM prn_records WHERE response IS NULL;";
$result = mysqli_query($con, $sql);



if ($result == false) {
    echo "No results Found";
} else {
    $count = mysqli_num_rows($result);
    while ($row = $result->fetch_assoc()) {
        $i = 0;
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
    echo "<p style=' position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * Alert: You have PRN responses to complete!!</p>";
} else {
    }
?>
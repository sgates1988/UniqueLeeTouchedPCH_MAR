<?php
session_start();
if (isset($_GET['access'])) {
    $accessGranted = $_GET['access'];
    if ($accessGranted !== "true") {
    die('Direct access not permitted');
}
} else {
 die('Direct access not permitted');  
}
?>
<html>  
    <head>
        <script src="js/vitals.js" type="text/javascript"></script>
        <title>MAR</title>
    </head>
    <div>
        <h2>Vitals</h2>
    </div>
    <div class="section">
        <h3 style="text-align: left; color: black">Resident Information</h3>
            <label>* Resident: </label>
            <br>
            <select id="ResName" name="ResName" style="margin-bottom:20px; height: 40px;" class="select">
                <option value=''>Select.......</option>
                <?php
                include('config.php');

                $sql = "SELECT * FROM residents";
                $result = mysqli_query($con, $sql);

                while ($row = $result->fetch_assoc()) {
                    ?>

                    <option value="<?php echo $row['res_name'] ?>"><?php echo $row['res_name']; ?></option>

                <?php }
                ?>
            </select>
            <br>
            <label>* Blood Pressure: (ex. 120/90)</label>
            <br>
            <input type="text" id="bp" class="search-box" name="bp" placeholder=""/> 
            <br>
            <label>* Temperature:</label>
            <br>
            <input type="text" id="temp"  class="search-box" name="temp"/>  
            <br>
            <label>* Weight:</label>
            <br>
            <input type="text" id="weight" class="search-box" name="weight"/>  
            <br>
            <p id="errormsg"></p>
            <button onclick="submitVitals(document.getElementById('ResName').value, document.getElementById('bp').value, document.getElementById('temp').value, document.getElementById('weight').value);return false;">Submit</button>
        
    </div>
</body>
</html>


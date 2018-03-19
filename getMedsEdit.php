
    Select Medication:
    <select  name="resident" id="resident5" class="select" style="width: 250px; " onchange="editMedication(this.value)">
        <option id="" name="" value="">Select....</option>
        <?php
        $resident = $_GET['res'];
        include('config.php');

        $sql = "SELECT * FROM res_medications WHERE res_name = '$resident' AND status ='active' ORDER BY time_slot LIKE '%AM%' DESC, SUBSTR(time_slot, 1, 2)";
        $result = mysqli_query($con, $sql);

        while ($row = $result->fetch_assoc()) {
            ?>


        <option id="resident5"name="residents" value="<?php echo $row['med_record_id'] ?>"><?php echo $row['med_name'] . " ........ " . $row['time_slot']; ?></option>

    <?php }
    ?>
    
</select>  
<button onclick='editMedication(document.getElementById("medID").value)'>NEXT</button>

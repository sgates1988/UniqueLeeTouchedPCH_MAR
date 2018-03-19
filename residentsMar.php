<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <h2>Residents Medical Records</h2>
        </div>

        <div id="selectResident" class="section" >
            <h3>Select a Resident</h3>
            <select id="Residents" name="Residents" onchange="displayRes(this.value)">
                <option name="residents" value="">Select an resident....</option>
                <option name="residents" value="all">All</option>
                <?php
                include('config.php');

                $sql = "SELECT * FROM residents";
                $result = mysqli_query($con, $sql);

                while ($row = $result->fetch_assoc()) {
                    ?>

                    <option name="residents" value="<?php echo $row['res_name'] ?>"><?php echo $row['res_name']; ?></option>

                <?php }
                ?>
            </select>

            <button type="reset" onclick="resetRes()"> Reset </button>
        </div>

        <div name="resInfoSection" >
            <p id="resInfo"></p>
        </div>
    </body>
</html>

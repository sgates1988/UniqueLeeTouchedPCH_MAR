<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="js/logout.js" type="text/javascript"></script>
        <script src="js/all.js" type="text/javascript"></script>
        <link href="css/mar.css" rel="stylesheet" type="text/css"/>
        <title>MAR</title>
    </head>
    <body>
        <div id="header">
            <input class="button"  style="float:right" value="Logout" type="submit" onclick="logout()"</input>
            <h1>
                UniqueLee Touched Personal Care Home
            </h1>
            <h2>
                Medical Administration Records
            </h2>
        </div>
        <div>
        <h2>Residents Information</h2>
        <div id="selectResident" class="section" >
            <h3>Select a Resident</h3>
            <select id="Residents" name="Residents" onchange="displayRes(this.value)">
                <option name="residents" value="">Select an resident....</option>
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
        </div>
        <div name="resInfoSection" >
            <p id="resInfo"></p>
        </div>
        </div>
    </body>
</html>

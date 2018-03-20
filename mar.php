<?php
if (!defined('MyConst')) {
    die('Direct access not permitted');
}
?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="js/logout.js" type="text/javascript"></script>
        <script src="js/all.js" type="text/javascript"></script>
        <link href="css/mar.css" rel="stylesheet" type="text/css"/>
        <script src="js/vitals.js" type="text/javascript"></script>
        <script src="js/admin.js" type="text/javascript"></script>
        <script src="js/editResident.js" type="text/javascript"></script>
        <script src="js/editMedication.js" type="text/javascript"></script>
        <script src="js/reports.js" type="text/javascript"></script>
        <title>MAR</title>
    </head>

    <body>
        <?php
        include 'header.php';
        ?>
                <div> 
                    <div>
                        <p id="msg" style="position:  relative; display: inline-block; margin-bottom: 30px;"></p>
                    </div>
                    <div id='fullPage'>

                        <div>
                            <h2>Residents Medical Records</h2>
                        </div>

                        <div id="selectResident" class="section" >
                            <h3>Select a Resident</h3>
                            <select class="search-box" id="Residents" name="Residents" onchange="displayRes(this.value)">
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
                    </div>
                </div>          
                <div style="height: 100px">

                </div>
            </div>
        </div>

    </body>
</html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Resident</title>
        <link href="css/mar.css" rel="stylesheet" type="text/css"/>
        <script src="js/editResident.js" type="text/javascript"></script>
    </head>
    <style>
        /* Style the tab buttons */
        .tablink {
            background-color: #555;
            color: white;
            float: left;
            border: 2px solid white;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 17px;
            width: 25%;
        }

        /* Change background color of buttons on hover */
        .tablink:hover {
            background-color: black;
        }

        /* Set default styles for tab content */
        .tabcontent {
            color: white;
            display: none;
            padding: 50px;
            text-align: center;
        }


    </style>

    <body>
        <div>
 <?php
            $name = $_GET['res'];
            include('config.php');
            $sql = "SELECT * FROM residents WHERE res_name = '" . $name . "'";
            $result = mysqli_query($con, $sql);

            while ($row = $result->fetch_assoc()) {
                $con->close();

                $id = $row['res_id'];
                $resident = $row['res_name'];
                $allergies = $row['res_allergies'];
                $diet = $row['res_diet'];
                ?>
                <form style="padding-left:10px;">
                    <input id="residentId" name="residentId" class="search-box" hidden value="<?php echo $id ?>"/>

                    <label>* Resident: </label>
                    <br>
                    <input id="residentName" name="residentName" class="search-box" value="<?php echo $resident ?>"/>
                    <br>
                    <label>* Allergies: </label>
                    <br>
                    <div class="search-wrapper">
                        <input required type="text" id="res_allergies" name="res_allergies"class="search-box" style="height: 100px" placeholder="Enter Residents Allergies" value="<?php echo $allergies ?>"/>
                    </div>
                    <label>* Diet: </label>
                    <br>
                    <div class="search-wrapper">
                        <input required type="text" id="res_diet" name="res_diet" class="search-box" style="height: 100px" placeholder="Enter Residents Diet" value="<?php echo $diet ?>"/>
                    </div>
                    <button class="button" onclick="updateRes(document.getElementById('residentId').value, document.getElementById('residentName').value, document.getElementById('res_allergies').value, document.getElementById('res_diet').value);return false;">Save</button>
                    <button class="button" onclick="clearForm();return false;">Clear</button>
                </form>

            <?php }
            ?>
        </div>
    </body>
</html>

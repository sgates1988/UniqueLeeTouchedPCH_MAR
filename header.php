<html>
    <head>
        <title></title>
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

    <body onload="getAlerts();document.getElementById('mar').style.background = 'red';" >
        <p style="float:left"  id="alerts"></p>
    <input class="button"  style="float:right" value="Logout" type="submit" onclick="logout()"/>
    <div class="container">
        <header>
            
            <h4 style="color:pink; text-align: center; font-size: 16pt">UniqueLee Touched Personal Care Home </h4>
            <h3 style="color: white; text-align: center">
                Medical Administration Records
            </h3>
        </header>
        <div style="text-align:center;">
            <div id="page">

                <button class="tablink" id="mar" onclick="getMAR(); return false">Medical Records</button>
                <button class="tablink"  id="vitals" onclick="getVitals(); return false">Vitals</button>
                <?php
                include('config.php');
                $admin = $_COOKIE['admin'];

                if ($admin == "admin") {
                    ?>
                    <button class="tablink"  id="admin" onclick="getAdmin();return false">Admin</button>
                    <button class="tablink"  id="vitals" onclick="(); return false">File Manager</button>
                    <?php
                }
                ?>
                    
            </div>
        </div> 
</body>
</html>
<head>
    <title>UniqueLee Touched PCH</title>
    <link href="css/registerPage.css" rel="stylesheet" type="text/css"/>
    <script src="js/all.js" type="text/javascript"></script>

</head>
<body>
    <div class="header">
        <h1>
            UniqueLee Touched Personal Care Home
        </h1>
        <h2>
            Medical Administration Records
        </h2>
        <img src="images/logo.png" alt="logo"/>
    </div>
    <div class="registerbox">
        <h3>
            New Employee Registration
        </h3>
        <form id="register" >
            <label> First Name: </label>
            <input type="text" name="empfirstname"/>
            </br>
            <label> Last Name: </label>
            <input type="text" name="emplastname"/>
            </br>
            <label> Username: </label>
            <input type="text" name="newUsername"/>
            </br>
            <label> Password: </label>
            <input type="password" name="newPassword"/>
            </br>
            <label> Email: </label>
            <input type="email" name="newEmail"/>
            </br>
            <label> Phone: </label>
            <p id="msgPassword"></p>
            <input  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" type="tel" name="newPhone" maxlength="10" onsubmit="check()"/>
            </br>
            <label> Employee Type: </label>
            <select name="empType">
                <option value="regular"> Non-Admin</option>
            </select>
            </br>
            </br>
            </br>
            <button class="button"  style="width: 100px;" onclick="register(document.getElementById('fname').value, document.getElementById('lname').value, document.getElementById('uname').value, document.getElementById('pass').value, document.getElementById('emali').value, document.getElementById('phone').value, document.getElementById('admin').value); return false;">
        </form>
    </div>
</div>
</br>
<a class="button" href="index.php">Click here to return to MAR login page</a>
<div>
</body>
</html>

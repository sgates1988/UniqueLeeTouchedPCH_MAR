function updateRes(id, res_name, allergies, diet) {
    var access = true;
    if (res_name === "" || allergies === "" || diet === "") {

        document.getElementById("msgRes").innerHTML = "* All fields are required";
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("selectRes").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "updateResident.php?id=" + id + "&res=" + res_name + "&allergies=" + allergies + "&diet=" + diet + "&access=" + access, true);
        xmlhttp.send();
    }
}
function getInfo(res) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("selectRes").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "editResident.php?res=" + res, true);
    xmlhttp.send();
}
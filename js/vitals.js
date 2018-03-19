function getVitals() {
    var access = true;
    document.getElementById("msg").innerHTML = "";
    document.getElementById("mar").style.background = "#555";
    document.getElementById("admin").style.background = "#555";
    document.getElementById("vitals").style.background = "red";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("fullPage").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "vitals.php?access=" + access, true);
    xmlhttp.send();

}


function getMAR() {
    document.getElementById("msg").innerHTML = "";
    document.getElementById("mar").style.background = "red";
    document.getElementById("admin").style.background = "#555";
    document.getElementById("vitals").style.background = "#555";

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("fullPage").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "residentsMar.php", true);
    xmlhttp.send();

}
function submitVitals(res, bp, temp, weight) {
    if (bp === "" & temp === "" & weight === "" || res === "" & bp === ""  || res === "" & temp === "" || res === "" & weight === "") {
        document.getElementById("errormsg").innerHTML = "<p style='background-color: yellow;'>* Resident  and atleast (1) vital required</p>";
    } else {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("msg").innerHTML = this.responseText;
                document.getElementById("errormsg").innerHTML = "";
                var resident = document.getElementById("ResName").value = "";
                var bp = document.getElementById("bp").value = "";
                var temp = document.getElementById("temp").value = "";
                var weight = document.getElementById("weight").value = "";
            }
        };
        xmlhttp.open("GET", "addVitals.php?ResName=" + res
                + "&bp=" + bp
                + "&temp=" + temp
                + "&weight=" + weight, true);
        xmlhttp.send();

    }
}
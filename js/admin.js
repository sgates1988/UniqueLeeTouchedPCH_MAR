function newResModalOpen() {
    document.getElementById('newResModal').style.display = '';
    document.getElementById('newResModal').style.display = 'block';
}

function newResModalClose() {
    document.getElementById('newResModal').style.display = 'none';
}

function editResModalOpen() {
    if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                 document.getElementById("admin-content").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "selectResidentEdit.php?=", true);
        xmlhttp.send();
    }
    
    function editMedModalOpen() {
    if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                 document.getElementById("admin-content").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "selectMedicationEdit.php?=", true);
        xmlhttp.send();
    }

function editResModalClose() {
    document.getElementById('editResModal').style.display = 'none';
}

function medModalOpen() {
    document.getElementById('medModal').style.display = '';
    document.getElementById('medModal').style.display = 'block';
}

function medModalClose() {
    document.getElementById('medModal').style.display = 'none';
}

function prnDisable(prn) {
    if (prn === "PRN") {
        var elements = document.getElementById("opts").options;

        for (var i = 0; i < elements.length; i++) {
            elements[i].selected = false;
        }
        document.getElementById('opts').required = false;
        document.getElementById('time').style.display = 'none';
        document.getElementById('PRN').style.display = '';


    } else {
        var elements = document.getElementById("optsPRN").options;

        for (var i = 0; i < elements.length; i++) {
            elements[i].selected = false;
            document.getElementById('optsPRN').required = true;
            document.getElementById('PRN').style.display = 'none';
            document.getElementById('time').style.display = '';


        }
    }
}

function addRes(res, allergies, diet) {
    if (res === "" || allergies === "" || diet === "") {

        document.getElementById("msgRes").innerHTML = "* All fields are required";
    } else {

        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById('newResModal').style.display = 'none';
                document.getElementById("admin-content").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET", "addResident.php?res=" + res + "&allergies=" + allergies + "&diet=" + diet, true);

        xmlhttp.send();
    }
}

function clearForm() {
    document.getElementById('res_name').value = "";
    document.getElementById('res_allergies').value = "";
    document.getElementById('res_diet').value = "";
}

function cancel() {
     var access = true;

    document.getElementById("msg").innerHTML = "";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("fullPage").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "admin.php?access=" + access, true);
    xmlhttp.send();

}


function getAdmin() {
    var access = true;

    document.getElementById("mar").style.background = "#555";
    document.getElementById("admin").style.background = "#c92c34";
    document.getElementById("vitals").style.background = "#555";
    document.getElementById("msg").innerHTML = "";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("fullPage").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "admin.php?access=" + access, true);
    xmlhttp.send();

}


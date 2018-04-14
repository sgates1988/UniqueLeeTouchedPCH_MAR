function register(fname, lname, uname, pass, email, phone, admin) {
   
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("all").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "register.php?fname=" + fname + "&lname=" + lname + "&uname=" + uname + "&pass=" + pass + "&email=" + email + "&phone=" + phone + "&admin=" + admin, true);
        xmlhttp.send();
    }

function displayRes(str) {
    if (str === "all") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("resInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getAllSchedule.php?q=" + str, true);
        xmlhttp.send();


    } else if (str === "") {
        document.getElementById("resInfo").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("resInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getResInfo.php?q=" + str, true);
        xmlhttp.send();
    }
}

function displayMeds(med, name) {
    if (med === "") {
        document.getElementById("medInfo").innerHTML = "";
        return;
    } else if (med === "all") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("medInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getAllMedInfo.php?med=" + med + "&res=" + name, true);
        xmlhttp.send();
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("medInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getMedInfo.php?med=" + med + "&res=" + name, true);
        xmlhttp.send();
    }
}

function displayMedTime(time_slot, med, resident, emp_name) {

    if (time_slot === "") {
        document.getElementById("medTimeInfo").innerHTML = "";
        return;
    } else if (time_slot === "all") {
        document.getElementById("medTimeInfo").innerHTML = "display all";
        return;
    } else if (time_slot === "PRN") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("medTimeInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "prnPage.php?res=" + resident + "&med=" + med, true);
        xmlhttp.send();
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("medTimeInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getMedTimeInfo.php?time_slot=" + time_slot + "&med=" + med + "&res=" + resident + "&emp=" + emp_name, true);
        xmlhttp.send();
    }
}

function displayScheduleMedTime(time_slot, med_name, resident, emp_name) {

    if (time_slot === "") {
        document.getElementById("resInfo").innerHTML = "Error";
        return;
    } else if (time_slot === "PRN") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("resInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "prnPage.php?res=" + resident + "&med=" + med_name, true);
        xmlhttp.send();
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("resInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getMedTimeInfo.php?time_slot=" + time_slot + "&med=" + med_name + "&res=" + resident + "&emp=" + emp_name, true);
        xmlhttp.send();
    }
}



function displayAllMedTime(time_slot, love, resident, emp_name) {

    if (time_slot === "") {
        document.getElementById("medTimeInfo").innerHTML = "";
        return;
    } else if (time_slot === "all") {
        document.getElementById("medTimeInfo").innerHTML = "display all";
        return;
    } else if (time_slot === "PRN") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("medInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "prnPage.php?res=" + resident + "&med=" + love, true);
        xmlhttp.send();
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("medInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getMedTimeInfo.php?time_slot=" + time_slot + "&med=" + love + "&res=" + resident + "&emp=" + emp_name, true);
        xmlhttp.send();
    }
}


function addRecord(med_id, selectedDate, status, comments, injectionSite, units, bloodPressure) {
//Setting the values for employee, time, resident and medication
    var emp = document.getElementById("emp").value;
    var time_slot = document.getElementById("time_slot").value;
    var res = document.getElementById("res").value;
    var med = document.getElementById("med").value;


    if (status === "") {
        document.getElementById("error").innerHTML = "*Action is required. Please select an Action.";
    } else {

        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("medInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "updateMedRecord.php?time_slot=" + time_slot + "&med_id=" + med_id + "&med=" + med + "&res=" + res + "&emp=" + emp + "&selectedDate=" + selectedDate + "&status=" + status + "&comments=" + comments + "&injectionSite=" + injectionSite + "&units=" + units + "&bloodPressure=" + bloodPressure, true);
        xmlhttp.send();
    }
}

function prnModalOpen(med) {
    document.getElementById('prnModal').style.display = '';
    document.getElementById('prnModal').style.display = 'block';
    xmlhttp.open("GET", "med=" + med, true);

}

function prnModalClose() {
    document.getElementById('prnModal').style.display = 'none';
}

function prnResponseModalOpen(id) {

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("medInfo").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "prnResponsepage.php?id=" + id, true);
    xmlhttp.send();



}

function prnResponseModalClose() {
    document.getElementById('prnResponseModal').style.display = 'none';
}

function savePrnForm() {
//Setting the values for employee, time, resident and medication
    var residents = document.getElementById("residents").value;
    var date = document.getElementById("date").value;
    var time = document.getElementById("time").value;
    var emp = document.getElementById("emp").value;
    var drug = document.getElementById("drug").value;
    var reason = document.getElementById("reason").value;

    if (residents === "" || date === "" || time === "" || emp === "" || drug === "" || reason === "") {
        document.getElementById("error").innerHTML = "** All fields are required";
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById('medication').value = '';
                document.getElementById("medInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "addPrnEntry.php?residents=" + residents
                + "&date=" + date
                + "&time=" + time
                + "&emp=" + emp
                + "&drug=" + drug
                + "&reason=" + reason, true);
        xmlhttp.send();
    }
}


function savePrnResponseForm() {

    var id = document.getElementById("idfield").value;
    var response = document.getElementById("response").value;
    var responseDate = document.getElementById("response_date").value;
    var responseTime = document.getElementById("response_time").value;
    var responseEmp = document.getElementById("response_emp").value;

    if (id === "" || response === "" || responseDate === "" || responseTime === "" || responseEmp === "") {
        document.getElementById("error").innerHTML = "** All fields are required!";
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById('medication').value = '';
                document.getElementById("medInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "addPrnResponse.php?id=" + id
                + "&response=" + response
                + "&responseDate=" + responseDate
                + "&responseTime=" + responseTime
                + "&responseEmp=" + responseEmp, true);
        xmlhttp.send();
    }
}
function cancelAdmin() {
        document.getElementById('medModal').style.display = 'none';
}


function cancelPrnResponse() {

    document.getElementById('medication').value = '';
    document.getElementById('medInfo').innerHTML = '';

}

function MedRecordEntryModalOpen(selectedDate, BpRequired) {
    document.getElementById('acceptMedRecModal').style.display = '';
    document.getElementById('acceptMedRecModal').style.display = 'block';
    var med = document.getElementById('med').value;
    var res = document.getElementById('res').value;
    var emp = document.getElementById('emp').value;
    var time_slot = document.getElementById('time_slot').value;
    document.getElementById('selectedDate').innerHTML = selectedDate;
    document.getElementById('empcontent').innerHTML = "<strong>" + emp + "</strong>" + "<br>";
    document.getElementById('content').innerHTML = "Please select action for " + res + " " + med + " on " + selectedDate + " at " + time_slot + ".";
    if (BpRequired === "Required") {
        document.getElementById('bp').style.display = 'block';
    } else {
        document.getElementById('bp').style.display = 'none';
    }
}

function acceptMedRecModalClose() {
    document.getElementById('acceptMedRecModal').style.display = 'none';
}

function getAlerts() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("alerts").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "alerts.php", true);
    xmlhttp.send();
}

function checkInjection(status) {
    if (status === "Signed-off") {
        document.getElementById('injection').style.display = '';
    } else {
        document.getElementById('injection').style.display = 'none';
    }
}

function resetMed() {
    document.getElementById('medication').selectedIndex = 0;
    document.getElementById('medInfo').innerHTML = '';
}

function resetRes() {
    document.getElementById('Residents').selectedIndex = 0;
    document.getElementById('resInfo').innerHTML = '';
}
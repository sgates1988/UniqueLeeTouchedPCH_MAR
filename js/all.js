function displayRes(str) {
    if (str === "") {
        document.getElementById("resInfo").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
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
    } else if (med == "all") {
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
        xmlhttp.open("GET", "prnPage.php?res=" + resident, true);
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


function displayAllMedTime(time_slot, med, resident, emp_name) {

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
                document.getElementById("medInfoall").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "prnPage.php?res=" + resident, true);
        xmlhttp.send();
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("medInfoall").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getMedTimeInfo.php?time_slot=" + time_slot + "&med=" + med + "&res=" + resident + "&emp=" + emp_name, true);
        xmlhttp.send();
    }
}


function addRecord(selectedDate,status,comments) {
//Setting the values for employee, time, resident and medication
    var emp = document.getElementById("emp").value;
    var time_slot = document.getElementById("time_slot").value;
    var res = document.getElementById("res").value;
    var med = document.getElementById("med").value;
    
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
    xmlhttp.open("GET", "UpdateMedRecord.php?time_slot=" + time_slot + "&med=" + med + "&res=" + res + "&emp=" + emp + "&selectedDate=" + selectedDate+ "&status=" + status + "&comments=" + comments, true);
    xmlhttp.send();
}

function prnModalOpen() {
    document.getElementById('prnModal').style.display = '';
    document.getElementById('prnModal').style.display = 'block';
}

function prnModalClose() {
    document.getElementById('prnModal').style.display = 'none';
}


function savePrnForm() {
//Setting the values for employee, time, resident and medication
    var residents = document.getElementById("residents").value;
    var date = document.getElementById("date").value;
    var time = document.getElementById("time").value;
    var emp = document.getElementById("emp").value;
    var drug = document.getElementById("drug").value;
    var reason = document.getElementById("reason").value;
    var response = document.getElementById("response").value;
    var responseDate = document.getElementById("response_date").value;
    var responseTime = document.getElementById("response_time").value;
    var responseEmp = document.getElementById("response_emp").value;

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
    xmlhttp.open("POST", "addPrnEntry.php?residents=" + residents
            + "&date=" + date
            + "&time=" + time
            + "&emp=" + emp
            + "&drug=" + drug
            + "&reason=" + reason
            + "&response=" + response
            + "&responseDate=" + responseDate
            + "&responseTime=" + responseTime
            + "&responseEmp=" + responseEmp, true);
    xmlhttp.send();
}




function MedRecordEntryModalOpen(selectedDate) {
    document.getElementById('acceptMedRecModal').style.display = '';
    document.getElementById('acceptMedRecModal').style.display = 'block';
    var med = document.getElementById('med').value;
    var res = document.getElementById('res').value;
    var emp = document.getElementById('emp').value;
    var time_slot = document.getElementById('time_slot').value;
    document.getElementById('selectedDate').innerHTML = selectedDate;
    document.getElementById('content').innerHTML = "Note: " + emp + " By accepting this you authorize the sign off of medication: " + med + " on " + selectedDate + " for " + res + " at " + time_slot + ".";
}



function acceptMedRecModalClose() {
    document.getElementById('acceptMedRecModal').style.display = 'none';
}
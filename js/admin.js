function newResModalOpen() {
    document.getElementById('newResModal').style.display = '';
    document.getElementById('newResModal').style.display = 'block';
}

function newResModalClose() {
    document.getElementById('newResModal').style.display = 'none';
}

function medModalOpen() {
    document.getElementById('medModal').style.display = '';
    document.getElementById('medModal').style.display = 'block';
}

function medModalClose() {
    document.getElementById('medModal').style.display = 'none';
}

function getReport(res) {
    if (res == "All") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("report").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "marReport.php?res=" + res, true);
        xmlhttp.send();
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("report").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "marReport.php?res=" + res, true);
        xmlhttp.send();
    }
}
function Back() {

    window.location.href = 'admin.php';
}

function getPrnReport(res) {
    if (res == "All") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("report").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "prnReport.php?res=" + res, true);
        xmlhttp.send();
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("report").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "prnReport.php?res=" + res, true);
        xmlhttp.send();

    }

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


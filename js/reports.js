function getReport(res , fromDate, toDate, report) {
            if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                 if (report === "mar") {
                 window.open("marReport.php?res=" + res + "&fromDate=" + fromDate + "&toDate=" + toDate + "&report=" + report, true);
             } else if (report === "marDetailed"){
                 window.open("marDetailedReport.php?res=" + res + "&fromDate=" + fromDate + "&toDate=" + toDate + "&report=" + report, true);
             } else if (report === "prn"){
                 window.open("prnReport.php?res=" + res + "&fromDate=" + fromDate + "&toDate=" + toDate + "&report=" + report, true);
             } else if (report === "vitals"){
                 window.open("vitalReport.php?res=" + res + "&fromDate=" + fromDate + "&toDate=" + toDate + "&report=" + report, true);
             }
            }
        };
        xmlhttp.open("GET", "marReport.php?res=" + res + "&fromDate=" + fromDate + "&toDate=" + toDate + "&report=" + report, true);
        xmlhttp.send();
    }


function Back() {
    location.reload();
}
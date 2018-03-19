function getMedsEdit(res_name) {

if (window.XMLHttpRequest) {
xmlhttp = new XMLHttpRequest();
} else {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function () {
if (this.readyState === 4 && this.status === 200) {
document.getElementById("selectMeds").innerHTML = this.responseText;
}
};
        xmlhttp.open("GET", "getMedsEdit.php?res=" + res_name, true);
        xmlhttp.send();
}

function updateMed(id, resident, medication, bp, rxNum, prescriber, tabCount, route, frequency, addltFreq, sideEffects, diagnosis, time_slot, notes) {

        if (window.XMLHttpRequest) {
xmlhttp = new XMLHttpRequest();
} else {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function () {
if (this.readyState === 4 && this.status === 200) {
document.getElementById("selectMeds").innerHTML = this.responseText;
}
};
        xmlhttp.open("GET", "updateMedication.php?id=" + id +
                "&res=" + resident +
                "&medication=" + medication +
                "&bp=" + bp +
                "&rxNum=" + rxNum +
                "&prescriber=" + prescriber +
                "&tabCount=" + tabCount +
                "&route=" + route +
                "&frequency=" + frequency +
                "&addltFreq=" + addltFreq +
                "&sideEffects=" + sideEffects +
                "&diagnosis=" + diagnosis +
                "&time_slot=" + time_slot +
                "&notes=" + notes,
                true);
        xmlhttp.send();
}

function editMedication(med_id) {
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} else {
// code for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
if (this.readyState === 4 && this.status === 200) {
document.getElementById("selectMeds").innerHTML = this.responseText;
}
};
        xmlhttp.open("GET", "editMedication.php?med_id=" + med_id, true);
        xmlhttp.send();
        }
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/db.php');

//variabile
$rezultatSelect = null;

$select = "SELECT cnp, medic.nume, medic.prenume, medic.salariu_initial, COUNT(consultatie.id) AS nr_consultatii
            FROM consultatie 
            LEFT JOIN medic ON consultatie.medic = medic.cnp 
            GROUP BY medic.cnp;"
;
$rezultatSelect = mysqli_query($conn, $select);

function calcSpor($nr) {
    return ($nr >= 3) ? "10" : "0";
}

function calcSalariu($salariu, $inc) {
    return ($inc == 10) ? $salariu = $salariu + ($salariu * 0.1) : $salariu;
}

?>
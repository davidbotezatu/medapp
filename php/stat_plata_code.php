<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/db.php');

//variabile
$rezultatSelect = null;
$impozitVal = 0.165;
$casVal = 0.25;

$select = "SELECT cnp, medic.nume, medic.prenume, medic.salariu_initial, COUNT(consultatie.id) AS nr_consultatii
            FROM consultatie 
            LEFT JOIN medic ON consultatie.medic = medic.cnp 
            GROUP BY medic.cnp;"
;
$rezultatSelect = mysqli_query($conn, $select);

function calcSpor($nr) {
    return ($nr >= 3) ? "10" : "0";
}

function calcSalariuBrut($salariu, $inc) {
    return ($inc == 10) ? $salariu = $salariu + ($salariu * 0.1) : $salariu;
}

function calcSalariuNet($brut, $impozit, $cas) {
    return $brut - $impozit - $cas;
}

if(isset($_POST['submit'])) {
    $luna = filter_input(INPUT_POST, 'luna', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    if($luna != "Luna") {
        $selectLuna = "SELECT cnp, medic.nume, medic.prenume, medic.salariu_initial, COUNT(consultatie.id) AS nr_consultatii
                        FROM consultatie 
                        LEFT JOIN medic ON consultatie.medic = medic.cnp 
                        WHERE MONTH(consultatie.data_programarii) = $luna
                        GROUP BY medic.cnp;";
        $rezultatSelect = mysqli_query($conn, $selectLuna);
    }
}

?>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/db.php');

$select = "SELECT DISTINCT consultatie.id, 
                CONCAT(medic.nume, ' ', medic.prenume) AS medic, 
                CONCAT(pacient.nume, ' ', pacient.prenume) AS pacient, 
                consultatie.data_programarii, 
                consultatie.observatii,
                MIN(rest_plata) AS rest_plata
            FROM consultatie 
            LEFT JOIN medic ON consultatie.medic = medic.cnp 
            LEFT JOIN pacient ON consultatie.pacient = pacient.nr_fisa
            LEFT JOIN plati on consultatie.id = plati.id_consultatie
            GROUP BY id_consultatie
            ORDER BY id";
$rezultatSelect = mysqli_query($conn, $select);


    //calculator pret consultate (interventie 1 + interventie 2 + ... + interventie X)
function getPretConsultatie($id) {
    global $conn;
    //sql select pentru pretul consultatiei (suma tuturor interventiilor efectuate)
    $selectPret = "SELECT SUM(catalog.pret_total) AS pret_consultatie 
                    FROM interventii 
                    LEFT JOIN catalog ON interventii.id_catalog = catalog.id
                    WHERE interventii.id_consultatie = $id";
    $rezultatPret = mysqli_query($conn, $selectPret);
    $p = mysqli_fetch_column($rezultatPret, 0);

    return $p;
}

?>
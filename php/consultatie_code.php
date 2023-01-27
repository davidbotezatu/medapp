<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/db.php');

//variabile
$db_table = "consultatie";
$pacient = $medic = $data = $observatii = $updateID = null;
$rezultatInsert = $rezultatUpdate = null;
$searchErr = null;

//sql select pentru afisare date in tabela din pagina Consultatii
$select = "SELECT consultatie.id, 
            CONCAT(medic.nume, ' ', medic.prenume) AS medic, 
            CONCAT(pacient.nume, ' ', pacient.prenume) AS pacient, 
            consultatie.data_programarii, 
            consultatie.observatii 
        FROM consultatie 
        LEFT JOIN medic ON consultatie.medic = medic.cnp 
        LEFT JOIN pacient ON consultatie.pacient = pacient.nr_fisa";
$rezultatSelect = mysqli_query($conn, $select);

//sql select pentru nume si numar fisa pacient (numele va fi afisat in formular, iar nr_fisa va fi pus in optiune)
$selectPacient = "SELECT nr_fisa, nume, prenume FROM pacient";
$rezultatPacient = mysqli_query($conn, $selectPacient);

//sql select pentru nume si cnp medic (numele va fi afisat in formular, iar cnp-ul va fi pus in optiune)
$selectMedic = "SELECT cnp, nume, prenume FROM medic";
$rezultatMedic = mysqli_query($conn, $selectMedic);

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

//daca avem date in campul de cautare, vom efectua cautarea in baza de date dupa nume/prenume medic sau nume/prenume pacient
if(isset($_POST['cautare'])) {
    $searchString = filter_input(INPUT_POST, 'cautare', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if(strlen($searchString)) {
        $select = $select . " WHERE (medic.nume LIKE '%$searchString%') OR (medic.prenume LIKE '%$searchString%') 
                        OR (pacient.nume LIKE '%$searchString%') OR (pacient.prenume LIKE '%$searchString%')
                        OR (consultatie.data_programarii LIKE '%$searchString%')";
        $rezultatSelect = mysqli_query($conn, $select);

        //deoarece mysqli_query returneaza un obiect, ne uitam in obiect pentru a vedea numarul de randuri gasite
        //daca nu avem nici un rand, inseamna ca valoarea cautata nu exista, si afisam un mesaj utilizatorului
        if ($rezultatSelect->num_rows == 0) {
            $searchErr = "Numele/Prenumele cautat nu exista";
        }
    }
}

//verificam daca suntem in pagina de update
//daca da, luam datele pentru id-ul dat, pentru a le pune in formular
if(isset($_GET['id']) && intval($_GET['id'])) {
    $updateID = $_GET['id'];

    $selectId = "SELECT * FROM $db_table WHERE id = '$updateID'";
    $rezultatUpdate = mysqli_query($conn, $selectId);
    $rand = mysqli_fetch_assoc($rezultatUpdate); 
    $updatePacient = $rand['pacient'];
    $updateMedic = $rand['medic'];
    $updateData = $rand['data_programarii'];
    $updateObs = $rand['observatii'];
}

//verificam intai daca sunt date trimise din formularul Consultatie (consultatie_form.php)
//iar apoi verificam fiecare input in parte daca a fost completat
if(isset($_POST['submit'])){
    if(!empty($_POST['pacientDropdown'])) {
        $pacient = filter_input(INPUT_POST, 'pacientDropdown', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(!empty($_POST['medicDropdown'])) {
        $medic = filter_input(INPUT_POST, 'medicDropdown', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(!empty($_POST['data'])) {
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(!empty($_POST['observatii'])) {
        $observatii = filter_input(INPUT_POST, 'observatii', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //verificam daca se face inserare sau update
    //daca e inserare, trebuie sa vedem daca toate variabilele sunt populate (campul 'observatii' este optional)
    //daca e update, avem nevoie doar de medic, data programarii si observatii (nu are sens sa schimbam si pacientul)
    if(is_null($updateID)) {
        if(!is_null($pacient) && !is_null($medic) && !is_null($data)) {
            $insert = "INSERT INTO $db_table(pacient, medic, data_programarii, observatii) VALUES ('$pacient', '$medic', '$data', '$observatii')";
            $rezultatInsert = mysqli_query($conn, $insert);
        }
    } else {
        if(!is_null($medic) && !is_null($data)) {
            $update = "UPDATE $db_table SET medic = '$medic', data_programarii = '$data', observatii = '$observatii' WHERE id = $updateID";
            $rezultatUpdate = mysqli_query($conn, $update);
        }
    }

    //dupa inserare sau update, revenim in pagina de afisare
    if ($rezultatInsert || $rezultatUpdate) {
        header('Location: ../display/consultatii.php');
    }
}
?>
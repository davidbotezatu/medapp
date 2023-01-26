<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/db.php');

//variabile
$db_table = "consultatie";
$pacient = $medic = $data = $observatii = $updateID = null;
$rezultatInsert = $rezultatUpdate = null;

//sql select pentru afisare date in tabela din pagina Consultatii
$select = "SELECT * FROM $db_table";
$rezultatSelect = mysqli_query($conn, $select);

//sql select pentru nume si numar fisa pacient (numele va fi afisat in formular, iar nr_fisa va fi pus in optiune)
$selectPacient = "SELECT nr_fisa, nume, prenume FROM pacient";
$rezultatPacient = mysqli_query($conn, $selectPacient);

//sql select pentru nume si cnp medic (numele va fi afisat in formular, iar cnp-ul va fi pus in optiune)
$selectMedic = "SELECT cnp, nume, prenume FROM medic";
$rezultatMedic = mysqli_query($conn, $selectMedic);

//functie cautare medic sau pacient dupa un ID unic (medic - cnp, pacient - nr_fisa)
//va returna nume+prenume (concat)
function specificSelect ($id, $flag) {
    global $conn;
    $s = null;

    switch($flag) {
        case 'm':
            $s = "SELECT nume, prenume FROM medic WHERE cnp = '$id'";
            break;
        case 'p':
            $s = "SELECT nume, prenume FROM pacient WHERE nr_fisa = '$id'";
            break;
    }

    $r = mysqli_query($conn, $s);
    $x = mysqli_fetch_assoc($r);

    return $x['nume'] . ' ' . $x['prenume'];
}

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

if(isset($_POST['cautare'])) {
    echo "Search active";
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
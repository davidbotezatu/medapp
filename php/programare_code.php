<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/db.php');

//sql select pentru afisare date in tabela din pagina Programari
$select = "SELECT * FROM programare";
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

//variabile
$pacient = $medic = $data = $updateID = null;
$rezultatInsert = $rezultatUpdate = null;

//verificam daca suntem in pagina de update
//daca da, luam datele pentru id-ul dat, pentru a le pune in formular
if(isset($_GET['id']) && intval($_GET['id'])) {
    $updateID = $_GET['id'];

    $selectId = "SELECT * FROM programare WHERE id = '$updateID'";
    $rezultatUpdate = mysqli_query($conn, $selectId);
    $rand = mysqli_fetch_assoc($rezultatUpdate); 
    $updatePacient = $rand['pacient'];
    $updateMedic = $rand['medic'];
    $updateData = $rand['data_programarii'];
}

//verificam intai daca sunt date trimise din formularul Programare (programare_form.php)
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

    //verificam daca se face inserare sau update
    //daca e inserare, trebuie sa vedem daca toate variabilele sunt populate
    //daca e update, avem nevoie doar de medic si data programarii (nu are sens sa schimbam si pacientul)
    if(is_null($updateID)) {
        if(!is_null($pacient) && !is_null($medic) && !is_null($data)) {
            $insert = "INSERT INTO programare(pacient, medic, data_programarii) VALUES ('$pacient', '$medic', '$data')";
            $rezultatInsert = mysqli_query($conn, $insert);
        }
    } else {
        if(!is_null($medic) && !is_null($data)) {
            $update = "UPDATE programare SET medic = '$medic', data_programarii = '$data' WHERE id = $updateID";
            $rezultatUpdate = mysqli_query($conn, $update);
        }
    }

    //dupa inserare sau update, revenim in pagina de afisare
    if ($rezultatInsert || $rezultatUpdate) {
        header('Location: ../display/programari.php');
    }
}

?>
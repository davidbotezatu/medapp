<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/db.php');

//sql select pentru afisare date in tabela din pagina Medici
$select = "SELECT * FROM medic";
$rezultatSelect = mysqli_query($conn, $select);

//variabile
$cnp = $nume = $prenume = $adresa = $salariu = $data = $updateID = null;
$cnpErr = $rezultatInsert = $rezultatUpdate = null;

//verificam daca suntem in pagina de update
//daca da, luam datele pentru cnp-ul dat, pentru a le pune in formular
if(isset($_GET['id']) && intval($_GET['id'])) {
    $updateID = $_GET['id'];

    $selectId = "SELECT * FROM medic WHERE cnp = '$updateID'";
    $rezultatUpdate = mysqli_query($conn, $selectId);
    $rand = mysqli_fetch_assoc($rezultatUpdate);
    $updateCnp = $rand['cnp'];
    $updateNume = $rand['nume'];
    $updatePrenume = $rand['prenume'];
    $updateAdresa = $rand['adresa'];
    $updateSalariu = $rand['salariu_initial'];
    $updateData = $rand['data_angajarii'];
}

//verificam intai daca sunt date trimise din formularul Medici (medici_form.php)
//iar apoi verificam fiecare input in parte daca a fost completat
if(isset($_POST['submit'])) {
    //verificare camp cnp
    if(!empty($_POST['cnp'])) {
        $cnp = filter_input(INPUT_POST, 'cnp', FILTER_SANITIZE_NUMBER_INT);
    }

    //verificare camp nume
    if(!empty($_POST['nume'])) {
        $nume = filter_input(INPUT_POST, 'nume', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //verificare camp prenume
    if(!empty($_POST['prenume'])) {
        $prenume = filter_input(INPUT_POST, 'prenume', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //verificare camp adresa
    if(!empty($_POST['adresa'])) {
        $adresa = filter_input(INPUT_POST, 'adresa', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //verificare camp salariu initial
    if(!empty($_POST['salariu'])) {
        $salariu = filter_input(INPUT_POST, 'salariu', FILTER_SANITIZE_NUMBER_INT);
    }

    //verificare camp data angajarii
    if(!empty($_POST['data'])) {
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //verificam daca se face inserare sau update
    //daca e inserare, trebuie sa vedem daca toate inputurile sunt populate
    //dar daca e update, doar 3 inputuri vor fi populate: nume, prenume si adresa (cnp-ul, salariul initial si data angajarii nu se schimba)
    if(is_null($updateID)) {
        //daca toate campurile sunt setate (fiind insert), le putem introduce in baza de date
        if (!is_null($cnp) && !is_null($nume) && !is_null($prenume) && !is_null($adresa) && !is_null($salariu) && !is_null($data)) {
            $insert = "INSERT INTO medic VALUES ('$cnp', '$nume', '$prenume', '$adresa', '$salariu', '$data')";
            
            //verificam daca putem face inserarea (daca avem cnp identic, primim eroare)
            try {
                $rezultatInsert = mysqli_query($conn, $insert);
            } catch(Exception $e) {
                $cnpErr = "Acest CNP este deja in baza de date.";
            }
        }
    } else {
        //din moment ce updateID e setat, inseamna ca suntem in pagina de update, si trebuie sa verificam cele 3 inputuri care vor fi updatate
        if (!is_null($nume) && !is_null($prenume) && !is_null($adresa)) {
            $update = "UPDATE medic SET nume = '$nume', prenume = '$prenume', adresa = '$adresa'
                       WHERE cnp = $updateID";
            $rezultatUpdate = mysqli_query($conn, $update);
        }
    }

    //dupa inserare sau update, revenim in pagina de afisare
    if ($rezultatInsert || $rezultatUpdate) {
        header('Location: ../display/medici.php');
    }
    
}
?>
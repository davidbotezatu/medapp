<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/db.php');

//sql select pentru afisare date in tabela din pagina Pacienti
$select = "SELECT * FROM pacient";
$rezultatSelect = mysqli_query($conn, $select);

//variabile
$nr_fisa = $data_inreg = $nume = $prenume = $data_nasterii = $adresa = $nr_telefon = $updateID = null;
$rezultatInsert = $rezultatUpdate = null;
$fisaErr = $searchErr = null;

//verificam daca suntem in pagina de update
//daca da, luam datele pentru fisa data, pentru a le pune in formular
if(isset($_GET['id']) && intval($_GET['id'])) {
    $updateID = $_GET['id'];

    $selectId = "SELECT * FROM pacient WHERE nr_fisa = '$updateID'";
    $rezultatUpdate = mysqli_query($conn, $selectId);
    $rand = mysqli_fetch_assoc($rezultatUpdate);
    $updateNrFisa = $rand['nr_fisa'];
    $updateDataInreg = $rand['data_inregistrarii'];
    $updateNume = $rand['nume'];
    $updatePrenume = $rand['prenume'];
    $updateDataNasterii = $rand['data_nasterii'];
    $updateAdresa = $rand['adresa'];
    $updateNrTel = $rand['numar_telefon'];
}

//daca avem date in campul de cautare, vom efectua cautarea in baza de date dupa nume, prenume pacient sau numar fisa
if(isset($_POST['cautare'])) {
    $searchString = filter_input(INPUT_POST, 'cautare', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if(strlen($searchString)) {
        $select = "SELECT * FROM pacient WHERE (`nume` LIKE '%$searchString%') OR (`prenume` LIKE '%$searchString%') OR (`nr_fisa` LIKE '$searchString')";
        $rezultatSelect = mysqli_query($conn, $select);

        //deoarece mysqli_query returneaza un obiect, ne uitam in obiect pentru a vedea numarul de randuri gasite
        //daca nu avem nici un rand, inseamna ca numele/prenumele/nr_fisa cautate nu exista, si afisam un mesaj utilizatorului
        if ($rezultatSelect->num_rows == 0) {
            $searchErr = "Pacientul cautat nu exista";
        }
    }
}

//verificam intai daca sunt date trimise din formularul Pacient (pacient_form.php)
//iar apoi verificam fiecare input in parte daca a fost completat
if(isset($_POST['submit'])) {
    //verificare camp nr_fisa
    if(!empty($_POST['nr_fisa'])) {
        $nr_fisa = filter_input(INPUT_POST, 'nr_fisa', FILTER_SANITIZE_NUMBER_INT);
    }

    //verificare camp data inregistrarii fisei
    if(!empty($_POST['data_inregistrarii'])) {
        $data_inreg = filter_input(INPUT_POST, 'data_inregistrarii', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //verificare camp nume
    if(!empty($_POST['nume'])) {
        $nume = filter_input(INPUT_POST, 'nume', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //verificare camp prenume
    if(!empty($_POST['prenume'])) {
        $prenume = filter_input(INPUT_POST, 'prenume', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //verificare camp data nasterii
    if(!empty($_POST['data_nasterii'])) {
        $data_nasterii = filter_input(INPUT_POST, 'data_nasterii', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //verificare camp adresa
    if(!empty($_POST['adresa'])) {
        $adresa = filter_input(INPUT_POST, 'adresa', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //verificare camp numar telefon
    if(!empty($_POST['nr_tel'])) {
        $nr_telefon = filter_input(INPUT_POST, 'nr_tel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //verificam daca se face inserare sau update
    //daca e inserare, trebuie sa vedem daca toate inputurile sunt populate
    //dar daca e update, doar 4 inputuri vor fi populate: nume, prenume, adresa si numarul de telefon (restul nu se schimba)
    if(is_null($updateID)) {
        //daca toate campurile sunt setate (fiind insert), le putem introduce in baza de date
        if (!is_null($nr_fisa) && !is_null($data_inreg) && !is_null($nume) && !is_null($prenume) && !is_null($data_nasterii) && !is_null($adresa) && !is_null($nr_telefon)) {
            $insert = "INSERT INTO pacient VALUES ('$nr_fisa', '$data_inreg', '$nume', '$prenume', '$data_nasterii', '$adresa', '$nr_telefon')";
            
            //verificam daca putem face inserarea (daca numarul fisei este identic cu un numar din baza de date, primim eroare)
            try {
                $rezultatInsert = mysqli_query($conn, $insert);
            } catch(Exception $e) {
                $fisaErr = "Numarul fisei exista deja in baza de date. Alegeti alt numar";
            }
        }
    } else {
        //din moment ce updateID e setat, inseamna ca suntem in pagina de update, si trebuie sa verificam inputurile care vor fi updatate
        if (!is_null($nume) && !is_null($prenume) && !is_null($adresa) && !is_null($nr_telefon)) {
            $update = "UPDATE pacient SET nume = '$nume', prenume = '$prenume', adresa = '$adresa', numar_telefon = '$nr_telefon'
                       WHERE nr_fisa = $updateID";
            $rezultatUpdate = mysqli_query($conn, $update);
        }
    }

    //dupa inserare sau update, revenim in pagina de afisare
    if ($rezultatInsert || $rezultatUpdate) {
        header('Location: ../display/pacienti.php');
    }
    
}
?>
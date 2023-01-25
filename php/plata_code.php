<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/db.php');

//variabile
$db_table = "plati";
$suma = $rest_plata = null;
$rezultatInsert = null;
$insertErr = null;

//salvare ID interventie in sesiune (va fi folosita pentru preturi)
if($pag = 'plati.php') {
    if(isset($_GET['id']) && intval($_GET['id'])) {
        $_SESSION['idCons'] = $_GET['id'];
    }
}

//sql select pentru afisare date in tabela din pagina Consultatii
$select = "SELECT plati.suma, plati.data_platii, plati.rest_plata
            FROM plati 
            LEFT JOIN consultatie ON consultatie.id = plati.id_consultatie
            WHERE consultatie.id = " . $_SESSION['idCons'];
$rezultatSelect = mysqli_query($conn, $select);

//select rest de plata
$selectRest = "SELECT MIN(rest_plata) AS cacat FROM plati WHERE id_consultatie = " . $_SESSION['idCons'];
$rezultatRest = mysqli_query($conn, $selectRest);
$rest_plata = mysqli_fetch_column($rezultatRest, 0);

function getPretConsultatie($b) {
    global $conn;
    //sql select pentru pretul consultatiei (suma tuturor interventiilor efectuate)
    $selectPret = "SELECT SUM(catalog.pret_total) AS pret_consultatie 
                    FROM interventii 
                    LEFT JOIN catalog ON interventii.id_catalog = catalog.id
                    WHERE interventii.id_consultatie = " . $_SESSION['idCons'];
    $rezultatPret = mysqli_query($conn, $selectPret);
    $p = mysqli_fetch_column($rezultatPret, 0);

    return $p - $b;
}

//verificam intai daca sunt date trimise din formularul Consultatie (consultatie_form.php)
//iar apoi verificam fiecare input in parte daca a fost completat
if(isset($_POST['submit'])) {
    if(!empty($_POST['suma'])) {
        $suma = filter_input(INPUT_POST, 'suma', FILTER_SANITIZE_NUMBER_INT);
    }

    if(!empty($_POST['data'])) {
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_NUMBER_INT);
    }

    if(!is_null($suma) && !is_null($data)) {
        if(!is_null($rest_plata)) {
            $val = $rest_plata - $suma;
            $x = $rest_plata;
        } else {
            $val = getPretConsultatie($suma);
            $x = getPretConsultatie(0);
        }

        if($val < 0) {
            $insertErr = "Suma maxima platibila este " . $x;
        } else {
            $insert = "INSERT INTO $db_table 
                        SET suma = '$suma', data_platii = '$data', rest_plata = '$val', id_consultatie = '" . $_SESSION['idCons'] . "'";
            $rezultatInsert = mysqli_query($conn, $insert);
        }

    }

    //dupa inserare revenim in pagina de afisare
    if ($rezultatInsert) {
        header('Location: ../display/plati.php');
    }
}

?>
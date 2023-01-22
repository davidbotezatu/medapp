<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/db.php');

//variabile
$nume = $materiale = $manopera = null;
$errMats = $errManopera = "";
$updateID = null;

//verificam daca suntem in pagina de update
if(isset($_GET['id']) && intval($_GET['id'])) {
    $updateID = $_GET['id'];

    //daca suntem in pagina de update, cautam in baza de date randul cu id-ul dat
    $selectId = "SELECT * FROM catalog WHERE id = '$updateID'";
    $rezultatUpdate = mysqli_query($conn, $selectId);
    $rand = mysqli_fetch_assoc($rezultatUpdate);
    $updateNume = $rand['nume_interventie'];
    $updateMateriale = $rand['cost_materiale'];
    $updateManopera = $rand['pret_manopera'];
}

//sql queries
$select = "SELECT * FROM catalog";
$rezultatSelect = mysqli_query($conn, $select);

//Verificare daca datele trimise sunt corecte
if(isset($_POST['submit'])) {
    //verificare daca numele interventiei a fost trimis
    if(!empty($_POST['nume'])) {
        $nume = filter_input(INPUT_POST, 'nume', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //verificare daca pretul materialelor a fost trimis
    if(!empty($_POST['materiale'])) {
        if(is_numeric($_POST['materiale'])) {
            $materiale = filter_input(INPUT_POST, 'materiale', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        } else {
            $errMats = "Campul trebuie sa contina doar cifre";
        }
    }

    //verificare daca pretul manoperei a fost trimis si daca contine doar cifre
    if(!empty($_POST['manopera'])) {
        if(is_numeric($_POST['manopera'])) {
            $manopera = filter_input(INPUT_POST, 'manopera', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        } else {
            $errManopera = "Campul trebuie sa contina doar cifre";
        }
    }
    
    if(!is_null($nume) && !is_null($materiale) && !is_null($manopera) ) {
        $pretTotal = $materiale + $manopera;
        
        if(is_null($updateID)) {
            $insert = "INSERT INTO catalog (nume_interventie, cost_materiale, pret_manopera, pret_total) VALUES ('$nume', '$materiale', '$manopera', '$pretTotal')";
            $rezultatInsert = mysqli_query($conn, $insert);
        } else {
            $update = "UPDATE catalog SET nume_interventie = '$nume', cost_materiale = '$materiale', pret_manopera = '$manopera', pret_total = '$pretTotal'
                       WHERE id = $updateID";
            $rezultatUpdate = mysqli_query($conn, $update);
        }

        if($rezultatInsert || $rezultatUpdate) {
            header('Location: ../display/catalog.php');
        }

        
    }



}

?>
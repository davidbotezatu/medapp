<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/db.php');

//variabile
$db_table = "interventii";
$interventie = $pret = $idConsultatie = null;
$rezultatInsert = null;

//salvare ID interventie in sesiune (va fi folosita pentru preturi)
if($pag = 'interventii.php') {
    if(isset($_GET['id']) && intval($_GET['id'])) {
        $_SESSION['idCons'] = $_GET['id'];
    }
}

//sql select pentru afisare date in tabela din pagina Interventii
$select = "SELECT catalog.nume_interventie, catalog.pret_total FROM interventii LEFT JOIN catalog ON interventii.id_catalog = catalog.id WHERE interventii.id_consultatie = " . $_SESSION['idCons'];
$rezultatSelect = mysqli_query($conn, $select);

//sql pentru afisarea procedurilor din catalog
$selectCatalog = "SELECT id, nume_interventie FROM catalog";
$rezultatCatalog = mysqli_query($conn, $selectCatalog);

//verificam intai daca sunt date trimise din formularul Interventie (interventie_form.php)
//iar apoi verificam fiecare input in parte daca a fost completat
if(isset($_POST['submit'])){
    if(!empty($_POST['numeInterventie'])) {
        $interventie = filter_input(INPUT_POST, 'numeInterventie', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(!is_null($interventie)) {
        $insert = "INSERT INTO $db_table SET id_catalog = '$interventie', id_consultatie = '" . $_SESSION['idCons'] . "'";
        $rezultatInsert = mysqli_query($conn, $insert);
    }

    //dupa inserare revenim in pagina de afisare
    if ($rezultatInsert) {
        header('Location: ../display/interventii.php');
    }
}
?>
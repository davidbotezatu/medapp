<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/db.php');

$data = $radio = $select = null;

if(isset($_POST['submit'])) {
    if(!empty($_POST['data'])) {
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(!empty($_POST['radio'])) {
        $radio = filter_input(INPUT_POST, 'radio', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(!is_null($data) && !is_null($radio)) {
        if($radio == 1) {
            $select = "SELECT suma, data_platii FROM plati";
        } else if($radio == 2) {
            $select = "SELECT suma, data_platii FROM plati WHERE data_platii LIKE '$data'";
        } else {
            $sql = "SELECT MONTH('$data')";
            $rez = mysqli_query($conn, $sql);
            $luna = mysqli_fetch_column($rez);

            $select = "SELECT suma, MONTH(data_platii) AS data_platii FROM plati WHERE MONTH(data_platii) = '$luna'";
        }

        $rezultatSelect = mysqli_query($conn, $select);
    }
}

?>
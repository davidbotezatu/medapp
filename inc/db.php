<?php

const DB_HOST = "localhost";
const DB_NAME = "medapp";
const DB_USER = "medapp";
const DB_PASS = "parola";

//Creare conexiune
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Verificare conexiune
if($conn->connect_error) {
    die('Conectare esuata' . $conn->connect_error);
}

?>
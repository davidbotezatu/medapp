<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/db.php');

if (isset($_POST["submit"])) {
    $nume = $_POST["nume"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $parola = $_POST["parola"];
    $parolaRepet = $_POST["reintroducereparola"];

    if (emptyInput($nume, $username, $email, $parola, $parolaRepet) !== false) {
        header("location: ../forms/signup_form.php?error=emptyInput");
        exit();
    }

    if (invalidUsername($username) !== false) {
        header("location: ../forms/signup_form.php?error=invalidUsername");
        exit();
    }

    if (emailAndUsernameExist($conn, $username, $email) !== false) {
        header("location: ../forms/signup_form.php?error=usernameExists");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../forms/signup_form.php?error=invalidEmail");
        exit();
    }

    if (passCheck($parola, $parolaRepet) !== false) {
        header("location: ../forms/signup_form.php?error=invalidPassword");
        exit();
    }

    createUser($conn, $nume, $username, $email, $parola);

}

//daca avem eroare, returnam "true"
function emptyInput($nume, $username, $email, $parola, $parolaRepet) {
    return (empty($nume) || empty($username) || empty($email) || empty($parola) || empty($parolaRepet)) ? true : false;
}

function invalidUsername($username) {
    return (!preg_match("/^[a-zA-Z0-9]*$/", $username)) ? true : false;
}

function emailAndUsernameExist($conn, $username, $email) {
    $sql = "SELECT * FROM utilizatori WHERE username = '$username' OR email = '$email';";
    $res = mysqli_query($conn, $sql);
    
    return ($res->num_rows > 0) ? true : false;
}

function invalidEmail($email) {
    return (!filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
}

function passCheck($parola, $parolaRepet) {
    return ($parola !== $parolaRepet) ? true : false;
}

//introducem utilizatorul in baza de date, folosind "prepared statements"
function createUser($conn, $nume, $username, $email, $parola) {
    $hashedPass = password_hash($parola, PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilizatori(nume, username, email, parola) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup_form.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $nume, $username, $email, $hashedPass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../forms/signup_form.php?error=none");
    exit();
}
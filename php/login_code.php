<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/db.php');

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $parola = $_POST["parola"];

    if (emptyInput($username, $parola) !== false) {
        header("location: ../forms/login_form.php?error=emptyInput");
        exit();
    }

    loginUser($conn, $username, $parola);
}

//daca avem eroare, returnam "true"
function emptyInput($username, $parola) {
    return (empty($username) || empty($parola)) ? true : false;
}

function loginUser($conn, $username, $parola) {
    $sql = "SELECT * FROM utilizatori WHERE username = '$username' OR email = '$username';";
    $res = mysqli_query($conn, $sql);
    
    if($res->num_rows == 0) {
        header("Location: ../forms/login_form.php?error=userpassincorect");
        exit();
    }

    $res = mysqli_fetch_assoc($res);
    $parolaExistenta = $res["parola"];

    $verificaParola = password_verify($parola, $parolaExistenta);

    if($verificaParola === false) {
        header("Location: ../forms/login_form.php?error=userpassincorect");
        exit();
    } else if ($verificaParola === true) {
        $_SESSION["userid"] = $res["userid"];
        header("Location: ../index.php");
        exit();
    }
}
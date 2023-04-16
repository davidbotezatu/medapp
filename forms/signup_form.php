<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/signup_code.php'); 

$err = $succes = null;

if(isset($_GET["error"])) {
    if($_GET["error"] == "emptyInput") {
        $err = "Completeaza toate campurile!";
    } else if($_GET["error"] == "invalidUsername") {
        $err = "Nume invalid! Foloseste doar litere si cifre.";
    } else if($_GET["error"] == "usernameExists") {
        $err = "Username-ul exista deja! Foloseste alt username.";
    } else if($_GET["error"] == "invalidEmail") {
        $err = "Adresa de email nu este valida!";
    } else if($_GET["error"] == "invalidPassword") {
        $err = "Foloseste aceeasi parola in ambele campuri \"Parola\" si \"Repeta Parola\".";
    } else if($_GET["error"] == "none") {
        $succes = "Utilizatorul a fost creat cu succes! Poate fi utilizat pentru logare.";
    }
}

if($err != null) {
    echo "<div class='alert alert-danger' role='alert'>$err</div>";
} else if($succes != null) {
    echo "<div class='alert alert-success' role='alert'>$succes</div>";
}

?>

<section>
    <form action='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' method="post" class="was-validated">
        <div class="form-floating mb-3">
            <input type="text" class="form-control is-invalid" name="nume" placeholder="nume" required>
            <label for="nume" class="form-label">Nume si Prenume</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control is-invalid" name="username" placeholder="username" required>
            <label for="username" class="form-label">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control is-invalid" name="email" placeholder="email" required>
            <label for="email" class="form-label">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control is-invalid" name="parola" placeholder="parola" required>
            <label for="parola" class="form-label">Parola</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control is-invalid" name="reintroducereparola" placeholder="reintroducereparola" required>
            <label for="reintroducereparola" class="form-label">Repeta Parola</label>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary" type="submit" name="submit">Inregistrare</button>
        </div>
    </form>
</section>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>
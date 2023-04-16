<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/login_code.php'); 

$err = null;

if(isset($_GET["error"])) {
    if($_GET["error"] == "emptyInput") {
        $err = "Completeaza toate campurile!";
    } else if($_GET["error"] == "userpassincorect") {
        $err = "Numele si/sau parola sunt incorecte!";
    }
}

if($err != null) {
    echo "<div class='alert alert-danger' role='alert'>$err</div>";
}

?>

<section>
    <form action='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' method="post" class="was-validated">
        <div class="form-floating mb-3">
            <input type="text" class="form-control is-invalid" name="username" placeholder="username/email" required>
            <label for="username" class="form-label">Username/Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control is-invalid" name="parola" placeholder="parola" required>
            <label for="parola" class="form-label">Parola</label>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary" type="submit" name="submit">Login</button>
        </div>
    </form>
</section>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>
<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/medici_code.php');

    if(empty($_SESSION['userid'])) {
        header("Location: ../index.php");
        die();
    }
?>

<!-- Formular introducere sau editare medici -->
<form action='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' class="was-validated" method='post'>
    <div class="form-floating mb-3">
        <input type="text" pattern="^\d{13}$" maxlength="13" placeholder="cnp" name="cnp" <?php echo (!is_null($updateID)) ? "class='form-control' value='$updateCnp' disabled" : "class='form-control is-invalid' required" ?>>
        <label for="cnp" class="form-label">CNP</label>
        <?php
            if(!is_null($cnpErr)) {
                echo "<div class='invalid-feedback'>
                    $cnpErr
                  </div>";
            }
        ?>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control is-invalid" name="nume" placeholder="nume" <?php echo (!is_null($updateID)) ? "value='$updateNume'" : "" ?> required>
        <label for="nume" class="form-label">Nume</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control is-invalid" name="prenume" placeholder="prenume" <?php echo (!is_null($updateID)) ? "value='$updatePrenume'" : "" ?> required>
        <label for="prenume" class="form-label">Prenume</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control is-invalid" name="adresa" placeholder="adresa" <?php echo (!is_null($updateID)) ? "value='$updateAdresa'" : "" ?> required>
        <label for="adresa" class="form-label">Adresa</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" name="salariu" placeholder="salariu" <?php echo (!is_null($updateID)) ? "class='form-control' value='$updateSalariu' disabled" : "class='form-control is-invalid' required" ?>>
        <label for="salariu" class="form-label">Salariu Initial</label>
    </div>
    <div class="form-floating mb-3">
        <input type="date" name="data" placeholder="data" <?php echo (!is_null($updateID)) ? "class='form-control' value='$updateData' disabled" : "class='form-control is-invalid' required" ?>>
        <label for="data" class="form-label">Data Angajarii</label>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary" type="submit" name="submit">
            <?php echo (!is_null($updateID)) ? "Modifica" : "Adauga" ?>
        </button>
    </div>
</form>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php') ?>
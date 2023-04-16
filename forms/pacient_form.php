<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/pacient_code.php');

    if(empty($_SESSION['userid'])) {
        header("Location: ../index.php");
        die();
    }
?>

<!-- Formular introducere sau editare pacient -->
<form action='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' class="was-validated" method='post'>
    <div class="form-floating mb-3">
        <input type="text" pattern="^\d{5}$" maxlength="5" placeholder="numar fisa" name="nr_fisa" <?php echo (!is_null($updateID)) ? "class='form-control' value='$updateNrFisa' disabled" : "class='form-control is-invalid' required" ?>>
        <label for="nr_fisa" class="form-label">Numar Fisa</label>
        <?php
            if(!is_null($fisaErr)) {
                echo "<div class='invalid-feedback'>
                    $fisaErr
                  </div>";
            }
        ?>
    </div>
    <div class="form-floating mb-3">
        <input type="date" name="data_inregistrarii" placeholder="data_inregistrarii" <?php echo (!is_null($updateID)) ? "class='form-control' value='$updateDataInreg' disabled" : "class='form-control is-invalid' required" ?>>
        <label for="data_inregistrarii" class="form-label">Data Inregistrarii</label>
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
        <input type="date" name="data_nasterii" placeholder="data_nasterii" <?php echo (!is_null($updateID)) ? "class='form-control' value='$updateDataNasterii' disabled" : "class='form-control is-invalid' required" ?>>
        <label for="data_nasterii" class="form-label">Data Nasterii</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control is-invalid" name="adresa" placeholder="adresa" <?php echo (!is_null($updateID)) ? "value='$updateAdresa'" : "" ?> required>
        <label for="adresa" class="form-label">Adresa</label>
    </div>
    <div class="form-floating mb-3">
        <input type="tel" class="form-control is-invalid" name="nr_tel" placeholder="telefon" <?php echo (!is_null($updateID)) ? "value='$updateNrTel'" : "" ?> required>
        <label for="nr_tel" class="form-label">Numar Telefon</label>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary" type="submit" name="submit">
            <?php echo (!is_null($updateID)) ? "Modifica" : "Adauga" ?>
        </button>
    </div>
</form>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>
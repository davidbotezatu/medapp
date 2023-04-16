<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/catalog_code.php');

    if(empty($_SESSION['userid'])) {
        header("Location: ../index.php");
        die();
    }
?>

<!-- Formular introducere sau editare interventii -->
<form action='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' class="was-validated" method='post'>
    <?php
        if(!is_null($updateID)) {
            echo "<div class='form-floating mb-3'>
                    <input type='text' name='updateId' class='form-control' value='$updateID' disabled>
                    <label for='updateId' class='form-label'>ID</label>
                </div>";
        }
    ?>
    <div class="form-floating mb-3">
        <input type="text" class="form-control is-invalid" name="nume" placeholder="nume" <?php echo (!is_null($updateID)) ? "value='$updateNume'" : "" ; ?> required>
        <label for="nume" class="form-label">Nume Interventie</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control is-invalid" placeholder="materiale" name="materiale" <?php echo (!is_null($updateID)) ? "value='$updateMateriale'" : "" ; ?> required>
        <label for="materiale" class="form-label">Pret Materiale</label>
        <div class="invalid-feedback">
            <?php echo $errMats; ?>
        </div>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control is-invalid" placeholder="manopera" name="manopera" <?php echo (!is_null($updateID)) ? "value='$updateManopera'" : "" ; ?> required>
        <label for="manopera" class="form-label">Pret Manopera</label>
        <div class="invalid-feedback">
            <?php echo $errManopera; ?>
        </div>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary" type="submit" name="submit">
            <?php echo (is_null($updateID)) ? "Adauga" : "Modifica"; ?>
        </button>
    </div>
</form>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>
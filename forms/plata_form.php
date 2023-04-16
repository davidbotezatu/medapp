<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/plata_code.php');

if(empty($_SESSION['userid'])) {
    header("Location: ../index.php");
    die();
}
?>

<!-- Formular introducere sau editare programari -->
<form action='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' class="was-validated" method='post'>
    <div class="form-floating mb-3">
        <input type="number" class="form-control is-invalid" name="suma" placeholder="suma platita" required>
        <label for="suma" class="form-label">Suma Achitata</label>
        <?php 
            if(!is_null($insertErr)) {
                echo "<div class='invalid-feedback'>$insertErr</div>";
            }
        ?>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form-control is-invalid" name="data" placeholder="data platii" required>
        <label for="data" class="form-label">Suma Achitata</label>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" type="submit" name="submit">Adauga</button>
    </div>
</form>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>
<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/interventie_code.php');

    if(empty($_SESSION['userid'])) {
        header("Location: ../index.php");
        die();
    }
?>

<form action='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' class="was-validated" method='post'>
    <div class="form-floating">
        <select name="numeInterventie" id='nume' class="form-select mb-3" aria-label="Select Nume Interventie" required>
            <option value=""></option>
            <?php
                //populam dropdown-ul cu numele procedurilor din catalog
                while ($rand = mysqli_fetch_assoc($rezultatCatalog)) {
                    $id = $rand['id'];
                    
                    //afisare date: valoare = id, iar ca afisare avem numele
                    echo "<option value='$id'>" . $rand['nume_interventie'] . '</option>';
                }
            ?>
        </select>
        <label for="nume">Interventie</label>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" type="submit" name="submit">Adauga</button>
    </div>
</form>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>
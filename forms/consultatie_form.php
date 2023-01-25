<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/consultatie_code.php');
?>

<!-- Formular introducere sau editare programari -->
<form action='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' class="was-validated" method='post'>
    <?php
    if (!is_null($updateID)) {
        echo "<div class='form-floating mb-3'>
                    <input type='text' name='updateId' class='form-control' value='$updateID' disabled>
                    <label for='updateId' class='form-label'>ID</label>
                </div>";
    }
    ?>

    <div class="form-floating">
        <!-- deoarece nu are sens sa schimbam si pacientul in timpul modificarii, vom dezactiva acest select in cazul in care avem un updateId -->
        <select name="pacientDropdown" id='pacient' class="form-select mb-3" aria-label="Select Nume Pacient" <?php echo (!is_null($updateID)) ? "disabled" : "required" ?>>
            <option value=""></option>
            <?php
                //populam dropdown-ul cu numele pacientilor din baza de date (bazandu-ne pe nr_fisa)
                while ($rand = mysqli_fetch_assoc($rezultatPacient)) {
                    $pacient = $rand['nr_fisa'];
                    
                    //daca nu suntem in modul de update, trebuie doar sa afisam datele
                    if(!$updateID) {
                        echo "<option value='$pacient'>" . $rand['nume'] . ' ' . $rand['prenume'] . '</option>';
                    } else {
                        //in modul de update, trebuie sa avem inputul populat cu selectia deja facuta - in acest caz
                        //facem asta punand atributul "selected" pe optiunea unde nr_fisa din tabela pacient = pacient din tabela programare
                        $flag = null;
                        if($pacient == $updatePacient) {
                            $flag = "selected";
                        }

                        echo "<option value='$pacient' $flag>" . $rand['nume'] . ' ' . $rand['prenume'] . '</option>';
                    }
                }
            ?>
        </select>
        <label for="pacient">Nume Pacient</label>
    </div>

    <div class="form-floating">
        <select name="medicDropdown" id='medic' class="form-select mb-3" aria-label="Select Nume Medic" required>
            <option value=""></option>
            <?php
                //populam dropdown-ul cu numele medicilor din baza de date (bazandu-ne pe cnp-ul acestora)
                while ($rand = mysqli_fetch_assoc($rezultatMedic)) {
                    $medic = $rand['cnp'];
                    
                    //daca nu suntem in modul de update, trebuie doar sa afisam datele
                    if(!$updateID) {
                        echo "<option value='$medic'>" . $rand['nume'] . ' ' . $rand['prenume'] . '</option>';
                    } else {
                        
                        //in modul de update, trebuie sa avem inputul populat cu selectia deja facuta
                        //facem asta punand atributul "selected" pe optiunea unde nr_fisa din tabela pacient = pacient din tabela programare
                        $flag = null;
                        if($medic == $updateMedic) {
                            $flag = "selected";
                        }

                        echo "<option value='$medic' $flag>" . $rand['nume'] . ' ' . $rand['prenume'] . '</option>';
                    }
                }
            ?>
        </select>
        <label for="medic">Nume Medic</label>
    </div>

    <div class="form-floating mb-3">
        <input type="datetime-local" class="form-control is-invalid" name="data" placeholder="data" <?php echo (!is_null($updateID)) ? "value='$updateData'" : "" ?> required>
        <label for="data" class="form-label">Data si Ora Programarii</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="observatii" placeholder="observatii" <?php echo (!is_null($updateID)) ? "value='$updateObs'" : "" ?>>
        <label for="observatii" class="form-label">Observatii</label>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" type="submit" name="submit">
            <?php echo (!is_null($updateID)) ? "Modifica" : "Adauga" ?>
        </button>
    </div>
</form>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>
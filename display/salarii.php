<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php'); 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/salariu_code.php');
    $date = date("Y-m-d");
?>

<form action='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' class="was-validated" method='post'>
    <div class="row">
        <div class="col">
            <div class="form-floating">
                <input type="date" class="form-control is-invalid" name="data" placeholder="data" value="<?php echo $date ?>" required>
                <label for="data" class="form-label">Data</label>
            </div>
        </div>
        <div class="col">
            <input class="btn btn-danger float-end mt-2" type="submit" name="submit" value="Afisare"></button>
        </div>
    </div>
</form>

<div class="tableFixed mt-3">
    <table class="table table-hover">
        <thead class="table-secondary">
            <tr>
                <th scope="col">CNP</th>
                <th scope="col">Nume</th>
                <th scope="col">Prenume</th>
                <th scope="col">Salariu Initial</th>
                <th scope="col">Nr Consultatii</th>
                <th scope="col">Sporuri(%)</th>
                <th scope="col">Salariu Nou</th>
            </tr>
        </thead>

        <tbody>
            <?php
                if($rezultatSelect) {
                    while($rand = mysqli_fetch_assoc($rezultatSelect)) {
                        $cnp = $rand['cnp'];
                        $nume = $rand['nume'];
                        $prenume = $rand['prenume'];
                        $salariu = $rand['salariu_initial'];
                        $nr_cons = $rand['nr_consultatii'];

                        echo "<tr>
                                <th scope='row'>$cnp</th>
                                <td>$nume</td>
                                <td>$prenume</td>
                                <td>$salariu</td>
                                <td>$nr_cons</td>
                                <td>" . calcSpor($nr_cons) . "</td>
                                <td>" . calcSalariu($salariu, calcSpor($nr_cons)) . "</td>
                            </tr>"
                        ;
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>
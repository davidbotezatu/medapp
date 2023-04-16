<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php'); 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/stat_plata_code.php');

    if(empty($_SESSION['userid'])) {
        header("Location: ../index.php");
        die();
    }
?>

<form action='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' class="was-validated" method='post'>
    <div class="input-group  w-25">
        <select name="luna" id="luna" class="form-select">
            <option value="1" selected>Ianuarie</option>
            <option value="2">Februarie</option>
            <option value="3">Martie</option>
            <option value="4">Aprilie</option>
            <option value="5">Mai</option>
            <option value="6">Iunie</option>
            <option value="7">Iulie</option>
            <option value="8">August</option>
            <option value="9">Septembrie</option>
            <option value="10">Octombrie</option>
            <option value="11">Noiembrie</option>
            <option value="12">Decembrie</option>
        </select>

        <input class="btn btn-danger" type="submit" name="submit" value="Afisare"></button>
    </div>
</form>

<div class="tableFixed mt-3">
    <table class="table table-hover">
        <thead class="table-secondary">
            <tr>
                <th scope="col">CNP</th>
                <th scope="col">Nume</th>
                <th scope="col">Prenume</th>
                <th scope="col">Salariu Brut (cu sporuri)</th>
                <th scope="col">Impozit(16.5%)</th>
                <th scope="col">CAS(25%)</th>
                <th scope="col">Salariu Net</th>
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
                        $spor = calcSpor($nr_cons);
                        $salariuBrut = calcSalariuBrut($salariu, $spor);
                        $impozit = $salariuBrut * $impozitVal = 0.165;
                        $cas = $salariuBrut * $casVal;
                        $salariuNet = calcSalariuNet($salariuBrut, $impozit, $cas);

                        echo "<tr>
                                <th scope='row'>$cnp</th>
                                <td>$nume</td>
                                <td>$prenume</td>
                                <td>$salariuBrut</td>
                                <td>$impozit</td>
                                <td>$cas</td>
                                <td>$salariuNet</td>
                            </tr>"
                        ;
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>
<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/medici_code.php');

    if(empty($_SESSION['userid'])) {
        header("Location: ../index.php");
        die();
    }
?>

<a href="../forms/medici_form.php">
    <button class="btn btn-primary">Adaugare</button>
</a>

<div class="tableFixed mt-3">
    <table class="table table-hover">
        <thead class="table-secondary">
            <tr>
                <th scope="col">CNP</th>
                <th scope="col">Nume</th>
                <th scope="col">Prenume</th>
                <th scope="col">Adresa</th>
                <th scope="col">Salariu Initial</th>
                <th scope="col">Data Angajarii</th>
                <th scope="col">Optiuni</th>
            </tr>
        </thead>

        <tbody>
            <?php
                if($rezultatSelect) {
                    while($rand = mysqli_fetch_assoc($rezultatSelect)) {
                        $cnp = $rand['cnp'];
                        $nume = $rand['nume'];
                        $prenume = $rand['prenume'];
                        $adresa = $rand['adresa'];
                        $salariu = $rand['salariu_initial'];
                        $data = $rand['data_angajarii'];

                        echo "<tr>
                                <th scope='row'>$cnp</th>
                                <td>$nume</td>
                                <td>$prenume</td>
                                <td>$adresa</td>
                                <td>$salariu</td>
                                <td>$data</td>
                                <td>
                                    <a href='../forms/medici_form.php?id=$cnp'>
                                        <button class='btn btn-success'>Modifica</button>
                                    </a>
                                </td>
                            </tr>"
                        ;
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>